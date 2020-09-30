<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Carbon\Carbon;
use App\Helpers\Helper;

class BookingController extends Controller
{
  public $successStatus = 200;


    public function trips(Request $request)
    {
        $data['trips'] = DB::table('tbl_trips')
            ->select('tbl_trips.id', 'tbl_trips.airline', 'tbl_trips.flight_type', 'tbl_trips.from_loc', 'tbl_trips.to_loc', 'tbl_trips.note', 'tbl_trips.status', 'tbl_trips.departure', 'tbl_trips.arrival', 'tbl_trips.created_at', 'users.username as sender_name')
            ->join('users', 'tbl_trips.sender_id', '=', 'users.id')
            ->orderBy('created_at','asc')
            ->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.trips',$data);
    }

    public function acceptTrip($id, Request $request) {
        $check = DB::table('tbl_trips')->where('id',$id)->first();

        if (is_null($check)) {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Trips id not found'], $this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }

        $updated = DB::table('tbl_trips')->where('id', $id)->update(["status" => "Accepted"]);

        if ($updated) {
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }

            $data['trips'] = DB::table('tbl_trips')->orderBy('created_at','asc')->get();

            return view('booking.trips',$data);
        } else {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function rejectTrip($id, Request $request) {
        $check = DB::table('tbl_trips')->where('id',$id)->first();

        if (is_null($check)) {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Trips id not found'], $this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }

        $updated = DB::table('tbl_trips')->where('id', $id)->update(["status" => "Rejected"]);

        if ($updated) {
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }

            $data['trips'] = DB::table('tbl_trips')->orderBy('created_at','asc')->get();

            return view('booking.trips',$data);
        } else {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function SocialEvents(Request $request)
    {
        $data['socialEvents'] = DB::table('tbl_social_events')
            ->select('tbl_social_events.id', 'tbl_social_events.name', 'tbl_social_events.date', 'tbl_social_events.time', 'tbl_social_events.city', 'tbl_social_events.location', 'tbl_social_events.note', 'tbl_social_events.created_at', 'users.username as sender_name')
            ->join('users', 'tbl_social_events.sender_id', '=', 'users.id')
            ->orderBy('created_at','asc')
            ->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.socialEvents',$data);
    }

    public function Meeting(Request $request)
    {
        $data['meetings'] = DB::table('tbl_meeting')
            ->select('tbl_meeting.name', 'tbl_meeting.city', 'tbl_meeting.meeting_name', 'tbl_meeting.location', 'tbl_meeting.date', 'tbl_meeting.time', 'tbl_meeting.note', 'tbl_meeting.created_at', 'users.username as sender_name')
            ->join('users', 'tbl_meeting.sender_id', '=', 'users.id')
            ->orderBy('created_at','asc')
            ->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.meetings',$data);
    }

    public function Hotel(Request $request)
    {
        $data['hotels'] = DB::table('tbl_hotels')
            ->select('tbl_hotels.id', 'tbl_hotels.name', 'tbl_hotels.city', 'tbl_hotels.note', 'tbl_hotels.status', 'tbl_hotels.check_in_date', 'tbl_hotels.check_out_date', 'tbl_hotels.created_at', 'users.username as sender_name')
            ->join('users', 'tbl_hotels.sender_id', '=', 'users.id')
            ->orderBy('created_at','asc')
            ->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.hotels',$data);
    }

    public function acceptHotel($id, Request $request) {
        $check = DB::table('tbl_hotels')->where('id',$id)->first();

        if (is_null($check)) {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Hotels id not found'], $this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }

        $updated = DB::table('tbl_hotels')->where('id', $id)->update(["status" => "Accepted"]);

        if ($updated) {
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }

            $data['hotels'] = DB::table('tbl_hotels')->orderBy('created_at','asc')->get();

            return view('booking.hotels',$data);
        } else {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function rejectHotel($id, Request $request) {
        $check = DB::table('tbl_hotels')->where('id',$id)->first();

        if (is_null($check)) {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Hotels id not found'], $this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }

        $updated = DB::table('tbl_hotels')->where('id', $id)->update(["status" => "Rejected"]);

        if ($updated) {
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }

            $data['hotels'] = DB::table('tbl_hotels')->orderBy('created_at','asc')->get();

            return view('booking.hotels',$data);
        } else {
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }

            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function SecondaryServices(Request $request)
    {
        $data['secondaryServices'] = DB::table('tbl_social_service')
            ->select('tbl_social_service.id', 'tbl_social_service.name', 'tbl_social_service.date', 'tbl_social_service.time', 'tbl_social_service.description', 'tbl_social_service.created_at', 'users.username as sender_name')
            ->join('users', 'tbl_social_service.sender_id', '=', 'users.id')
            ->orderBy('created_at','asc')
            ->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.secondaryServices',$data);
    }

    public function Contacts(Request $request)
    {
        $data['appointments'] = DB::table('tbl_appointment')->orderBy('created_at','asc')->get();

        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }

        return view('booking.contacts',$data);
    }

  public function trip_create(Request $request) {

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'airline' => 'required',
            'flight_type' => 'required',
            'from' => 'required',
            'to' => 'required',
            'departure' => 'required',
            'arrival' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'airline' => $request->airline,
            'flight_type' => $request->flight_type,
            'from_loc' => $request->from,
            'to_loc' => $request->to,
            'departure' => $request->departure,
            'arrival' => $request->arrival,
            'note' => $request->note,
        ]);

        $voice_inserted = DB::table('tbl_trips')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }

    public function appointment_create(Request $request){

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'city' => $request->city,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
        ]);

        $voice_inserted = DB::table('tbl_appointment')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }

      public function socialevent_create(Request $request){

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'city' => $request->city,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
        ]);

        $voice_inserted = DB::table('tbl_social_events')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }


    public function meeting_create(Request $request){

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'name' => 'required',
            'meeting_name' => 'required',
            'city' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'meeting_name' => $request->meeting_name,
            'city' => $request->city,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
        ]);

        $voice_inserted = DB::table('tbl_meeting')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }

    public function socialservice_create(Request $request){

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description,
        ]);

        $voice_inserted = DB::table('tbl_social_service')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }


    public function hotelbooking_create(Request $request){

        $validator = Validator::make($request->all(), [
            'sender_id' => 'required',
            'name' => 'required',
            'city' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

         $data = ([
            'sender_id' => $request->sender_id,
            'name' => $request->name,
            'city' => $request->city,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'note' => $request->note,
        ]);

        $voice_inserted = DB::table('tbl_hotels')->insert($data);
        if($voice_inserted){
          return response()->json(['success'=>'Created'], $this->successStatus);
        }else{
          return response()->json(['error'=>'Not Created'], 401);
        }
    }


}
