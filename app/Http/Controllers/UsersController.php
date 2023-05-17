<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use URL;
use Redirect;
use Helper;
use Validator;
use Response;
use Session;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\Configuration;
use App\Models\Department;
use App\Models\Designation;
use File;
use Hash;
use Mail;

class UsersController extends Controller
{
    private $controller = 'users';

    public function __construct()
    {

        Validator::extend('complexPassword', function ($attribute, $value, $parameters) {

            $password = $parameters[1];
            if (preg_match('/^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[a-z])(?=\S*[0-9])(?=\S*[`~!?@#$%^&*()\-_=+{}|;:,<.>])(?=\S*[\d])\S*$/', $password)) {
                return true;
            }

            return false;
        });

        //Get program from session
    }

    public function index(Request $request)
    {

        $groupId = $request->group_id;
        $designationId = $request->designation_id;
        $departmentIid = $request->department_id;
        $searchText = $request->search_text;

        $usersArr = User::with(array('UserGroup'));


        $usersArr = $usersArr->orderBy('group_id')->orderBy('username')->get();

        // load the view and pass the user index
        return view('admin.users.index')->with(compact('usersArr'));
    }

    public function filter(Request $request)
    {
        $groupId = $request->group_id;
        $designationId = $request->designation_id;
        $departmentIid = $request->department_id;
        $searchText = $request->search_text;
        return Redirect::to('admin/users?group_id=' . $groupId . '&designation_id=' . $designationId . '&department_id=' . $departmentIid . '&search_text=' . $searchText);
    }

