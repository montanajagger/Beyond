<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'dashboard';

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
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin' ]) || \Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'subadmin' ])) {
            
            return redirect()->intended('dashboard');
        }  else {
            // echo "login failed";
            // exit();
            return redirect('/');

            $this->incrementLoginAttempts($request);
            return response()->json([
                'error' => 'This account is not activated.'
            ], 401);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    // Login
    public function showLoginForm(){
       $pageConfigs = ['bodyCustomClass' => 'login-bg', 'isCustomizer' => false];
  
        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ]);
      }
      /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }
}
