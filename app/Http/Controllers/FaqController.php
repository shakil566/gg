<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Faq;
use Auth;
use Session;
use Redirect;
use Helper;
use Illuminate\Http\Request;

class FaqController extends Controller {

    private $controller = 'Faq';

    public function index(Request $request) {
        //passing param for custom function
        $qpArr = $request->all();
        $targetArr = Faq::select('faq.*')->orderBy('order', 'asc');
        $nameArr = Faq::select('title')->orderBy('order', 'asc')->get();
//begin filtering
        $searchText = $request->search;
        if (!empty($searchText)) {
            $targetArr->where(function ($query) use ($searchText) {
                $query->where('title', 'LIKE', '%' . $searchText . '%');
            });
        }
        //end filtering

        $targetArr = $targetArr->paginate(Session::get('paginatorCount'));

        //change page number after delete if no data has current page
        if ($targetArr->isEmpty() && isset($qpArr['page']) && ($qpArr['page'] > 1)) {
            $page = ($qpArr['page'] - 1);
            return redirect('/faq?page=' . $page);
        }

        //echo '<pre>';print_r($parentArr);exit;

        return view('faq.index')->with(compact('targetArr', 'qpArr','nameArr'));
    }


    public function create(Request $request) { //passing param for custom function
        $qpArr = $request->all();
        $orderList = array('0' => __('label.SELECT_ORDER_OPT')) + getOrderList($this->controller, 1);

        return view('faq.create')->with(compact('qpArr','orderList'));
    }

    public function store(Request $request) {
        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //end back same page after update

        $validator = Validator::make($request->all(), [
                    'title' => 'required|unique:faq,title',
                    'description' => 'required|unique:faq,description',
                    'order' => 'required|not_in:0'
        ]);

        if ($validator->fails()) {
            return redirect('admin/faq/create' . $pageNumber)
                            ->withInput()
                            ->withErrors($validator);
        }

        $target = new Faq;
        $target->title = $request->title;
        $target->description = $request->description;
        $target->order = 0;
        $target->status = $request->status;

        if ($target->save()) {
            insertOrder($this->controller, $request->order, $target->id);
            Session::flash('success', __('label.FAQ_CREATED_SUCCESSFULLY'));
            return redirect('admin/faq');
        } else {
            Session::flash('error', __('label.FAQ_HAS_NOT_BEEN_CREATED'));
            return redirect('admin/faq/create' . $pageNumber);
        }
    }

    public function edit(Request $request, $id) {
        $target = Faq::find($id);
        $orderList = array('0' => __('label.SELECT_ORDER_OPT')) + getOrderList($this->controller, 2);
        if (empty($target)) {
            Session::flash('error', trans('label.INVALID_DATA_ID'));
            return redirect('admin/faq');
        }
        //passing param for custom function
        $qpArr = $request->all();

        return view('faq.edit')->with(compact('target', 'qpArr','orderList'));
    }

    public function update(Request $request, $id) { //print_r($request->all());exit;
        $target = Faq::find($id);
        $presentOrder = $target->order;
        //echo '<pre>';print_r($target);exit;
        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = $qpArr['filter']; //!empty($qpArr['page']) ? '?page='.$qpArr['page'] : '';
        //end back same page after update

        $validator = Validator::make($request->all(), [
                    'title' => 'required|unique:faq,title,' . $id,
                    'description' => 'required',
                    'order' => 'required|not_in:0'
        ]);

        if ($validator->fails()) {
            return redirect('admin/faq/' . $id . '/edit' . $pageNumber)
                            ->withInput()
                            ->withErrors($validator);
        }

        $target->title = $request->title;
        $target->description = $request->description;
        $target->order = $request->order;
        $target->status = $request->status;

        if ($target->save()) {
            if ($request->order != $presentOrder) {
                updateOrder($this->controller, $request->order, $target->id, $presentOrder);
            }
            Session::flash('success', __('label.FAQ_UPDATED_SUCCESSFULLY'));
            return redirect('admin/faq' . $pageNumber);
        } else {
            Session::flash('error', __('label.FAQ_HAS_NOT_BEEN_UPDATED'));
            return redirect('admin/faq/' . $id . '/edit' . $pageNumber);
        }
    }

    public function destroy(Request $request, $id) {
        $target = Faq::find($id);

        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '?page=';
        //end back same page after update

        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
        }

//        //Dependency
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
//                    return redirect('productCategory' . $pageNumber);
//                }
//            }
//        }

        if ($target->delete()) {
            deleteOrder($this->controller, $target->order);
            Session::flash('error', __('label.FAQ_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', __('label.FAQ_HAS_NOT_BEEN_DELETED'));
        }
        return redirect('admin/faq' . $pageNumber);
    }

    public function filter(Request $request) {
        $url = 'search=' . urlencode($request->search);
        return Redirect::to('admin/faq?' . $url);
    }

}
