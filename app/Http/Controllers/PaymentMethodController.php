<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Auth;
use Common;
use Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Redirect;
use Response;
use Session;
use Validator;
use DB;

class PaymentMethodController extends Controller {

    private $controller = 'PaymentMethod';

    public function index(Request $request) {
        //passing param for custom function
        $qpArr = $request->all();
        $targetArr = PaymentMethod::orderBy('order', 'asc');
        $status = ["0" => __('label.SELECT_STATUS_OPT')] + array("1" => "Active", "2" => "Inactive");
        $nameArr = PaymentMethod::select('name')->orderBy('order', 'asc')->get();

        //begin filtering
        $searchText = $request->search;
        if (!empty($searchText)) {
            $targetArr->where(function ($query) use ($searchText) {
                $query->where('name', 'LIKE', '%' . $searchText . '%');
            });
        }
        if (!empty($request->status)) {
            $targetArr->where('status', $request->status);
        }
        //end filtering

        $targetArr = $targetArr->paginate(Session::get('paginatorCount'));
//        echo '<pre>'; print_r($targetArr); exit;

        //change page number after delete if no data has current page
        if ($targetArr->isEmpty() && isset($qpArr['page']) && ($qpArr['page'] > 1)) {
            $page = ($qpArr['page'] - 1);
            return redirect('/admin/paymentMethod?page=' . $page);
        }

        return view('paymentMethod.index')->with(compact('targetArr', 'qpArr', 'nameArr', 'status'));
    }

    public function edit(Request $request, $id) {
        $target = PaymentMethod::find($id);
        $orderList = array('0' => __('label.SELECT_ORDER_OPT')) + getOrderList($this->controller, 2);
        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
            return redirect('admin/paymentMethod');
        }

        //passing param for custom function
        $qpArr = $request->all();

