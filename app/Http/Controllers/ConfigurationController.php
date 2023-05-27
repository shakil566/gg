<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\KonitaBankAccount;
use App\Models\SignatoryInfo;
use App\Models\CompanyInformation;
use App\Models\Country;
use App\Models\State;
use Auth;
use Session;
use Redirect;
use Helper;
use Response;
use File;
use Image;
use Illuminate\Http\Request;

class ConfigurationController extends Controller {

    private $controller = 'Configuration';

    public function index(Request $request) {
        //passing param for custom function
        $qpArr = $request->all();

        $targetArr = SignatoryInfo::select('signatory_info.*');
        $target = SignatoryInfo::select('id', 'name', 'designation', 'seal')->first();
        $companyInfo = CompanyInformation::select('*')->first();
        $addressInfo = CompanyInformation::select('country_id', 'state_id', 'zip_code'
                        , 'street_address', 'city')->first();

        //echo '<pre>';print_r($addressInfo->toArray());exit;
        $countryList = array('0' => __('label.SELECT_COUNTRY_OPT')) + Country::pluck('name', 'id')->toArray();
        $stateList = ['0' => __('label.SELECT_STATE_OPT')] + State::where('country_id', old('country_id') ?? 230)->pluck('state_code', 'id')->toArray();
        $hasState = Country::where('id', 230)->where('has_state', '1')->first();
        $targetArr = $targetArr->paginate(Session::get('paginatorCount'));
        //change page number after delete if no data has current page
        if ($targetArr->isEmpty() && isset($qpArr['page']) && ($qpArr['page'] > 1)) {
            $page = ($qpArr['page'] - 1);
            return redirect('/configuration?page=' . $page);
        }
        return view('configuration.index')->with(compact('targetArr', 'qpArr', 'target', 'companyInfo', 'countryList', 'stateList', 'addressInfo', 'hasState'));
    }

    public function store(Request $request) {
        $qpArr = $request->all();
        $target = SignatoryInfo::select('id', 'name', 'designation', 'seal')->first();
        $target = SignatoryInfo::where('id', $request->id)->first();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //validation
        $rules = [
            'name' => 'required',
            'designation' => 'required',
        ];
        if (empty($request->seal) && empty($target->seal)) {
            $rules['seal'] = 'required';
        }
        if (!empty($request->seal)) {
            $rules['seal'] = 'required|mimes:png,jpg,jpeg|max:500';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $validator->errors()), 400);
        }
        //end validation
        $file = $request->file('seal');

        if (!empty($target->seal)) {

            $prevfileName = 'public/img/signatoryInfo/' . $target->seal;

            if (!empty($file)) {
                if (File::exists($prevfileName)) {
                    File::delete($prevfileName);
                }
            }
        }

        if (!empty($file)) {
            $fileName = uniqid() . "_" . Auth::user()->id . "." . $file->getClientOriginalExtension();
            $file->move('public/img/signatoryInfo', $fileName);
        }
        if (empty($target)) {
            $target = new SignatoryInfo;
        }

        $target->name = $request->name;
        $target->designation = $request->designation;
        $target->seal = !empty($fileName) ? $fileName : $target->seal;

        if ($target->save()) {
            return Response::json(['success' => true, 'heading' => __('label.SUCCESS'), 'message' => __('label.BANK_INFO_CREATED_SUCCESSFULLY')], 200);
        } else {
            return Response::json(['success' => false, 'heading' => __('label.ERROR'), 'message' => __('label.BANK_INFO_COULD_NOT_BE_CREATED_SUCCESSFULLY')], 401);
        }
    }

    public function newPhoneNumberRow(Request $request) {

        $view = view('configuration.addPhoneNumber')->render();
        return response()->json(['html' => $view]);
    }

    public function saveCompanyInfo(Request $request) {
//        echo '<pre>';        print_r($request->all());exit;
        $qpArr = $request->all();

        $target = CompanyInformation::select('*')->first();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //validation
        $rules = [
            'name' => 'required',
//            'address' => 'required',
            'phone_number' => 'required',
            'hotline' => 'required',
//            'vat' => 'required',
            'email' => 'required',
        ];
        if (empty($request->image) && empty($target->logo)) {
            $rules['image'] = 'required';
        }
        if (!empty($request->image)) {
            $rules['image'] = 'required|mimes:png,jpg,jpeg|max:500';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $validator->errors()), 400);
        }
        //end validation
        $jsonEncodedPhoneNumber = json_encode($request->phone_number);

        if (empty($target)) {
            $target = new CompanyInformation;
        }
        $target->name = $request->name;
