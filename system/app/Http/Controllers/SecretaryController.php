<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class SecretaryController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {
        $subadmins['subadmins'] = DB::table('users')->select('id', 'phone', 'name', 'email', 'picture', 'secretary_title', 'discription', 'status', 'created_at')->where('user_type','secretary')->orderBy('id','desc')->get();

        if($request->header("Authorization")){
            $data = $subadmins['subadmins'];
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('secretary.list',$subadmins);
    }

    public function edit_secretary($id)
    {
        $subadmin['subadmin'] = DB::table('users')->where('id',$id)->where('user_type','secretary')->first();
        return view('secretary.edit',$subadmin);
    }

    public function del_secretary($id,Request $request)
    {
        $deleted = DB::table('users')->where('id',$id)->delete();
        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect('list-secretary')->with('success','Secretary Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_secretary()
    {
        return view('secretary.add');
    }

    public function add_secretary_post(Request $request)
    {

        $validator = Validator::make($request->all(),
        [
             'email' => 'required|string|email|max:254|unique:users',
             'firstname' => 'required|string|max:254|unique:users,username',
        ]);

        $attributeNames = array(
             'email' => 'Email Address',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('picture')) {

        $validator = Validator::make($request->all(),
        [
            'picture' => 'mimes:jpg,jpeg,png,gif|max:5000',
         ]);

        $attributeNames = array(
            'picture' => 'Profile Picture',
         );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('picture')->getClientOriginalExtension();
        $dir = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('picture')->move($dir, $filename);
       }

        $data = ([
            'name'=> $request->firstname.' '.$request->lastname,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password' => Hash::make('password'),
            'user_type' => 'secretary',
            'secretary_title' => $request->Secretary_title,
            'discription' => $request->profile_discription,
        ]);

         if ($request->hasFile('picture')) {
            $data['picture'] = $filename;
         }

        $created = DB::table('users')->insertGetId($data);
        if($created){

            DB::table('user_has_groups')->insert(['group_id' => 12, 'user_id' => $created]);

            return redirect('list-secretary')->with('success','Secretary Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function update_secretary_post(Request $request)
    {

        if ($request->hasFile('picture')) {

        $validator = Validator::make($request->all(),
        [
            'picture' => 'mimes:jpg,jpeg,png,gif|max:5000',
         ]);

        $attributeNames = array(
            'picture' => 'Profile Picture',
         );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('picture')->getClientOriginalExtension();
        $dir = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('picture')->move($dir, $filename);
       }

        $data = ([
            'name'=> $request->firstname,
            'discription'=> $request->profile_discription,
            'secretary_title'=> $request->Secretary_title,
            'phone'=> $request->phone
         ]);

         if ($request->hasFile('picture')) {
            $data['picture'] = $filename;
         }


        $created = DB::table('users')->where('id', $request->user_id)->update($data);
        if($created){
            return redirect('list-secretary')->with('success','Secretary Updated');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function update_status_post(Request $request){
        $created = DB::table('users')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('users')->where('id', $request->id)->update(['status' => 1]);
        }else{
            DB::table('users')->where('id', $request->id)->update(['status' => 0]);
        }

        if($request->header("Authorization")){

            if ($created->status == 0) {
                 return response()->json(['success' => 'Enabled'],$this->successStatus);
            }else{
                return response()->json(['success' => 'Disabled'],$this->successStatus);
            }

        }
    }

    // Secretary Client List
    public function secretary_client_list(Request $request){
        $secretary_id = $request->secretary_id;
        $client_list = DB::table('user_subscriptions')
        ->where('secretary_id', $secretary_id)
        ->pluck('user_id');
        if(count($client_list)) {
            $client_list = DB::table('users')
            ->select('id','phone','name','email','work','city','picture')
            ->whereIn('id', $client_list)
            ->get();
        }
        return response()->json(['clients' => $client_list],$this->successStatus);
    }

    public function secretary_all(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'user_id' => 'required',
                'request_type' => 'required'
            ]);

        if ($validator->fails()){
            return response()->json(['error' => $validator->errors()->first()]);
        }

        $hotels = null;
        $trips = null;
        $socialEvents = null;
        $meetings = null;
        $socialServices = null;
        $contacts = null;

        if ($request->request_type == "On Hold") {
            $hotels = DB::table('tbl_hotels')->where('sender_id', $request->user_id)->where('status', $request->request_type)->get();
            $trips = DB::table('tbl_trips')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
        } else if ($request->request_type == "Accepted") {
            $hotels = DB::table('tbl_hotels')->where('sender_id', $request->user_id)->where('status', $request->request_type)->get();
            $trips = DB::table('tbl_trips')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $socialEvents = DB::table('tbl_social_events')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $meetings = DB::table('tbl_meeting')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $socialServices = DB::table('tbl_social_service')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $contacts = DB::table('tbl_appointment')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
        } else if ($request->request_type == "Rejected") {
            $hotels = DB::table('tbl_hotels')->where('sender_id', $request->user_id)->where('status', $request->request_type)->get();
            $trips = DB::table('tbl_trips')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $socialEvents = DB::table('tbl_social_events')->where('sender_id',$request->user_id)->whereDate('date', '<', Carbon::today()->subDays(3) )->get();
            $meetings = DB::table('tbl_meeting')->where('sender_id',$request->user_id)->whereDate('date', '<', Carbon::today()->subDays(3) )->get();
            $socialServices = DB::table('tbl_social_service')->where('sender_id',$request->user_id)->whereDate('date', '<', Carbon::today()->subDays(3) )->get();
            $contacts = DB::table('tbl_appointment')->where('sender_id',$request->user_id)->whereDate('date', '<', Carbon::today()->subDays(3) )->get();
        } else if ($request->request_type == "Completed") {
            $hotels = DB::table('tbl_hotels')->where('sender_id', $request->user_id)->where('status', $request->request_type)->get();
            $trips = DB::table('tbl_trips')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $socialEvents = DB::table('tbl_social_events')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $meetings = DB::table('tbl_meeting')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $socialServices = DB::table('tbl_social_service')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
            $contacts = DB::table('tbl_appointment')->where('sender_id',$request->user_id)->where('status', $request->request_type)->get();
        }

        $data = null;
        $hotelsArray = [];
        if (isset($hotels)) {
            foreach ($hotels as $hotel) {
                $hotelItem["id"] = $hotel->id;
                $hotelItem["name"] = $hotel->name;
                $hotelItem["city"] = $hotel->city;
                $hotelItem["check_in_date"] = $hotel->check_in_date;
                $hotelItem["check_out_date"] = $hotel->check_out_date;
                $hotelItem["note"] = $hotel->note;
                $hotelItem["status"] = $hotel->status;
                $hotelItem["created_at"] = $hotel->created_at;

                array_push($hotelsArray, $hotelItem);
            }
        }

        $tripsArray = [];
        if (isset($trips)) {
            foreach ($trips as $trip) {
                $tripItem["id"] = $trip->id;
                $tripItem["airline"] = $trip->airline;
                $tripItem["flight_type"] = $trip->flight_type;
                $tripItem["from_loc"] = $trip->from_loc;
                $tripItem["to_loc"] = $trip->to_loc;
                $tripItem["departure"] = $trip->departure;
                $tripItem["arrival"] = $trip->arrival;
                $tripItem["status"] = $trip->status;
                $tripItem["created_at"] = $trip->created_at;

                array_push($tripsArray, $tripItem);
            }
        }

        $socialEventsArray = [];
        if (isset($socialEvents)) {
            foreach ($socialEvents as $socialEvent) {
                $socialEventItem["id"] = $socialEvent->id;
                $socialEventItem["name"] = $socialEvent->name;
                $socialEventItem["date"] = $socialEvent->date;
                $socialEventItem["time"] = $socialEvent->time;
                $socialEventItem["city"] = $socialEvent->city;
                $socialEventItem["location"] = $socialEvent->location;
                $socialEventItem["note"] = $socialEvent->note;
                $socialEventItem["status"] = $socialEvent->status;
                if ($request->request_type == "Rejected") {
                    $socialEventItem["status"] = "Rejected";
                }

                $socialEventItem["created_at"] = $socialEvent->created_at;

                array_push($socialEventsArray, $socialEventItem);
            }
        }

        $meetingsArray = [];
        if (isset($meetings)) {
            foreach ($meetings as $meeting) {
                $meetingItem["id"] = $meeting->id;
                $meetingItem["name"] = $meeting->name;
                $meetingItem["city"] = $meeting->city;
                $meetingItem["meeting_name"] = $meeting->meeting_name;
                $meetingItem["location"] = $meeting->location;
                $meetingItem["date"] = $meeting->date;
                $meetingItem["time"] = $meeting->time;
                $meetingItem["note"] = $meeting->note;
                $meetingItem["status"] = $meeting->status;
                if ($request->request_type == "Rejected") {
                    $meetingItem["status"] = "Rejected";
                }
                $meetingItem["created_at"] = $meeting->created_at;

                array_push($meetingsArray, $meetingItem);
            }
        }

        $socialServicesArray = [];
        if (isset($socialServices)) {
            foreach ($socialServices as $socialService) {
                $socialServiceItem["id"] = $socialService->id;
                $socialServiceItem["name"] = $socialService->name;
                $socialServiceItem["date"] = $socialService->date;
                $socialServiceItem["time"] = $socialService->time;
                $socialServiceItem["description"] = $socialService->description;
                $socialServiceItem["status"] = $socialService->status;
                if ($request->request_type == "Rejected") {
                    $socialServiceItem["status"] = "Rejected";
                }
                $socialServiceItem["created_at"] = $socialService->created_at;

                array_push($socialServicesArray, $socialServiceItem);
            }
        }

        $contactsArray = [];
        if (isset($contacts)) {
            foreach ($contacts as $contact) {
                $contactItem["id"] = $contact->id;
                $contactItem["name"] = $contact->name;
                $contactItem["city"] = $contact->city;
                $contactItem["location"] = $contact->location;
                $contactItem["date"] = $contact->date;
                $contactItem["time"] = $contact->time;
                $contactItem["note"] = $contact->note;
                $contactItem["status"] = $contact->status;
                if ($request->request_type == "Rejected") {
                    $contactItem["status"] = "Rejected";
                }
                $contactItem["created_at"] = $contact->created_at;

                array_push($contactsArray, $contactItem);
            }
        }

        if ($request->request_type == "On Hold") {
            $data["hotels"] = $hotelsArray;
            $data["trips"] = $tripsArray;
        } else if ($request->request_type == "Accepted") {
            $data["hotels"] = $hotelsArray;
            $data["trips"] = $tripsArray;
            $data["social_life_events"] = $socialEventsArray;
            $data["meetings"] = $meetingsArray;
            $data["secondary_services"] = $socialServicesArray;
            $data["contacts"] = $contactsArray;
        } else if ($request->request_type == "Rejected") {
            $data["hotels"] = $hotelsArray;
            $data["trips"] = $tripsArray;
            $data["social_life_events"] = $socialEventsArray;
            $data["meetings"] = $meetingsArray;
            $data["secondary_services"] = $socialServicesArray;
            $data["contacts"] = $contactsArray;
        } else if ($request->request_type == "Completed") {
            $data["hotels"] = $hotelsArray;
            $data["trips"] = $tripsArray;
            $data["social_life_events"] = $socialEventsArray;
            $data["meetings"] = $meetingsArray;
            $data["secondary_services"] = $socialServicesArray;
            $data["contacts"] = $contactsArray;
        }

        if($request->request_type == 'On Hold') {
            return response()->json(['onhold' => $data], $this->successStatus);
        } else if($request->request_type == 'Accepted') {
            return response()->json(['accepted' => $data], $this->successStatus);
        } else if($request->request_type == 'Rejected') {
            return response()->json(['rejected' => $data], $this->successStatus);
        } else if($request->request_type == 'Completed') {
            return response()->json(['completed' => $data], $this->successStatus);
        } else {
            return response()->json(['error' => 'Invalid request_type']);
        }
    }

    public function secretary_item_status(Request $request) {
        $requestData = $request->input();

        $table_name = null;

        if ($requestData["booking_type"] == "trips") {
            $table_name = "tbl_trips";
        } else if ($requestData["booking_type"] == "social_life_events") {
            $table_name = "tbl_social_events";
        } else if ($requestData["booking_type"] == "meetings") {
            $table_name = "tbl_meeting";
        } else if ($requestData["booking_type"] == "hotels") {
            $table_name = "tbl_hotels";
        } else if ($requestData["booking_type"] == "secondary_services") {
            $table_name = "tbl_social_service";
        } else if ($requestData["booking_type"] == "contacts") {
            $table_name = "tbl_appointment";
        }

        try {
            if (!is_null($table_name)) {
                $updated = DB::table($table_name)->where('id', $requestData['id'])->update(['status'=> $requestData['status']]);

                if ($updated == 1) {
                    return response()->json(['success'=> 'updated'], 200);
                } else {
                    return response()->json(['error'=> 'affected row empty'], 400);
                }

            }
        } catch (Exception $exception) {
            return response()->json(['error'=> $exception->getMessage()], 400);
        }

    }

    // Secretary dashboard data API Endpoint
    public function secretary_dashboard(Request $request){

        $validator = Validator::make($request->all(),
         [
            'user_id' => 'required',
            'request_type' => 'required'
         ]);

        if ($validator->fails()){
            return response()->json(['error' => $validator->errors()->first()]);
        }

        if($request->request_type == 'trips'){
           $data = DB::table('tbl_trips')->where('sender_id',$request->user_id)->get();
           return response()->json(['trips' => $data],$this->successStatus);
        }
        elseif($request->request_type == 'hotels'){
           $data = DB::table('tbl_hotels')->where('sender_id',$request->user_id)->get();
           return response()->json(['hotels' => $data],$this->successStatus);
        }
        elseif($request->request_type == 'meetings'){
           $data = DB::table('tbl_meeting')->where('sender_id',$request->user_id)->get();
           return response()->json(['meetings' => $data],$this->successStatus);
        }
        elseif($request->request_type == 'social_events'){
           $data = DB::table('tbl_social_events')->where('sender_id',$request->user_id)->get();
           return response()->json(['social_events' => $data],$this->successStatus);
        }
        elseif($request->request_type == 'social_services'){
           $data = DB::table('tbl_social_service')->where('sender_id',$request->user_id)->get();
           return response()->json(['social_services' => $data],$this->successStatus);
        }
        elseif($request->request_type == 'appointments'){
           $data = DB::table('tbl_appointment')->where('sender_id',$request->user_id)->get();
           return response()->json(['appointments' => $data],$this->successStatus);
        }
        else{
           return response()->json(['error' => 'Invalid request_type']);
        }

    }
}
