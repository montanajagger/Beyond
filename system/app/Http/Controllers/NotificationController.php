<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Validator;

class NotificationController extends Controller
{
 
    public function __construct()
    {
        //$this->middleware('auth');
    }
 
    public function index()
    {
        $notifications = DB::table('notifications')->orderBy('id','desc')->get();
        return view('notification.list',compact('notifications'));    
    }
    public function add_noti(){
        return view('notification.add');
    }

    public function del_notification($id)
    {
        $deleted = DB::table('notifications')->where('id',$id)->delete();
        if($deleted){
            return redirect('notification')->with('success','Notification Delete');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function edit_notification($id)
    {
        $notifications = DB::table('notifications')->where('id',$id)->first();
        return view('notification.edit',compact('notifications'));
    }

    public function save_notification(Request $request){
       
        
        $validator = Validator::make($request->all(),
        [
             'title' => 'required|string|max:254',
        ]);

        $user_id = '';
        $notification_type = '';

        if ($request->all_users) {
            $users = DB::table('users')->select('id')->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ",");
            $notification_type = $request->all_users;
            
        }

        if ($request->all_active) {
            $users = DB::table('users')->select('id')->where('status', 1)->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ",");
            $notification_type = $request->all_active;
            
        } 

        if ($request->all_secretary) {
            $users = DB::table('users')->select('id')->where('user_type','secretary')->where('status', 1)->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ","); 
            $notification_type = $request->all_secretary; 
            
        } 

        if ($request->schedule_date != null) {
            $inserted = DB::table('notifications')->insert([
                'title' => $request->title,
                'notification_to' => $user_id,
                'notification_type' => $notification_type,
                'message' => $request->editor1,
                'schedule' => $request->schedule_date,
            ]);
            if ($inserted) {
                return redirect('notification')->with('success','Successfully Sent');
            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

        }else{

            $inserted = DB::table('notifications')->insert([
                'title' => $request->title,
                'notification_to' => $user_id,
                'notification_type' => $notification_type,
                'message' => $request->editor1,
                'schedule' => $request->schedule_date,
                'status' => 1

            ]);
            
            $message = [
                'title' => $request->title,
                'body' => $request->editor1,
                'sound' => 'default',
                'channelId' => 'default',
                // 'badge' => $user->unreadNotifications()->count(),
                'ttl' => 5 * 60,
                'data' => '',
                '_displayInForeground' => true,
                'to' => DB::table('users')
                ->whereNotNull('device_token')
                ->whereIn('id', explode(',', $user_id))
                ->pluck('device_token')
                ->first(),
            ];
            $fields_string = "";
    		foreach ($message as $key => $value) {
    			$fields_string .= $key . '=' . $value . '&';
    		}
    		rtrim($fields_string, '&');

            $ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, 'https://exp.host/--/api/v2/push/send');
    // 		curl_setopt($ch, CURLOPT_HTTPHEADER, $ip_address);
    		curl_setopt($ch, CURLOPT_POST, count($message));
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		curl_setopt($ch, CURLOPT_REFERER, 1);
    
    		$result = curl_exec($ch);
    		curl_close($ch);

            if ($inserted) {
                return redirect('notification')->with('success','Successfully Sent');
            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

        }

    }

    public function update_notification_post(Request $request){

        $user_id = '';
        $notification_type = '';

        if ($request->all_users) {
            $users = DB::table('users')->select('id')->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ",");
            $notification_type = $request->all_users;
            
        }

        if ($request->all_active) {
            $users = DB::table('users')->select('id')->where('status', 1)->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ",");
            $notification_type = $request->all_active;
            
        } 

        if ($request->all_secretary) {
            $users = DB::table('users')->select('id')->where('user_type','secretary')->where('status', 1)->get();
            if (count($users) > 0) {

                foreach ($users as $key => $value) {
                    $user_id .= $value->id.',';
                }

            }
            $user_id = rtrim($user_id, ","); 
            $notification_type = $request->all_secretary; 
            
        } 

        if ($request->schedule_date != null) {
            $inserted = DB::table('notifications')->where('id',$request->update_notification)->update([
                'title' => $request->title,
                'notification_to' => $user_id,
                'notification_type' => $notification_type,
                'message' => $request->editor1,
                'schedule' => $request->schedule_date,
            ]);
            if ($inserted) {
                return redirect('notification')->with('success','Successfully Updated');
            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

        }else{

            $inserted = DB::table('notifications')->where('id',$request->update_notification)->update([
                'title' => $request->title,
                'notification_to' => $user_id,
                'notification_type' => $notification_type,
                'message' => $request->editor1,
                'schedule' => $request->schedule_date,
                'status' => 1

            ]);
            if ($inserted) {
                return redirect('notification')->with('success','Successfully Updated');
            }else{
                return redirect()->back()->with('error','Something went wrong!');
            }

        }
    }
 
}