        return view('paymentMethod.edit')->with(compact('target', 'qpArr', 'orderList'));
    }

    public function update(Request $request, $id) {
//     print_r($request->all());exit;
        $target = PaymentMethod::find($id);
        // return $request;
        $presentOrder = $target->order;
        // echo '<pre>';print_r($target);exit;
        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = $qpArr['filter']; //!empty($qpArr['page']) ? '?page='.$qpArr['page'] : '';
        //end back same page after update

        $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:payment_method,name,' . $id,
                    'order' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect('admin/paymentMethod/' . $id . '/edit' . $pageNumber)
                            ->withInput()
                            ->withErrors($validator);
        }
        $target->name = $request->name;
        $target->connection_type = $request->connection_type;
        $target->order = $request->order;
        $target->status = $request->status;
        $target->description = $request->description;

        if ($target->save()) {
            if ($request->order != $presentOrder) {
                updateOrder($this->controller, $request->order, $target->id, $presentOrder);
            }
            Session::flash('success', __('label.PAYMENT_METHOD_HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return redirect('admin/paymentMethod' . $pageNumber);
        } else {
            Session::flash('error', __('label.PAYMENT_METHOD_COULD_NOT_BE_UPDATED'));
            return redirect('admin/paymentMethod/' . $id . '/edit' . $pageNumber);
        }
    }

    public function destroy(Request $request, $id) {
        $target = PaymentMethod::find($id);

        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '?page=';
        //end back same page after update

        if (empty($target)) {
            session()->flash('error', __('label.INVALID_DATA_ID'));
        }

        // //Dependency
        //        $dependencyArr = [
        //            'ProductCategory' => ['1' => 'parent_id'],
        //            'Product' => ['1' => 'product_category_id'],
        //        ];
        //        foreach ($dependencyArr as $model => $val) {
        //            foreach ($val as $index => $key) {
        //                $namespacedModel = '\\App\\' . $model;
        //                $dependentData = $namespacedModel::where($key, $id)->first();
        //                if (!empty($dependentData)) {
        //                    Session::flash('error', __('label.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL', ['model' => $model]));
        //                    return redirect('productType' . $pageNumber);
        //                }
        //            }
        //        }

        if ($target->delete()) {
            deleteOrder($this->controller, $target->order);
            Session::flash('error', __('label.PAYMENT_METHOD_HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', __('label.PAYMENT_METHOD_COULD_NOT_BE_DELETED'));
        }
        return redirect('admin/paymentMethod' . $pageNumber);
    }


    public function changeStatus(Request $request) {

        $target = PaymentMethod::find($request->id);
        $target->status = !empty($request->status) ? $request->status : '2';
        $target->save();

        $statusMsg1 = !empty($request->status) && ($request->status) == 1 ? __('label.ACTIVATED') : __('label.DEACTIVATED');
        $statusMsg2 = !empty($request->status) && ($request->status) == 1 ? __('label.ACTIVATE') : __('label.DEACTIVATE');

        $successMsg = __('label.PAYMENT_METHOD_HAS_BEEN_DE_ACTIVATED_SUCCESSFULLY', ['stat' => $statusMsg1]);
        $errorMsg = __('label.FAILED_TO_DE_ACTIVATE_PAYMENT_METHOD', ['stat' => $statusMsg2]);

        if ($target->save()) {
            return Response::json(['success' => true, 'heading' => __('label.SUCCESS'), 'message' => $successMsg], 200);
        } else {
            return Response::json(['success' => false, 'heading' => __('label.ERROR'), 'message' => $errorMsg], 401);
        }
    }

    public function getPaymentInfo(Request $request) {
        $target = PaymentMethod::where('id', $request->id)
                ->select('name', 'connection_type', 'api_json')
                ->first();
        $credentialArr = !empty($target->api_json) ? json_decode($target->api_json, true) : [];
        $view = view('paymentMethod.paymentInfo')->with(compact('target', 'request', 'credentialArr'))->render();
        return response()->json(['html' => $view]);
    }

    public function setPaymentInfo(Request $request) {
        $credentialArr = $request->api_param;

        $errorMsg = [];
        $row = 0;
        if (!empty($credentialArr)) {
            foreach ($credentialArr as $identifier => $info) {
                if (count(array_filter($info)) == 0) {
                    $errorMsg[$identifier . '.all'] = __('label.PLEASE_SET_CREDENTIAL_INFO_FOR_ROW', ['row' => numberToOrdinal($row + 1)]);
                } else {
                    if (empty($info['credential_key'])) {
                        $errorMsg[$identifier . '.credential_key'] = __('label.CREDENTIAL_KEY_FIELD_IS_REQUIRED_FOR_ROW', ['row' => numberToOrdinal($row + 1)]);
                    }
                    if (empty($info['credential_value'])) {
                        $errorMsg[$identifier . '.credential_value'] = __('label.CREDENTIAL_VALUE_FIELD_IS_REQUIRED_FOR_ROW', ['row' => numberToOrdinal($row + 1)]);
                    }
                }
                $row++;
            }
        }



        if (!empty($errorMsg)) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $errorMsg), 400);
        }


        $item = $cred = [];
        $replace = '_';
        $pattern = [
            ' - ', ' : ', ' . ', ' , ', '- '
            , ': ', '. ', ', ', '  ', ' ', '-'
            , ':', '.', ','
        ];
        if (!empty($credentialArr)) {
            foreach ($credentialArr as $identifier => $info) {
                $credentialKey = strtolower($info['credential_key']);
                $credentialKey = str_replace($pattern, $replace, $credentialKey);
                $item[$credentialKey] = $info['credential_value'];
                $cred[$identifier]['credential_key'] = $credentialKey;
                $cred[$identifier]['credential_value'] = $info['credential_value'];
            }
        }
        $data['api_json'] = !empty($cred) ? json_encode($cred) : '';
        $data['api_param'] = !empty($item) ? json_encode($item) : '';
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['updated_by'] = Auth::user()->id;
        DB::beginTransaction();
        try {
            PaymentMethod::where('id', $request->id)->update($data);

            DB::commit();
            return Response::json(['success' => true, 'heading' => __('label.SUCCESS'), 'message' => __('label.CREDENTIAL_ADDED_SUCCESSFULLY')], 200);
        } catch (\Throwable $e) {
            DB::rollback();
            return Response::json(['success' => false, 'heading' => __('label.VALIDATION_ERROR'), 'message' => __('label.FAILED_TO_ADDED_CREDENTIAL')], 401);
        }
    }

    public function addCredentialInfo(Request $request) {
//        $rwNameArr = PaymentMethod::orderBy('name', 'asc')->pluck('name', 'id')->toArray();

        $html = view('paymentMethod.addCredentialInfo')->render();
        return response()->json(['html' => $html]);
    }

}
