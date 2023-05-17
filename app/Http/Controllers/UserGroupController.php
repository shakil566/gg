<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use URL;
use Redirect;
use Helper;
use Validator;
use Response;
use Session;
use App\User;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    private $controller = "UserGroup";

    public function index()
    {
        $userGroupArr = UserGroup::orderBy('order','asc')->get();
        // load the view and pass the nerds
        return view('admin.userGroup.index')->with(compact('userGroupArr'));
    }

    public function create(Request $request)
    {
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);

        return view('admin.userGroup.create')->with(compact('orderList', 'lastOrderNumber'));
    }

    public function store(Request $request)
    {

        $rules = array(
            'name' => 'required|Unique:user_group',
            'order' => 'required'
        );

        $message = array(
            'name.required' => 'Please give the userGroup name!',
            'order.required' => 'Please give the userGroup order',
            'name.unique' => 'That userGroup is already taken',
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/userGroup/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $userGroup = new UserGroup();
        $userGroup->name = $request->name;
        $userGroup->info = $request->info;
        $userGroup->order = 0;
        $userGroup->status =  $request->status;
        if ($userGroup->save()) {
            Helper::insertOrder($this->controller, $request->order, $userGroup->id);
            Session::flash('success',  $request->name . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/userGroup');
        } else {
            Session::flash('error',  $request->name . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/userGroup/create');
        }
    }

    public function edit($id)
    {
        // get the User Group
        $userGroup = UserGroup::find($id);
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);

        // show the edit form and pass the user group
        return view('admin.userGroup.edit')->with(compact('orderList', 'userGroup'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // Process the login
        if ($validator->fails()) {

            return Redirect::to('admin/userGroup/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $userGroup = UserGroup::find($id);
            $presentOrder = $userGroup->order;

            $userGroup->name = $request->name;
            $userGroup->info = $request->info;
            $userGroup->order =  $request->order;
            $userGroup->status =  $request->status;
            $result = $userGroup->save();

            // redirect
            if ($result === TRUE) {
                if ($request->order != $presentOrder) {
                    Helper :: updateOrder($this->controller, $request->order, $userGroup->id, $presentOrder);
                }
                Session::flash('success', $request->name . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
                return Redirect::to('admin/userGroup');
            } else {
                Session::flash('error', $request->name . trans('english.COULD_NOT_BE_UPDATED'));
                return Redirect::to('admin/userGroup/' . $id . '/edit');
            }
        }
    }

    public function destroy(Request $request,$id) {

        $userGroup = UserGroup::find($id);

        //Check Dependency before deletion

        $dependencyArr = ['User' => 'group_id'];


        foreach ($dependencyArr as $model => $key) {
            $namespacedModel = '\\App\\Models\\' . $model;
            $dependentData = $namespacedModel::where($key, $id)->first();
            if (!empty($dependentData)) {
                Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL') . $model);
                return redirect('admin/userGroup');
            }
        }


        if ($userGroup->delete()) {
            Helper :: deleteOrder($this->controller, $userGroup->order);
            Session::flash('error', $userGroup->name .trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('admin/userGroup');
        } else {
            Session::flash('error', $userGroup->name .trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('admin/userGroup');
        }
    }
}