    public function create()
    {


        //get user group list
        if (Auth::user()->group_id == 1) {
            $userGroup = UserGroup::where('id', '<>', 5)->orderBy('id')->pluck('name', 'id')->toArray();
        } elseif (Auth::user()->group_id == 2) {
            $userGroup = UserGroup::whereIn('id', [2, 3, 4])->orderBy('id')->pluck('name', 'id')->toArray();
        } elseif (Auth::user()->group_id == 6) {
            $userGroup = UserGroup::whereIn('id', [3, 4])->orderBy('id')->pluck('name', 'id')->toArray();
        } elseif (Auth::user()->group_id == 3) {
            $userGroup = UserGroup::whereIn('id', [3, 4])->orderBy('id')->pluck('name', 'id')->toArray();
        } else {
            $userGroup = UserGroup::whereIn('id', [4])->orderBy('id')->pluck('name', 'id')->toArray();
        }
        $data['groupList'] = array('' => '--Select User Group--') + $userGroup;

        //Get designation list
        $designationList = DB::table('designation')->where('status', '=', 1)->orderBy('order')->pluck('title', 'id')->toArray();
        $data['designationList'] = array('' => '--Select Designation--') + $designationList;

        //Get department list
        $departmentList = DB::table('department')->where('status', '=', '1')->orderBy('name')->pluck('name', 'id')->toArray();
        $data['departmentList'] = array('' => '--Select Department--') + $departmentList;


        $data['status'] = array('active' => 'Active', 'inactive' => 'Inactive');
        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {

        // return $request;
        $rules = array(
            'group_id' => 'required',
            'designation_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'official_name' => 'required',
            'password' => 'Required|min:8|Confirmed|complex_password:,' . $request->password,
            'password_confirmation' => 'required',
            'username' => 'required|alpha_num|min:4|max:45|unique:users',
            'email' => 'required|email|unique:users',
        );

        if ($request->file('photo')) {
            $rules['photo'] = 'max:2048|mimes:jpeg,png,gif,jpg';
        }

        $message = array(
            'group_id.required' => 'Group must be selected!',
            'designation_id.required' => 'Designation must be selected!',
            'department_id.required' => 'Department must be selected!',
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last name',
            'username.required' => 'Please give the username',
            'username.unique' => 'That username is already taken',
            'password.complex_password' => trans('english.WEAK_PASSWORD_FOLLOW_PASSWORD_INSTRUCTION'),
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/users/create')
                ->withErrors($validator)
                ->withInput($request->except(array('password', 'photo', 'password_confirmation')));
        }

        //User photo upload

        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/user/';
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
            return Redirect::to('admin/users/create')
                ->withInput($request->except(array('photo', 'password', 'password_confirmation')));
        }


        $user = new User;
        $user->group_id = $request->group_id;
        $user->designation_id = $request->designation_id;
        $user->department_id = $request->department_id;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->official_name = $request->official_name;
        if (!empty($request->phone_no)) {
            $user->phone_no = $request->phone_no;
        }
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        $user->email = $request->email;
        if ($imageName !== FALSE) {
            $user->photo = $filename;
        }
        $user->status = $request->status;
        $user->is_admin = '1'; //for admin

        if ($user->save()) {
            Session::flash('success', $request->username . trans('english.HAS_BEEN_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/users');
        } else {
            Session::flash('error', $request->username . trans('english.COULD_NOT_BE_CREATED_SUCCESSFULLY'));
            return Redirect::to('admin/users');
        }
    }


    public function edit(Request $request, $id)
    {
        // get the user
        $user = User::find($id);
        $data['user'] = $user;
        //get user group list

        $userGroup = UserGroup::orderBy('id')->pluck('name', 'id')->toArray();
        $data['groupList'] = array('' => 'Select User Group') + $userGroup;

        //Get designation List
        $designationList = DB::table('designation')->where('status', '=', 1)->orderBy('order')->pluck('title', 'id')->toArray();
        $data['designationList'] = array('' => '--Select Designation--') + $designationList;

        //Get department list
        $departmentList = DB::table('department')->where('status', '=', '1')->orderBy('name')->pluck('name', 'id')->toArray();
        $data['departmentList'] = array('' => '--Select Department--') + $departmentList;


        $data['status'] = array('active' => 'Active', 'inactive' => 'Inactive');

        // show the edit form and pass the usere
        return view('admin.users.edit', $data);
    }

    public function update(Request $request, $id)
    {

        // validate
        $rules = array(
            'group_id' => 'required',
            'designation_id' => 'required',
            'department_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'official_name' => 'required',
            'username' => 'required|alpha_num|min:2|max:45|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        );

        if ($request->file('photo')) {
            $rules['photo'] = 'max:2048|mimes:jpeg,png,gif,jpg';
        }

        if (!empty($request->password)) {
            $rules['password'] = 'Required|min:8|Confirmed|complex_password:,' . $request->password;
            $rules['password_confirmation'] = 'required';
        }

        $message = array(
            'group_id.required' => 'Group must be selected!',
            'designation_id.required' => 'Designation must be selected!',
            'department_id.required' => 'Department must be selected!',
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last Name',
            'username.required' => 'Please give the username',
            'username.unique' => 'That username is already taken',
            'password.complex_password' => trans('english.WEAK_PASSWORD_FOLLOW_PASSWORD_INSTRUCTION'),
        );

        $validator = Validator::make($request->all(), $rules, $message);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation', 'photo'));
        }

        //User photo upload
        $imageUpload = TRUE;
        $imageName = FALSE;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $destinationPath = public_path() . '/uploads/user/';
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
            return Redirect::to('admin/users/' . $id . '/edit')
                ->withInput($request->except(array('photo', 'password', 'password_confirmation')));
        }

        $password = $request->password;
        $groupId = $request->group_id;
        // store
        $user = User::find($id);
        if ($imageName !== FALSE) {
            $userExistsOrginalFile = public_path() . '/uploads/user/' . $user->photo;
            if (file_exists($userExistsOrginalFile)) {
                File::delete($userExistsOrginalFile);
            } //if user uploaded success

        } //if file uploaded success


        $user->group_id = $request->group_id;
        $user->designation_id = $request->designation_id;
        $user->department_id = $request->department_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->official_name = $request->official_name;
        if (!empty($request->phone_no)) {
            $user->phone_no = $request->phone_no;
        }
        $user->username = $request->username;
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        $user->email = $request->email;

        if ($imageName !== FALSE) {
            $user->photo = $filename;
        }
        $user->status = $request->status;

        if ($user->save()) {
            Session::flash('success', $request->username . trans('english.HAS_BEEN_UPDATED_SUCCESSFULLY'));
            return Redirect::to('admin/users');
        } else {
            Session::flash('error', $request->username . trans('english.COULD_NOT_BE_UPDATED'));
            return Redirect::to('admin/users/' . $id . '/edit');
        }
    }

