<?php

namespace App\Http\Controllers;

use App\Events\NewProduct;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
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
// use App\Notifications\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendMailController extends Controller
{
    private $controller = "SendMail";

    public function index()
    {
        $userArr = User::select("id", DB::raw("CONCAT(first_name, ' ', last_name) as full_name"))->orderBy('id', 'asc')->pluck('full_name', 'id')->toArray();

        // load the view and pass the nerds
        return view('admin.mailSend.index')->with(compact('userArr'));
    }

    public function send(Request $request)
    {

        $rules = array(
            'subject' => 'required',
            'description' => 'required',
            'user_id' => 'required'
        );

        $message = array(
            'subject.required' => 'Please give the subject!',
            'description.required' => 'Please give description!',
            'user_id.required' => 'Please select at least one user!',
        );

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return Redirect::to('admin/sendMail')
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $subject = $request->subject ?? 'No Subject';
        $body = $request->description ?? '';
        $userName = '';
        // $userArr = !empty($request->user_id) ? implode(',', $request->user_id) : ''; //show with comma
        $userAll = !empty($request->user_id) ? $request->user_id : '[]';

        try {
            $userArr = User::whereIn('id', $userAll)->select('id', 'first_name', 'last_name', 'email')->get();

            if (!empty($userArr)) {
                foreach ($userArr as $user) {
                    $userName = $user->first_name . ' ' .  $user->last_name;
                    $userEmail = $user->email ?? '';

                    //Send mail with event listener
                    // $data = ['userEmail' => $userEmail ,'subject' => $subject, 'body' => $body, 'userName' => $userName,];
                    // event(new NewProduct($userEmail, $subject, $body, $userName));

                    //send with Mail
                    Mail::to($userEmail)->send(new SendMail($subject, $body, $userName));

                    //send with Notification
                    // $user->notify(new SendMail($subject, $body, $userName)); //notify method
                    // Notification::send($user, new SendMail($subject, $body, $userName)); //notify facades
                }
            }

            Session::flash('success',  'Mail send successfully');
            return Redirect::to('admin/sendMail');
        } catch (\Exception $e) {
            Session::flash('error',  'Mail not send');
            return Redirect::to('admin/sendMail');
        }
    }
}
