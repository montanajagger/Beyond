<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use \Junges\ACL\Http\Models\Permission;
use \Junges\ACL\Http\Models\Group;
use App\User;


class PlansController extends Controller
{

    public $successStatus = 200;

    public function index(Request $request)
    {


        if($request->header("accept") == 'application/json'){
            $package_plans = DB::table('package_plans')->where('status',1)->orderBy('id','desc')->get();
            $packages['package_plans'] = array();

            if(count($package_plans) > 0 ){
                foreach ($package_plans as $key => $plans) {

                     $package_plans[$key]->features = $this->plan_features_names($package_plans[$key]->features);
                      $package_plans[$key]->duration = $this->package_duration_name($package_plans[$key]->duration);
                     $package_plans[$key]->features_included = explode('|', $package_plans[$key]->features_included);

                     unset($package_plans[$key]->status);
                     unset($package_plans[$key]->created_at);
                     $packages['package_plans'][] = $package_plans[$key];
                }
            }

            return response()->json(['success' => $packages],$this->successStatus);
        }

        $package_plans['package_plans'] = DB::table('package_plans')->orderBy('id','desc')->get();
        return view('plans.list',$package_plans);
    }


    public function plan_features_names($ids)
    {
        $names = array();
        $features_ids = explode('|', $ids);
        foreach ($features_ids as $ids) {
            $features_name = DB::table('package_features')->where('id',$ids)->first();
            if(!is_null($features_name)){
                $names['english'][] = $features_name->name_en;
                $names['arabic'][] = $features_name->name_ar;
            }
        }
        return $names;
    }

    public function package_duration_name($id)
    {
        $durations = DB::table('package_durations')->where('id',$id)->first();
        $duration_name = '';
        if(!is_null($durations)){
            $duration_name = $durations->title_en;
        }
        return $duration_name;
    }

    public function plan_features(Request $request)
    {
        $data['package_features'] = DB::table('package_features')->orderBy('id','desc')->get();
        if($request->header("accept") == 'application/json'){
            return response()->json(['success' => $data],$this->successStatus);
        }
        return view('plans.list-features',$data);
    }

    public function edit_feature_post(Request $request)
    {
    	$check = DB::table('package_features')->where('id',$request->id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Feature id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $data = ([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar
        ]);

        $updated = DB::table('package_features')->where('id',$request->id)->update($data);

        if($updated){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect('plan-features')->with('success','Feature Updated');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_feature_post(Request $request)
    {
        $data = ([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar
        ]);
        $created = DB::table('package_features')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','Feature Created');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function del_feature($id, Request $request)
    {

    	$check = DB::table('package_features')->where('id',$id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Feature id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}


        $deleted = DB::table('package_features')->where('id',$id)->delete();

        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','Package Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function edit_duration_post(Request $request)
    {

    	$check = DB::table('package_durations')->where('id',$request->id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Duration id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $data = ([
            "title_ar" => $request->title_ar,
            "title_en" => $request->title_en,
            "number_of_days" => $request->number_of_days,
         ]);

        $updated = DB::table('package_durations')->where('id',$request->id)->update($data);
        if($updated){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect()->back()->with('success','Duration Updated');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_duration_post(Request $request)
    {
        $data = ([
            "title_ar" => $request->title_ar,
            "title_en" => $request->title_en,
            "number_of_days" => $request->number_of_days,
        ]);
        $created = DB::table('package_durations')->insert($data);
        if($created){
             if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','Duration Created');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function del_duration($id,Request $request)
    {

    	$check = DB::table('package_durations')->where('id',$id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Duration id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $deleted = DB::table('package_durations')->where('id',$id)->delete();
        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','Duration Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function package_durations(Request $request)
    {
        $data['package_durations'] = DB::table('package_durations')->orderBy('id','desc')->get();
        if($request->header("accept") == 'application/json'){
            return response()->json(['success' => $data],$this->successStatus);
        }
        return view('plans.list-durations',$data);
    }

    public function edit_package($id)
    {
        $data['package_plan'] = DB::table('package_plans')->where('id',$id)->first();
        $data['package_durations'] = DB::table('package_durations')->get();
        $data['package_features'] = DB::table('package_features')->get();

        return view('plans.edit',$data);
    }

    public function del_package($id, Request $request)
    {

    	$check = DB::table('package_plans')->where('id',$request->id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Plan id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $deleted = DB::table('package_plans')->where('id',$id)->delete();
        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','Package Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_package()
    {
        $data['package_durations'] = DB::table('package_durations')->get();
        $data['package_features'] = DB::table('package_features')->get();

        return view('plans.add',$data);
    }

    public function plans_status(Request $request){

    	$check = DB::table('package_plans')->where('id',$request->id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Plan id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $created = DB::table('package_plans')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('package_plans')->where('id', $request->id)->update(['status' => 1]);
        }else{
            DB::table('package_plans')->where('id', $request->id)->update(['status' => 0]);
        }

        if($request->header("Authorization")){

            if ($created->status == 0) {
                 return response()->json(['success' => 'Enabled'],$this->successStatus);
            }else{
                return response()->json(['success' => 'Disabled'],$this->successStatus);
            }

        }
    }

    public function add_package_post(Request $request)
    {

        $data = ([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "amount" => $request->amount,
            "duration" => $request->duration,
            "features" => implode('|', $request->features),
            "features_included" => implode('|', $request->features_included)
        ]);

        $created = DB::table('package_plans')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect('package-plans')->with('success','Package Created');
        }else{

            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function edit_package_post(Request $request)
    {

    	$check = DB::table('package_plans')->where('id',$request->plan_id)->first();

    	if(is_null($check)){
    		if($request->header("Authorization")){
                return response()->json(['error' => 'Plan id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
    	}

        $data = ([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "amount" => $request->amount,
            "duration" => $request->duration,
            "features" => implode('|', $request->features),
            "features_included" => implode('|', $request->features_included)
        ]);

        $created = DB::table('package_plans')->where('id',$request->plan_id)->update($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect('package-plans')->with('success','Package Updated');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

/*
 * User Subscription
*/

    public function user_plan_buy(Request $request) {

        $userId = $request->user()->id;

        $data = ([
            "user_id" => $userId,
            "plan_id" => $request->plan_id,
            "coupon_id" => $request->coupon_id,
            "payment_method" => $request->payment_method,
            "payment" => $request->payment
        ]);

        $created = DB::table('user_subscriptions')->insert($data);

        if($created){
            if($request->header("Authorization")) {
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
        }else{
            if($request->header("Authorization")) {
                return response()->json(['error' => 'Something went wrong!']);
            }
         }
    }

}
