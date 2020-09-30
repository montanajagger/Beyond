<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Carbon\Carbon;
use App\Helpers\Helper;

class MessageController extends Controller
{
  public $successStatus = 200;


  public function insert_voice_message(Request $request){

        $validator = Validator::make($request->all(), [
            'voice' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

        $userId = $request->user()->id;
        $user_found = User::where('id',$userId)->first();

        if(is_null($user_found)){
          return response()->json(['error'=>'User id not found'],401);
        }

       $voice_msg = null;
       if ($request->hasFile('voice')) {
          $voice = $request->voice;
          $extension = $voice->getClientOriginalExtension();
          $filename = uniqid() . '_' . time() . '.' . $extension;
          $voice->move('uploads/voice_messages/', $filename);
          $voice_msg = $filename;
        }


        $data = ([
            'user_id' => $userId,
            'voice_msg' => $voice_msg
        ]);

        $voice_inserted = DB::table('voice_messages')->insert($data);
        if ($voice_inserted) {
          return response()->json(['success'=>'Message Sent'], $this->successStatus);
        } else{
          return response()->json(['error'=>'Message Not Sent'], 401);
        }
    }

    // Chat Message Save
    public function send_message(Request $request) {
        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

        $data = ([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'created_at' =>  Carbon::now()
        ]);

        $chat_inserted = DB::table('tbl_chat')->insert($data);
        if($chat_inserted){
          return response()->json(['success'=>'Message Sent'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Message Not Sent'], 401);
        }
    }

    public function client_voice_messages(Request $request){

        $userId = $request->user()->id;
        $voice_messages = DB::table('voice_messages')->where('user_id',$userId)->select('voice_msg','created_at','user_id')->get();
        $messages_data = array();
        if(count($voice_messages) > 0){
           foreach ($voice_messages as $key => $message) {
              $messages_data[$key]['voice_msg'] = $message->voice_msg;
              $messages_data[$key]['sender_name'] = Helper::get_user_data($message->user_id);
              $messages_data[$key]['sender_id'] = $message->user_id;
              $messages_data[$key]['created_at'] = $message->created_at;
           }
        }
          // dd($messages_data);
        $file_path = url('/uploads/voice_messages').'/';

        if($request->header("Authorization")){
            return response()->json(['file_path' => $file_path, 'messages' => $messages_data],$this->successStatus);
        }
    }

    public function chat_messages(Request $request){

        $user_id = $request->user_id;

        $current_user = $request->user()->id;

        $user_group = DB::table('user_has_groups')->where('user_id',$current_user)->first();
        $chat_messages = [];

        if(!is_null($user_group)){
        $group = DB::table('groups')->where('id',$user_group->group_id)->first();
        if(!is_null($group)){

         if($group->slug == 'customer'){

          $chat_messages = DB::table('tbl_chat')
          ->where('sender_id',$current_user)
          ->orWhere('receiver_id',$current_user)
          ->get();

         } else if($group->slug == 'secretary'){

//          $chat_messages = DB::table('tbl_chat')
//          ->where('sender_id',$current_user)
//          ->where('receiver_id',$user_id)
//          ->orWhere(function($query) use ($user_id,$current_user) {
//                 return $query->where('sender_id',$user_id)
//                              ->where('receiver_id',$current_user);
             $chat_messages = DB::table('tbl_chat')
                 ->where('sender_id',$current_user)
                 ->orWhere('receiver_id',$current_user)
                 ->get();
         } else {
             $chat_messages = DB::table('tbl_chat')
          ->where('sender_id',$current_user)
          ->orWhere('receiver_id',$current_user)
          ->get();
         }

        if($request->header("Authorization")){
            return response()->json(['messages' => $chat_messages],$this->successStatus);
        }

        }
      }
    }


}
