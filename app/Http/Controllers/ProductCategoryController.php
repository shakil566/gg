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

use App\Models\ProductCategory;

use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{

    private $controller = 'ProductCategory';

    public function index(Request $request)
    {

        $productCategoryArr = ProductCategory::select('product_category.*')
            ->orderBy('order', 'asc')->get();

        return view('admin.productCategory.index')->with(compact('productCategoryArr'));
    }

    public function filter(Request $request)
    {
        $url = 'fil_search=' . $request->fil_search;
        return Redirect::to('admin/productCategory?' . $url);
    }

    public function create(Request $request)
    {

        $qpArr = $request->all();

        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);
        return view('admin.productCategory.create')->with(compact('qpArr', 'orderList', 'lastOrderNumber'));
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
            return Redirect::to('admin/productCategory/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        //productCategory photo upload
        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/productCategory/';
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
            return Redirect::to('admin/productCategory/create')
                ->withInput($request->except(array('photo')));
        }


        $productCategory = new ProductCategory;
        $productCategory->name = $request->name;
        if ($imageName !== FALSE) {
            $productCategory->photo = $filename;
        }
        $productCategory->order = $request->order;
        $productCategory->status = $request->status;
        if ($productCategory->save()) {
            Helper::insertOrder($this->controller, $request->order, $productCategory->id);
            Session::flash('success',   $request->name . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/productCategory');
        } else {
            Session::flash('error',   $request->name . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/productCategory/create');
        }
    }

    public function edit(Request $request, $id)
    {
        $qpArr = $request->all();
        $productCategory = ProductCategory::find($id);
        if (empty($productCategory)) {
            Session::flash('error', __('english.INVALID_DATA_ID'));
            return redirect('admin/productCategory');
        }
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);
        return view('admin.productCategory.edit')->with(compact('qpArr', 'productCategory', 'orderList'));
    }

    public function update(Request $request, $id)
    {

        $target = ProductCategory::find($id);

        $rules = [
            'name' => 'required',
        ];
        $message = array(
            'name.required' => 'Please enter productCategory name!',
        );

        $validator = Validator::make($request->all(), $rules, $message);


        if ($validator->fails()) {
            return Redirect::to('admin/productCategory/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        //productCategory photo upload
        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/productCategory/';
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
            return Redirect::to('admin/productCategory/create')
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
            return redirect('admin/productCategory');
        } else {
            Session::flash('error', $request->name . __('english.COULD_NOT_BE_UPDATED_SUCCESSFULLY'));
            return redirect('admin/productCategory/' . $id . '/edit');
        }
    }

    public function destroy(Request $request, $id)
    {
        $target = ProductCategory::find($id);
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

                    return redirect('admin/productCategory' . $pageNumber);
                }
            }
        }

        if ($target->delete()) {
            $existsOriginalFile = public_path() . '/uploads/productCategory/' . $target->photo;
            if (file_exists($existsOriginalFile)) {
                File::delete($existsOriginalFile);
            } //if user uploaded success
            Helper::deleteOrder($this->controller, $target->order);
            Session::flash('error', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
        }
        return redirect('admin/productCategory' . $pageNumber);
    }
}
