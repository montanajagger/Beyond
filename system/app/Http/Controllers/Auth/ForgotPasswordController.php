<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{

    public $successStatus = 200;
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm(){
        $pageConfigs = ['bodyCustomClass' => 'forgot-bg', 'isCustomizer' => false];
  
        return view('/auth/passwords/email', [
          'pageConfigs' => $pageConfigs
        ]);
      }

    /**
     * Send a reset password token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getResetToken(Request $request)
    {
            $this->validate($request, ['email' => 'required|email']);
         
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                return response()->json(['error'=>'Email address not found!'],401);
            }
            $token = $this->broker()->createToken($user); 
            return response()->json(['phone'=> $user->phone, 'token'=> $token, 'message' => 'Your password has been reset!'], $this->successStatus);   
    }
}