//        $target->address = $request->address;
//        $target->google_emed = $request->google_emed;
        $target->phone_number = $jsonEncodedPhoneNumber;
        $target->email = $request->email;
        $target->hotline = $request->hotline;
        $target->vat = $request->vat ?? 0;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $fullName = Auth::user()->id . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
            $path = "public/uploads/frontLogo/";
            $img->move($path, $fullName);
            $prvPhoto = 'public/uploads/frontLogo/' . $target->logo;
            if (File::exists($prvPhoto)) {
                File::delete($prvPhoto);
            }
            $target->logo = $fullName;
        }

        $target->include_vat = !empty($request->include_vat) ? '1' : '0';
        $target->website = $request->website;

        if ($target->save()) {
            return Response::json(['success' => true, 'heading' => __('label.SUCCESS'), 'message' => __('label.COMPANY_INFO_CREATED_SUCCESSFULLY')], 200);
        } else {
            return Response::json(['success' => false, 'heading' => __('label.ERROR'), 'message' => __('label.BANK_INFO_COULD_NOT_BE_CREATED_SUCCESSFULLY')], 401);
        }
    }

    public function storeCompanyAddress(Request $request) {
        $qpArr = $request->all();
        $stateCode = State::where('state.id', $request->state_id)->first();
        $countryName = Country::where('id', $request->country_id)->first();

        // $address = $request->street_address.','." ".$request->city.','." ".($stateCode->state_code ?? '').','." ".$request->zip_code.','." ".$countryName->name;
        $address = $request->street_address.','." ".$request->city.','." ".$request->zip_code.','." ".$countryName->name;


//        echo "<pre>";
//        print_r($address);
//        exit;

        $target = CompanyInformation::select('*')->first();
        $hasState = Country::where('id', $request->country_id)->where('has_state', '1')->first();
        $count = State::where('state.country_id', $request->country_id)
                ->first();
        $pageNumber = !empty($qpArr['page']) ? '?page=' . $qpArr['page'] : '';
        //validation
        $rules = $message = array();
        $rules = [
            'street_address' => 'required',
            'city' => 'required',
            'country_id' => 'required|not_in:0',
            'zip_code' => 'required',
            'google_emed' => 'required',
        ];

        if (!empty($hasState) || !empty($count)) {
            $rules['state_id'] = 'required|not_in:0';
        }

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return Response::json(array('success' => false, 'heading' => 'Validation Error', 'message' => $validator->errors()), 400);
        }

        //end validation

        if (empty($target)) {
            $target = new CompanyInformation;
        }
        $target->address = $address;
        $target->street_address = $request->street_address;
        $target->city = $request->city;
        $target->country_id = $request->country_id;
        $target->state_id = $request->state_id;
        $target->zip_code = $request->zip_code;
        $target->google_emed = $request->google_emed;

        if ($target->update()) {
            return Response::json(['success' => true, 'heading' => __('label.SUCCESS'), 'message' => __('label.COMPANY_ADDRESS_STORED_SUCCESSFULLY')], 200);
        } else {
            return Response::json(['success' => true, 'heading' => __('label.ERROR'), 'message' => __('label.COMPANY_ADDRESS_COULD_NOT_BE_STORED_SUCCESSFULLY')], 401);
        }
    }

    public static function getState(Request $request) {
        //country wise state
        $hasState = Country::where('id', $request->country_id)->where('has_state', '1')->first();

        $stateList = ['0' => __('label.SELECT_STATE_OPT')] + State::where('country_id', $request->country_id)->pluck('state_code', 'id')->toArray();
        //rendering view
        $html = view('configuration.showState', compact('stateList', 'hasState'))->render();
        return Response::json(['html' => $html]);
    }

}
