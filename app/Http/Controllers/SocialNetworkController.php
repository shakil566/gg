<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User; //model class
use App\Models\SocialNetwork; //model class
use Session;
use Redirect;
use Auth;
use File;
use Image;
use Input;
use PDF;
use URL;
use Helper;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller {

    private $controller = 'SocialNetwork';

    public function index(Request $request) {


        //passing param for custom function
        $qpArr = $request->all();

        //get data
        $targetArr = SocialNetwork::select('*')
                ->orderBy('social_network.order', 'asc');

        $targetArr = $targetArr->paginate(Session::get('paginatorCount'));

        //change page number after delete if no data has current page
        if ($targetArr->isEmpty() && isset($qpArr['page']) && ($qpArr['page'] > 1)) {
            $page = ($qpArr['page'] - 1);
            return redirect('/admin/socialNetwork?page=' . $page);
        }

        return view('content.socialNetwork.index')->with(compact('qpArr', 'targetArr'));
    }

    public function create(Request $request) {
        //passing param for custom function
        $qpArr = $request->all();
        $orderList = array('0' => __('label.SELECT_ORDER_OPT')) + getOrderList($this->controller, 1);
        $lastOrderNumber = getLastOrder($this->controller, 1);
         $iconList = [
            '0' => '-- Select Icon --',
            'fa fa-facebook' => '<i class="fa fa-facebook"></i> Facebook',
            'fa fa-twitter' => '<i class="fa fa-twitter"></i> Twitter',
            'fa fa-instagram' => '<i class="fa fa-instagram"></i> Instagram',
            'fa fa-vimeo' => '<i class="fa fa-vimeo"></i> Vimeo',
            'fa fa-pinterest' => '<i class="fa fa-pinterest"></i> Pinterest',
        ];

        return view('content.socialNetwork.create')->with(compact('qpArr', 'orderList', 'iconList', 'lastOrderNumber'));
    }

    public function store(Request $request) {

        //passing param for custom function
        $qpArr = $request->all();

//        print_r($request->all());exit;
//        use for back default page after operation
        $pageNumber = $qpArr['filter'];


        $rules = [
            'booking_id' => 'required|not_in:0',
            'title' => 'required',
            'icon' => 'required|not_in:0',
            'url' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/admin/socialNetwork/create')
                            ->withInput($request->all())
                            ->withErrors($validator);
        }

        $target = new SocialNetwork;
        $target->title = $request->title;
        $target->icon = $request->icon;
        $target->url = $request->url;
        $target->order = $request->booking_id;
        $target->status_id = $request->status_id;

        if ($target->save()) {
             insertOrder($this->controller, $request->booking_id, $target->id);
            Session::flash('success', $request->title ." ". __('label.HAS_BEEN_CREATED_SUCESSFULLY'));
            return redirect('admin/socialNetwork');
        } else {
            Session::flash('error', $request->title ." ". __('label.COULD_NOT_BE_CREATED_SUCESSFULLY'));
            return redirect('admin/socialNetwork/create' . $pageNumber);
        }
    }

    public function edit(Request $request, $id) {

        //passing param for custom function
        $qpArr = $request->all();

        //get id wise data
        $target = SocialNetwork::find($id);
        $iconList = [
            '0' => '-- Select Icon --',
            'fa fa-facebook' => '<i class="fa fa-facebook"></i> Facebook',
            'fa fa-twitter' => '<i class="fa fa-twitter"></i> Twitter',
            'fa fa-instagram' => '<i class="fa fa-instagram"></i> Instagram',
            'fa fa-vimeo' => '<i class="fa fa-vimeo"></i> Vimeo',
            'fa fa-pinterest' => '<i class="fa fa-pinterest"></i> Pinterest',
        ];
        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
            return redirect('admin/socialNetwork');
        }
        $orderList = array('0' => __('label.SELECT_ORDER_OPT')) + getOrderList($this->controller, 2);
        return view('content.socialNetwork.edit')->with(compact('qpArr', 'target', 'orderList','iconList'));
    }

    public function update(Request $request, $id) {

        $target = SocialNetwork::find($id);

        $presentOrder = $target->order;
        //begin back same page after update
        $qpArr = $request->all();

        $pageNumber = $qpArr['filter'];
        //end back same page after update

        $rules = [
            'booking_id' => 'required|not_in:0',
            'title' => 'required',
            'icon' => 'required|not_in:0',
            'url' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/admin/socialNetwork/'.$id.'/edit')
                            ->withInput($request->all())
                            ->withErrors($validator);
        }



        $target->title = $request->title;
        $target->icon = $request->icon;
        $target->url = $request->url;
        $target->order = $request->booking_id;
        $target->status_id = $request->status_id;

        if ($target->save()) {
            if ($request->booking_id != $presentOrder) {
                 updateOrder($this->controller, $request->booking_id, $target->id, $presentOrder);
            }
            Session::flash('success', __('label.UPDATED_SUCCESSFULLY'));
            return redirect('admin/socialNetwork' . $pageNumber);
        } else {
            Session::flash('error', __('label.COULD_NOT_BE_UPDATED'));
            return redirect('admin/socialNetwork/' . $id . '/edit' . $pageNumber);
        }
    }

    public function destroy(Request $request, $id) {
        $target = SocialNetwork::find($id);

        //begin back same page after update
        $qpArr = $request->all();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '?page=';
        //end back same page after update

        if (empty($target)) {
            Session::flash('error', __('label.INVALID_DATA_ID'));
        }


        if ($target->delete()) {
             deleteOrder($this->controller, $target->order);
            //delete data related file

            Session::flash('error', __('label.SOCIAL_NETWORK_HAS_BEEN_DELETED_SUCCESSFULLY'));
        } else {
            Session::flash('error', __('label.COULD_NOT_BE_DELETED'));
        }
        return redirect('admin/socialNetwork' . $pageNumber);
    }

    public function setRecordPerPage(Request $request) {

        $referrerArr = explode('?', URL::previous());
        $queryStr = '';
        if (!empty($referrerArr[1])) {
            $queryParam = explode('&', $referrerArr[1]);
            foreach ($queryParam as $item) {
                $valArr = explode('=', $item);
                if ($valArr[0] != 'page') {
                    $queryStr .= $item . '&';
                }
            }
        }

        $url = $referrerArr[0] . '?' . trim($queryStr, '&');

        if ($request->record_per_page > 999) {
            Session::flash('error', __('label.NO_OF_RECORD_MUST_BE_LESS_THAN_999'));
            return redirect($url);
        }

        if ($request->record_per_page < 1) {
            Session::flash('error', __('label.NO_OF_RECORD_MUST_BE_GREATER_THAN_1'));
            return redirect($url);
        }

        $request->session()->put('paginatorCount', $request->record_per_page);
        return redirect($url);
    }

}
