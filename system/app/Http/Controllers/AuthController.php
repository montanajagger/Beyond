<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use DB;

class AuthController extends Controller
{
  public $successStatus = 200;
    //register api
    public function register(Request $request){
        $id = $request->id;
        if ($id) {
            $validator = Validator::make($request->all(),
            [
                 'email' => 'required|string|email|max:254|unique:users,'.$id,
                 'name' => 'required|string|max:254',
                 //'title' => 'required',
                 'phone' => 'required',
                 //'city' => 'required',
            ]);

        } else {
            $validator = Validator::make($request->all(),
            [
                 'email' => 'required|string|email|max:254|unique:users',
                 'name' => 'required|string|max:254',
                 //'title' => 'required',
                 'phone' => 'required',
                 //'city' => 'required',
                 'password' => 'required',
            ]);
        }

        $attributeNames = array(
            'email' => 'Email Address',
        );

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

        if (!$id) {
            $user_exists = User::where('email',$request->email)->first();

            if(!is_null($user_exists)){
              return response()->json(['error'=>'Email already exists'],401);
            }
        }

        $data = ([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'customer',
            'status' => 1
        ]);

        if($request->has('title')){
            $data += ['secretary_title' => $request->title];
        }
        if($request->has('note')){
            $data += ['discription' => $request->note];
        }
        if($request->has('city')){
            $data += ['city' => $request->city];
        }
        if($request->has('work')){
            $data +=  ['work' => $request->work];
        }
        if ($id) {
            $user = User::update($data);
            return response()->json(['success'=>true], $this->successStatus);
        } else {
            $user = User::create($data);
            DB::table('user_has_groups')->insert(['group_id' => 14, 'user_id' => $user->id]);
            $success['token'] =  $user->createToken('beyond-client')->accessToken;
            $success['name'] =  $user->name;
            return response()->json(['success'=>$success], $this->successStatus);
        }
    }

    // login api
    public function login(){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] = $user->createToken('beyond-client')->accessToken;
        //$success['token'] = $user->generateToken();
        $success['user'] = ([
            "id" =>  $user->id,
            "user_type" =>  $user->user_type,
            "phone" =>  $user->phone,
            "name" =>  $user->name,
            "email" =>  $user->email,
            "work" =>  $user->work,
            "city" =>  $user->city,
            "picture" =>  url('uploads/').'/'.$user->picture,
            "title" =>  $user->title,
            "discription" =>  $user->discription,
            "status" =>  $user->status,
            "created_at" =>  $user->created_at
       ]);
      $success['subscription'] = null;
      $subscription = DB::table('user_subscriptions')->where('user_id',$user->id)->first();
      if(!is_null($subscription)){
        $success['subscription'] = $subscription;
      }
      return response()->json(['success'=>$success],$this->successStatus);
      }
      else{
        return response()->json(['error'=>'Unauthorised'],401);
      }
    }

    // user detail api
    public function user(){
      $user = Auth::user();
      return response()->json(['success' => $user], $this->successStatus);
    }

    // user logout api
    public function logout(){
      $user = Auth::user();
      return response()->json(['success'=>'Successfully Logout!']);
    }

    //Client Voice Message

}
