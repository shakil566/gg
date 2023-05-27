<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use URL;
use Session;
use Redirect;
use Helper;
use Validator;
use Response;
use Common;
use File;
use Input;
use PDF;

use App\Models\ProductType;

use Illuminate\Support\Str;

class ProductTypeController extends Controller
{

    private $controller = 'ProductType';

    public function index(Request $request)
    {

        $productTypeArr = ProductType::select('*')
            ->orderBy('order', 'asc')->get();

        return view('admin.productType.index')->with(compact('productTypeArr'));
    }

    public function filter(Request $request)
    {
        $url = 'fil_search=' . $request->fil_search;
        return Redirect::to('admin/productType?' . $url);
    }

    public function create(Request $request)
    {

        $qpArr = $request->all();

        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);
        return view('admin.productType.create')->with(compact('qpArr', 'orderList', 'lastOrderNumber'));
    }

    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|unique:product_category',
        );

        $message = array(
            'name.required' => 'Please enter product category name!',
        );


        if ($request->file('photo')) {
            $rules['photo'] = 'max:2048|mimes:jpeg,png,gif,jpg';
        }

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/productType/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        //productType photo upload
        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/productType/';
            $filename = uniqid() . $file->getClientOriginalName();

            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $imageName = TRUE;
            } else {
                $imageUpload = FALSE;
            }
        }

        if ($imageUpload === FALSE) {
            Session::flash('error', 'Image Could not be uploaded');
            return Redirect::to('admin/productType/create')
                ->withInput($request->except(array('photo')));
        }


        $productType = new ProductType;
        $productType->name = $request->name;
        if ($imageName !== FALSE) {
            $productType->photo = $filename;
        }
        $productType->order = $request->order;
        $productType->status = $request->status;
        if ($productType->save()) {
            Helper::insertOrder($this->controller, $request->order, $productType->id);
            Session::flash('success',   $request->name . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/productType');
        } else {
            Session::flash('error',   $request->name . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/productType/create');
        }
    }

    public function edit(Request $request, $id)
    {
        $qpArr = $request->all();
        $productType = ProductType::find($id);
        if (empty($productType)) {
            Session::flash('error', __('english.INVALID_DATA_ID'));
            return redirect('admin/productType');
        }
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);
        return view('admin.productType.edit')->with(compact('qpArr', 'productType', 'orderList'));
    }

    public function update(Request $request, $id)
    {

        $target = ProductType::find($id);

        $rules = [
            'name' => 'required',
        ];
        $message = array(
            'name.required' => 'Please enter productType name!',
        );

        $validator = Validator::make($request->all(), $rules, $message);


        if ($validator->fails()) {
            return Redirect::to('admin/productType/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        //productType photo upload
        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/productType/';
            $filename = uniqid() . $file->getClientOriginalName();

            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            if ($uploadSuccess) {
                $imageName = TRUE;
            } else {
                $imageUpload = FALSE;
            }
        }

        if ($imageUpload === FALSE) {
            Session::flash('error', 'Image Could not be uploaded');
            return Redirect::to('admin/productType/create')
                ->withInput($request->except(array('photo')));
        }

        $presentOrder = $target->order;

        $target->name = !empty($request->name) ? $request->name : '';

        if ($imageName !== FALSE) {
            $target->photo = $filename;
        }
        $target->order = $request->order;
        $target->status = $request->status;

        if ($target->save()) {
            if ($request->order != $presentOrder) {
                Helper::updateOrder($this->controller, $request->order, $target->id, $presentOrder);
            }
            Session::flash('success', $request->name . __('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return redirect('admin/productType');
        } else {
            Session::flash('error', $request->name . __('english.COULD_NOT_BE_UPDATED_SUCCESSFULLY'));
            return redirect('admin/productType/' . $id . '/edit');
        }
    }

    public function destroy(Request $request, $id)
    {
        $target = ProductType::find($id);
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //end back same page after update

        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
        }
        //Dependency
        $dependencyArr = [
            'Product' => ['1' => 'category_id'],
        ];
        foreach ($dependencyArr as $model => $val) {
            foreach ($val as $index => $key) {
                $namespacedModel = '\\App\\Models\\' . $model;
                $dependentData = $namespacedModel::where($key, $id)->first();
                if (!empty($dependentData)) {
                    Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL') . $model);

                    return redirect('admin/productType' . $pageNumber);
                }
            }
        }

        if ($target->delete()) {
            $existsOriginalFile = public_path() . '/uploads/productType/' . $target->photo;
            if (file_exists($existsOriginalFile)) {
                File::delete($existsOriginalFile);
            } //if user uploaded success
            Helper::deleteOrder($this->controller, $target->order);
            Session::flash('error', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
        }
        return redirect('admin/productType' . $pageNumber);
    }
}
