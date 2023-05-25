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
use App\Models\Unit;

class   UnitController extends Controller {
    private $controller = "Unit";
    public function index(Request $request) {

         $unitArr = Unit::orderBy('order','asc')->get();

        // load the view and pass the unit index
        return view('admin.unit.index')->with(compact('unitArr'));
    }

    public function create(Request $request) {
        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 1);
        $lastOrderNumber = Helper::getLastOrder($this->controller, 1);

        return view('admin.unit.create')->with(compact('orderList','lastOrderNumber'));
    }

    public function store(Request $request) {

        $rules = array(
            'title' => 'required|Unique:unit',
            'order' => 'required'
        );

        $message = array(
            'title.required' => 'Please give the unit title!',
            'order.required' => 'Please give the unit order',
            'title.unique' => 'That unit is already taken',
        );

        $validator = Validator::make( $request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/unit/create')
                            ->withErrors($validator)
                            ->withInput( $request->all());
        }

        $unit = new Unit();
        $unit->title =  $request->title;
        $unit->info =  $request->info;
        $unit->order = 0;
        $unit->status =  $request->status;
        if ($unit->save()) {
            Helper :: insertOrder($this->controller, $request->order, $unit->id);
            Session::flash('success',  $request->title . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/unit');
        } else {
            Session::flash('error',  $request->title . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/unit/create');
        }

    }

    public function edit(Request $request,$id) {

        $unit = Unit::where('id', $id)->first();

        $orderList = array('0' => __('english.SELECT_ORDER_OPT')) + Helper::getOrderList($this->controller, 2);

        if (empty($unit)) {
            Session::flash('error', trans('english.INVALID_DATA_ID'));
            return redirect('admin/unit');
        }

        // show the edit form and pass the supplier
        return view('admin.unit.edit')->with(compact('unit','orderList'));
    }

    public function update(Request $request,$id) {

        $unit = Unit::find($id);
        $presentOrder = $unit->order;

        // validate
        $rules = array(
            'title' => 'required|Unique:unit,title,' . $id,
            'order' => 'required'
        );

        $message = array(
            'title.required' => 'Please give the unit title!',
            'order.required' => 'Please give the unit order',
            'title.unique' => 'That unit is already taken',
        );

        $validator = Validator::make( $request->all(), $rules, $message);


        if ($validator->fails()) {
            return Redirect::to('admin/unit/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput( $request->all());
        }

        // store
        $unit->title =  $request->title;
        $unit->info =  $request->info;
        $unit->order =  $request->order;
        $unit->status =  $request->status;
        if ($unit->save()) {
            if ($request->order != $presentOrder) {
                Helper :: updateOrder($this->controller, $request->order, $unit->id, $presentOrder);
            }
            Session::flash('success',  $request->title . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return Redirect::to('admin/unit');
        } else {
            Session::flash('error',  $request->title . trans('english.COULD_NOT_BE_UPDATED'));
            return Redirect::to('admin/unit/' . $id . '/edit');
        }

    }

    public function destroy(Request $request,$id) {

        $unit = Unit::find($id);

        //Check Dependency before deletion

        $dependencyArr = ['Product' => 'unit_id'];


        foreach ($dependencyArr as $model => $key) {
            $namespacedModel = '\\App\\Models\\' . $model;
            $dependentData = $namespacedModel::where($key, $id)->first();
            if (!empty($dependentData)) {
                Session::flash('error', __('english.COULD_NOT_DELETE_DATA_HAS_RELATION_WITH_MODEL') . $model);
                return redirect('admin/unit');
            }
        }


        if ($unit->delete()) {
            Helper :: deleteOrder($this->controller, $unit->order);
            Session::flash('error', $unit->title .trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('admin/unit');
        } else {
            Session::flash('error', $unit->title .trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('admin/unit');
        }
    }
    public function filter(Request $request) {
        $url = 'fil_search=' . $request->fil_search;
        return Redirect::to('admin/unit?' . $url);
    }
}
?>