    //User Active/Inactive Function
    public function active($id, $param = null)
    {
        if ($param !== null) {
            $url = 'users?' . $param;
        } else {
            $url = 'users';
        }
        $user = User::find($id);

        if ($user->status == 'active') {
            $user->status = 'inactive';
            $msgText = $user->username . trans('english.SUCCESSFULLY_INACTIVATE');
        } else {
            $user->status = 'active';
            $msgText = $user->username . trans('english.SUCCESSFULLY_ACTIVATE');
        }
        $user->save();
        // redirect
        Session::flash('success', $msgText);
        return Redirect::to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        // delete user table
        $user = User::where('id', '=', $id)->first();
        $userExistsOrginalFile = public_path() . '/uploads/user/' . $user->photo;
        if (file_exists($userExistsOrginalFile)) {
            File::delete($userExistsOrginalFile);
        } //if user uploaded success


        if ($user->delete()) {
            Session::flash('error', $user->username . trans('english.HAS_BEEN_DELETED_SUCCESSFULLY'));
            return Redirect::to('admin/users');
        } else {
            Session::flash('error', $user->username . trans('english.COULD_NOT_BE_DELETED'));
            return Redirect::to('admin/users');
        }
    }

    public function change_pass($id, $param = null)
    {
        if ($param !== null) {
            $url = 'users?' . $param;
        } else {
            $url = 'users';
        }

        $userInfo = User::join('user_group', 'user_group.id', '=', 'users.group_id', 'inner')
            ->join('designation', 'designation.id', '=', 'users.designation_id', 'left')
            ->join('department', 'department.id', '=', 'users.department_id', 'left')
            ->where('users.id', $id)
            ->select('users.*', 'designation.title', 'department.name as department_title')
            ->first();

        $data['userInfo'] = $userInfo;

        $data['next_url'] = $url;
        $data['user_id'] = $id;
        return view('users/change_password', $data);
    }

    public function pup(Request $request)
    {

        $next_url = $request->next_url;

        $rules = array(
            'password' => 'Required|min:8|Confirmed|complex_password:,' . $request->password,
            'password_confirmation' => 'Required',
        );

        $messages = array(
            'password.complex_password' => trans('english.WEAK_PASSWORD_FOLLOW_PASSWORD_INSTRUCTION'),
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::to('users/cp/' . $request->user_id)
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            $user = User::find($request->user_id);

            $user->password = Hash::make($request->password);
            if ($user->save()) {
                Session::flash('success', $user->username . ' ' . trans('english.PASSWORD_CHANGE_SUCCESSFUL'));
                return Redirect::to('users');
            } else {
                Session::flash('error', $user->username . ' ' . trans('english.PASSWORD_COULDNOT_CHANGE'));
                return Redirect::to('users/cp/' . $request->user_id)->withInput($request->all());
            }
        }
    }

