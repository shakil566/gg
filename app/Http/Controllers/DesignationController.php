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
use App\User;
use App\Models\Designation;

class   DesignationController extends Controller {
    private $controller = "Designation";
    public function index(Request $request) {

         $designationArr = Designation::orderBy('order','asc');
         //start filter
         $searchText = $request->fil_search;

         if (!empty($searchText)) {
             $designationArr->where(function ($query) use ($searchText) {
                 $query->where('title', 'LIKE', '%' . $searchText . '%');
             });
         }


        //end filter

        $designationArr = $designationArr->get();

        // load the view and pass the designation index
        return view('admin.designation.index')->with(compact('designationArr'));
    }

    public function create(Request $request) {
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);

        return view('admin.designation.create')->with(compact('orderList','lastOrderNumber'));
    }

    public function store(Request $request) {

        $rules = array(
            'title' => 'required|Unique:designation',
            'order' => 'required'
        );

        $message = array(
            'title.required' => 'Please give the designation title!',
            'order.required' => 'Please give the designation order',
            'title.unique' => 'That designation is already taken',
        );

        $validator = Validator::make( $request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/designation/create')
                            ->withErrors($validator)
                            ->withInput( $request->all());
        }

        $designation = new Designation();
        $designation->title =  $request->title;
        $designation->order = 0;
        $designation->status =  $request->status;
        if ($designation->save()) {
            Helper :: insertOrder($this->controller, $request->order, $designation->id);
            Session::flash('success',  $request->title . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/designation');
        } else {
            Session::flash('error',  $request->title . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/designation/create');
        }

    }

    public function edit(Request $request,$id) {

        $designation = Designation::where('id', $id)->first();

        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);

        if (empty($designation)) {
            Session::flash('error', trans('english.INVALID_DATA_ID'));
            return redirect('admin/designation');
        }

        // show the edit form and pass the supplier
        return view('admin.designation.edit')->with(compact('designation','orderList'));
    }

    public function update(Request $request,$id) {

        $designation = Designation::find($id);
        $presentOrder = $designation->order;

        // validate
        $rules = array(
            'title' => 'required|Unique:designation,title,' . $id,
            'order' => 'required'
        );

        $message = array(
            'title.required' => 'Please give the designation title!',
            'order.required' => 'Please give the designation order',
            'title.unique' => 'That designation is already taken',
        );

        $validator = Validator::make( $request->all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/designation/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput( $request->all());
        }

        // store
        $designation->title =  $request->title;
        $designation->order =  $request->order;
        $designation->status =  $request->status;
        if ($designation->save()) {
            if ($request->order != $presentOrder) {
                Helper :: updateOrder($this->controller, $request->order, $designation->id, $presentOrder);
            }
            Session::flash('success',  $request->title . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return Redirect::to('admin/designation');
        } else {
            Session::flash('error',  $request->title . trans('english.COULD_NOT_BE_UPDATED'));
            return Redirect::to('admin/designation/' . $id . '/edit');
        }

    }

    public function destroy(Request $request,$id) {

        $desg = Designation::find($id);

        //Check Dependency before deletion

        $dependencyArr = ['User' => 'designation_id'];


        foreach ($dependencyArr as $model => $key) {
            $namespacedModel = '\\App\\Models\\' . $model;
            $dependentData = $namespacedModel::where($key, $id)->first();
            if (!empty($dependentData)) {
                Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL') . $model);
                return redirect('admin/designation');
            }
        }


        if ($desg->delete()) {
            Helper :: deleteOrder($this->controller, $desg->order);
            Session::flash('error', $desg->title .trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('admin/designation');
        } else {
            Session::flash('error', $desg->title .trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('admin/designation');
        }
    }
    public function filter(Request $request) {
        $url = 'fil_search=' . $request->fil_search;
        return Redirect::to('admin/designation?' . $url);
    }
}
?>
