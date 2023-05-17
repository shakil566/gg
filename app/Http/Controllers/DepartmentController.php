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
use App\Models\User;

use App\Models\Department;

use Illuminate\Support\Str;
use App\PhaseToSubject;

class DepartmentController extends Controller {

    private $controller = 'Department';

    public function index(Request $request) {
        $nameArr = Department::select('name')->orderBy('id', 'asc')->get();
        $qpArr = $request->all();

//        $pageNumber = $qpArr['filter'];

        $targetArr = Department::select('department.*' )
                ->orderBy('order', 'asc');
//        echo '<pre>';
//        print_r($targetArr);
//        exit;

        $searchText = $request->fil_search;
        if (!empty($searchText)) {
            $targetArr->where(function ($query) use ($searchText) {
                $query->where('department.name', 'LIKE', '%' . $searchText . '%');
            });
        }

        $targetArr = $targetArr->paginate(trans('english.PAGINATION_COUNT'));

        return view('department.index')->with(compact('targetArr', 'nameArr', 'qpArr'));
    }

    public function filter(Request $request) {
        $url = 'fil_search=' . $request->fil_search;
        return Redirect::to('department?' . $url);
    }

    public function create(Request $request) {

        $qpArr = $request->all();

        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);
        return view('department.create')->with(compact('qpArr', 'orderList', 'lastOrderNumber'));
    }

    public function store(Request $request) {

        $rules = array(
            'name' => 'required|unique:department',
        );

        $validator = Validator::make($request->all(), $rules);



        if ($validator->fails()) {
            //echo '<pre>'; print_r($validator);exit;
            return Redirect::to('department/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
        }

        $department = new Department;
        $department->name = $request->name;
        $department->order = $request->order;
        $department->status = $request->status;
        if ($department->save()) {

            Helper :: insertOrder($this->controller, $request->order, $department->id);
            Session::flash('success', trans('english.DEPARTMENT_CREATED_SUCESSFULLY'));
            return Redirect::to('department');
        } else {
            Session::flash('error', trans('english.DEPARTMENT_COULD_NOT_BE_CREATED'));
            return Redirect::to('department/create');
        }
    }

    public function edit(Request $request, $id) {
        $qpArr = $request->all();
        $target = Department::find($id);
        if (empty($target)) {
            Session::flash('error', __('english.INVALID_DATA_ID'));
            return redirect('department');
        }
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);
        return view('department.edit')->with(compact('qpArr', 'target', 'orderList'));
    }

    public function update(Request $request, $id) {

        $target = Department::find($id);
        $qpArr = $request->all();
//        $pageNumber = $qpArr['filter'];
        $rules = [
            // 'order' => 'required',
            'name' => 'required',
        ];
        $message = array(
            'name.required' => 'Please enter department name!',
        );

        $validator = Validator::make($request->all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('department/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput($request->all());
        }

        $presentOrder = $target->order;

        $target->name = !empty($request->name) ? $request->name : '';
        $target->order = $request->order;
        $target->status = $request->status;

        if ($target->save()) {
            if ($request->order != $presentOrder) {
                Helper :: updateOrder($this->controller, $request->order, $target->id, $presentOrder);
            }
            Session::flash('success', $request->name . __('english.HAS_BEEN_UPDATED_SUCESSFULLY'));
            return redirect('department');
        } else {
            Session::flash('error', $request->name . __('english.COULD_NOT_BE_UPDATED_SUCESSFULLY'));
            return redirect('department/' . $id . '/edit');
        }
    }

    public function destroy(Request $request, $id) {
        $target = Department::find($id);
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //end back same page after update

        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
        }
        //Dependency
        $dependencyArr = [
            'User' => ['1' => 'department_id'],
        ];
        foreach ($dependencyArr as $model => $val) {
            foreach ($val as $index => $key) {
                $namespacedModel = '\\App\\Models\\' . $model;
                $dependentData = $namespacedModel::where($key, $id)->first();
                if (!empty($dependentData)) {
                    Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL') . $model);

                    return redirect('department' . $pageNumber);
                }
            }
        }

        if ($target->delete()) {
            Helper :: deleteOrder($this->controller, $target->order);
            Session::flash('error', $target->name  . __('english.DEPARTMENT_HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', __('english.DEPARTMENT_COULD_NOT_BE_DELETED'));
        }
        return redirect('department' . $pageNumber);
    }

}