    public function cpself(Request $request)
    {

        // if (Request::isMethod('post')) {

        $rules = array(
            'oldPassword' => 'Required',
            'password' => 'Required|min:8|Confirmed|complex_password:,' . $request->password,
            'password_confirmation' => 'Required',
        );

        $messages = array(
            'password.complex_password' => trans('english.WEAK_PASSWORD_FOLLOW_PASSWORD_INSTRUCTION'),
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Redirect::to('users/cpself')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {

            $user = User::find(Auth::user()->id);
            if (Hash::check($request->oldPassword, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                Session::flash('success', $user->username . ' ' . trans('english.PASSWORD_CHANGE_SUCCESSFUL'));
                return Redirect::to('users/cpself');
            } else {
                Session::flash('error', trans('Your current password doesn\'t match'));
                return Redirect::to('users/cpself');
            }
        }
        // }
    }

    public function editProfile(Request $request)
    {

        // validate
        $user = User::find(Auth::user()->id);
        $userExistFile = $user->photo;
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'official_name' => 'required',
        );

        if ($request->file('photo')) {
            $rules['photo'] = 'max:2048|mimes:jpeg,png,gif,jpg';
        }

        $message = array(
            'first_name.required' => 'Please give the first name',
            'last_name.required' => 'Please give the last Name',
            'email.email' => 'Invalid Email Address',
            'official_name.required' => 'Please give the official name',
        );

        $validator = Validator::make($request->all(), $rules, $message);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/profile')
                ->withErrors($validator)
                ->withInput($request->except('photo'));
        } else {
            //User photo upload
            $imageUpload = TRUE;
            $imageName = FALSE;
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $destinationPath = public_path() . '/uploads/user/';
                $filename = uniqid() . $file->getClientOriginalName();
                $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
                if ($uploadSuccess) {
                    $imageName = TRUE;
                } else {
                    $imageUpload = FALSE;
                }

                $this->load('public/uploads/user/' . $filename);
                $this->resize(100, 100);
                $this->save('public/uploads/thumbnail/' . $filename);

                //delete original image
                if (!empty($user->photo)) {
                    File::delete('public/uploads/user/' . $user->photo);
                    File::delete('public/uploads/thumbnail/' . $user->photo);
                }
            }

            if ($imageUpload === FALSE) {
                Session::flash('error', 'Image Coul\'d not be uploaded');
                return Redirect::to('users/profile')
                    ->withInput($request->except(array('photo')));
            }

            // store
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            //$user->email = $request->('email');
            $user->phone_no = $request->phone_no;
            $user->official_name = $request->official_name;
            //User photo update
            if ($imageName !== FALSE) {
                $user->photo = $filename;

                $userExistsOrginalFile = public_path() . '/uploads/user/' . $userExistFile;
                if (file_exists($userExistsOrginalFile)) {
                    File::delete($userExistsOrginalFile);
                } //if user uploaded success

                $userExistsThumbnailFile = public_path() . '/uploads/thumbnail/' . $userExistFile;
                if (file_exists($userExistsThumbnailFile)) {
                    File::delete($userExistsThumbnailFile);
                } //if user uploaded success
            }

            if ($user->save()) {
                Session::flash('success', trans('english.PROFILE_UPDATED_SUCCESSFULLY'));
                return Redirect::to('users/profile');
            } else {
                Session::flash('error', trans('english.PROFILE_COUD_NOT_BE_UPDATED'));
                return Redirect::to('users/profile');
            }
        }
    }

    //***************************************  Thumbnails Generating Functions :: Start *****************************
    public function load($filename)
    {
        $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    public function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    public function output($image_type = IMAGETYPE_JPEG)
    {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    public function getWidth()
    {
        return imagesx($this->image);
    }

    public function getHeight()
    {
        return imagesy($this->image);
    }

    public function resizeToHeight($height)
    {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    public function scale($scale)
    {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    public function resize($width, $height)
    {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }
    public function setRecordPerPage(Request $request)
    {

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
            Session::flash('error', __('english.NO_OF_RECORD_MUST_BE_LESS_THAN_999'));
            return redirect($url);
        }

        if ($request->record_per_page < 1) {
            Session::flash('error', __('english.NO_OF_RECORD_MUST_BE_GREATER_THAN_1'));
            return redirect($url);
        }

        $request->session()->put('paginatorCount', $request->record_per_page);
        return redirect($url);
    }
    //***************************************  Thumbnails Generating Functions :: End *****************************
}
