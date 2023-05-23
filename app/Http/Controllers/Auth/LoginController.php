<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {

            if (auth()->user()->is_admin == 1) {
                $notification=array('messege' => 'You are logged in!', 'alert-type' => 'success');
                return redirect()->route('admin')->with($notification);
            } else {
                return redirect()->route('home');
                //need a sweet alert with massage You are not admin and back to frontend homepage
            }
        } else {
            return redirect()->back()->withInput()->with('error', __('english.INVALID_EMAIL_OR_PASSWORD'));
        }
    }

    //admin login page
    public function adminLogin()
    {

        return view('auth.adminLogin');
    }
}
