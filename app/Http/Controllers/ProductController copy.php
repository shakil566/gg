<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Unit;
use App\Models\ProductType;
use App\Models\Brand;
use App\Models\ProductImage;
use Session;
use Redirect;
use Auth;
use Common;
use Input;
use Helper;
use Image;
use File;
use Response;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $controller = 'Product';

    public function index(Request $request)
    {

        $qpArr = $request->all();

        $nameArr = Product::select('name')->orderBy('code', 'asc')->get();
        $productCodeArr = Product::select('code')->get();
        $productTypeArr = array('0' => __('english.SELECT_TYPE_OPT')) + ProductType::where('status', '1')->orderBy('order', 'asc')->pluck('name', 'id')->toArray();
        $productCategoryArr = array('0' => __('english.SELECT_CATEGORY_OPT')) + ProductCategory::orderBy('order', 'asc')->pluck('name', 'id')->toArray();
        $productUnitArr = array('0' => __('english.SELECT_UNIT_OPT')) + Unit::orderBy('order', 'asc')->pluck('title', 'id')->toArray();

        $targetArr = Product::join('product_category', 'product_category.id', '=', 'product.category_id')
            ->join('brand', 'brand.id', '=', 'product.brand_id')
            ->join('unit', 'unit.id', '=', 'product.unit_id')
            ->join('product_type', 'product_type.id', '=', 'product.type_id')
            ->select(
                'product.*',
                'product_category.name as product_category',
                'unit.title as product_unit',
                'brand.name as brand',
                'product_type.name as product_type'
            );


        //begin filtering
        $searchText = $request->search;
        if (!empty($searchText)) {
            $targetArr->where(function ($query) use ($searchText) {

                $query->where('product.name', 'LIKE', '%' . $searchText . '%');
            });
        }

        if (!empty($request->product_category)) {
            $targetArr = $targetArr->where('product.product_category_id', $request->product_category);
        }

        if (!empty($request->code)) {
            $targetArr = $targetArr->where('product.code', $request->code);
        }

        if (!empty($request->product_unit)) {
            $targetArr = $targetArr->where('product.product_unit_id', $request->product_unit);
        }
        //end filtering

        $productIdArr = $targetArr->pluck('product.id', 'product.id')->toArray();

        $targetArr = $targetArr->orderBy('product.id', 'desc')->get();

        return view('admin.product.index')->with(compact('qpArr', 'targetArr', 'productUnitArr', 'productCategoryArr', 'productTypeArr', 'nameArr', 'productCodeArr'));
    }

    public function create(Request $request)
    {
        //passing param for custom function
        $qpArr = $request->all();
        $productUnitArr = array('0' => __('english.SELECT_UNIT_OPT')) + Unit::where('status', '1')->orderBy('order', 'asc')->pluck('title', 'id')->toArray();
        $productTypeArr = array('0' => __('english.SELECT_TYPE_OPT')) + ProductType::where('status', '1')->orderBy('order', 'asc')->pluck('name', 'id')->toArray();
        $brandArr = array('0' => __('english.SELECT_BRAND_OPT')) + Brand::where('status', '1')->orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $productCategoryArr = array('0' => __('english.SELECT_CATEGORY_OPT')) + ProductCategory::orderBy('order', 'asc')->pluck('name', 'id')->toArray();

        return view('admin.product.create')->with(compact('qpArr', 'productCategoryArr', 'productTypeArr', 'brandArr', 'productUnitArr'));
    }

    //store
    public function store(Request $request)
    {
        //passing param for custom function
        $qpArr = $request->all();
        $message = [];
        $rules = [
            'name' => 'required|unique:product',
            'code' => 'required|unique:product',
            'type_id' => 'required|not_in:0',
            'category_id' => 'required|not_in:0',
            'unit_id' => 'required|not_in:0',
            'brand_id' => 'required|not_in:0',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/product/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $target = new Product;
        $target->name = $request->name;
        $target->code = $request->code;
        $target->type_id = $request->type_id;
        $target->category_id = $request->category_id;
        $target->brand_id = $request->brand_id;
        $target->unit_id = $request->unit_id;
        $target->description = !empty($request->description) ? $request->description : '';
        $target->short_description = !empty($request->short_description) ? $request->short_description : '';
        $target->status = $request->status;

        if ($target->save()) {
            Session::flash('success', $request->name . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/product');
        } else {
            Session::flash('error', $request->name . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/product');
        }
    }

    public function edit(Request $request, $id)
    {
        $target = Product::find($id);

        if (empty($target)) {
            Session::flash('error', trans('english.INVALID_DATA_ID'));
            return redirect('product');
        }

        //passing param for custom function
        $qpArr = $request->all();

        $productUnitArr = array('0' => __('english.SELECT_UNIT_OPT')) + Unit::where('status', '1')->orderBy('order', 'asc')->pluck('title', 'id')->toArray();
        $productTypeArr = array('0' => __('english.SELECT_TYPE_OPT')) + ProductType::where('status', '1')->orderBy('order', 'asc')->pluck('name', 'id')->toArray();
        $brandArr = array('0' => __('english.SELECT_BRAND_OPT')) + Brand::where('status', '1')->orderBy('name', 'asc')->pluck('name', 'id')->toArray();
        $productCategoryArr = array('0' => __('english.SELECT_CATEGORY_OPT')) + ProductCategory::orderBy('order', 'asc')->pluck('name', 'id')->toArray();

        return view('admin.product.edit')->with(compact(
            'qpArr',
            'target',
            'productTypeArr',
            'productCategoryArr',
            'brandArr',
            'productUnitArr',
        ));
    }

    //update
    public function update(Request $request)
    {
        $id = $request->id;
        $target = Product::find($id);
        //begin back same page after update
        $qpArr = $request->all();

        $message = [];
        $rules = [
            'name' => 'required|unique:product,name,' . $id,
            'code' => 'required|unique:product,code,' . $id,
            'type_id' => 'required|not_in:0',
            'category_id' => 'required|not_in:0',
            'brand_id' => 'required|not_in:0',
            'unit_id' => 'required|not_in:0',
        ];

        //Validation Rules for FSC Certification

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/product/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $target->name = $request->name;
        $target->code = $request->code;
        $target->type_id = $request->type_id;
        $target->category_id = $request->category_id;
        $target->brand_id = $request->brand_id;
        $target->unit_id = $request->unit_id;
        $target->description = !empty($request->description) ? $request->description : '';
        $target->short_description = !empty($request->short_description) ? $request->short_description : '';
        $target->status = $request->status;
        if ($target->save()) {
            Session::flash('success', $request->name . __('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return redirect('admin/product');
        } else {
            Session::flash('error', $request->name . __('english.COULD_NOT_BE_UPDATED_SUCCESSFULLY'));
            return redirect('admin/product/' . $id . '/edit');
        }
    }

    public function destroy(Request $request, $id)
    {
        $target = Product::find($id);
        //begin back same page after update
        $qpArr = $request->all();

        if (empty($target)) {
            Session::flash('error', __('english.INVALID_DATA_ID'));
        }

        // $dependencyArr = [
        //     'ProductCheckInDetails' => ['1' => 'product_id'],
        //     'ProductReturnDetails' => ['1' => 'product_id'],
        // ];
        // foreach ($dependencyArr as $model => $val) {
        //     foreach ($val as $index => $key) {
        //         $namespacedModel = '\\App\\' . $model;
        //         $dependentData = $namespacedModel::where($key, $id)->first();
        //         if (!empty($dependentData)) {
        //             Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL', ['model' => $model]));
        //             return redirect('admin/product' . $pageNumber);
        //         }
        //     }
        // }
        //end :: dependency check


        if ($target->delete()) {
            Session::flash('error', $target->name . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', $target->name . trans('english.COULD_NOT_BE_DELETED'));
        }
        return redirect('admin/product');
    }

    public function setPublish(Request $request)
    {

        $target = Product::find($request->product_id);
        $target->publish = !empty($request->publish) ? $request->publish : '0';
        $target->updated_at = date("Y-m-d H:i:s");
        $publish1 = !empty($request->publish) ? 'hidden' : 'shown';
        $publish2 = !empty($request->publish) ? 'hide' : 'show';
        if ($target->publish == '1') {
            $successMsg = __('english.PRODUCT_PUBLISHED_SUCCESSFULLY', ['publish' => $publish1]);
        } else {
            $successMsg = __('english.PRODUCT_UNPUBLISHED', ['publish' => $publish1]);
        }
        $errorMsg = __('english.SOMETHING_WRONG', ['publish' => $publish2]);

        if ($target->save()) {
            return Response::json(['success' => true, 'heading' => __('english.SUCCESS'), 'message' => $successMsg], 200);
        } else {
            return Response::json(['success' => false, 'heading' => __('english.ERROR'), 'message' => $errorMsg], 401);
        }
    }
    public function filter(Request $request)
    {
        $url = 'search=' . urlencode($request->search) . '&product_category=' . $request->product_category
            . '&code=' . $request->code . '&product_unit=' . $request->product_unit;
        return Redirect::to('admin/product?' . $url);
    }

    public function getProductImage(Request $request, $id)
    {
        $target = Product::leftJoin('product_image', 'product_image.product_id', 'product.id')
            ->where('product.id', $id)->select('product.*', 'product_image.image')
            ->first();

        if (empty($target)) {
            Session::flash('error', trans('english.INVALID_DATA_ID'));
            return redirect('admin/product');
        }
        $qpArr = $request->all();
        $imageArr = !empty($target->image) ? json_decode($target->image, true) : [];

        return view('admin.product.productImage')->with(compact('qpArr', 'target', 'imageArr'));
    }

    public function newProductImage()
    {

        $view = view('admin.product.newProductImage')->render();
        return response()->json(['html' => $view]);
    }

    public function setProductImage(Request $request)
    {

        $qpArr = $request->all();
        $data = [];
        $i = 0;
        if (!empty($request->product_image)) {
            foreach ($request->product_image as $key => $image) {


                if ($request->hasFile('product_image.' . $key)) {
                    $file = $request->file('product_image');
                    $filename = uniqid() .'.'. $image->getClientOriginalExtension();
                    $destinationPath = public_path() . '/uploads/product/';

                    $uploadSuccess = $request->file('product_image.' . $key)->move($destinationPath, $filename);
                    $data[$i] = $filename;
                    $i++;
                }

            }
        }
        if (!empty($request->prev_product_image)) {
            foreach ($request->prev_product_image as $pKey => $pImage) {
                $data[$i] = $pImage;
                $i++;
            }
        }

        $preImage = ProductImage::where('product_id', $request->product_id)->select('id')->first();
        $target = !empty($preImage->id) ? ProductImage::find($preImage->id) : new ProductImage;
        $target->product_id = $request->product_id;
        $target->image = json_encode($data);
        $target->created_by = Auth::user()->id;
        $target->created_at = date('Y-m-d H:i:s');

        if ($target->save()) {
            Session::flash('success', __('english.PRODUCT_IMAGE_SAVED_SUCCESSFULLY'));
            return redirect('admin/product');
        } else {
            Session::flash('error', __('english.PRODUCT_CATEGORY_COULD_NOT_BE_UPDATED'));
            return redirect('admin/product/' . $request->product_id . '/getProductImage');
        }
    }


    public function getProductDetails(Request $request)
    {
        $targetArr = Product::join('product_category', 'product_category.id', '=', 'product.category_id')
            ->join('brand', 'brand.id', '=', 'product.brand_id')
            ->join('unit', 'unit.id', '=', 'product.unit_id')
            ->join('product_type', 'product_type.id', '=', 'product.type_id')
            ->where('product.id', $request->product_id)
            ->select(
                'product.*',
                'product_category.name as product_category',
                'unit.title as product_unit',
                'brand.name as brand',
                'product_type.name as product_type'
            )->first();

        $view = view('admin.product.showProductDetails', compact('targetArr'))->render();
        return response()->json(['html' => $view]);
    }
}
