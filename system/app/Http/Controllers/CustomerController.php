<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Illuminate\Support\Facades\Hash;

use DB;

use App\Group;
use App\UserContacts;
use App\User;
use App\Order;
use Carbon\Carbon;


class CustomerController extends Controller

{

    public $successStatus = 200;



    public function index(Request $request)

    {

        if($request->header("accept") == 'application/json'){



        $customers =  DB::table('users')

        ->select('id','phone','name','email','status')

        ->where('user_type','customer')

        ->orderBy('name','asc')->get();



            return response()->json(['customers' => $customers],$this->successStatus);

        }



        $customers['customers'] =  DB::table('users')

        ->where('user_type','customer')

        ->orderBy('name','asc')->get();



            return view('customers.list',$customers);

    }



    public function edit_customer($id)

    {



        $customer['cities'] = DB::table('tbl_cities')->get();

        $customer['work'] = DB::table('tbl_work')->get();

        $customer['customer'] = DB::table('users')->where('id',$id)->first();

        return view('customers.edit',$customer);

    }



    public function del_customer($id)

    {

        $deleted = DB::table('users')->where('id',$id)->delete();

        if($deleted){

            $deleted = DB::table('user_has_groups')->where('user_id',$id)->delete();

            return redirect('list-customer')->with('success','Customer Deleted');

        }else{

            return redirect()->back()->with('error','Something went wrong!');

        }

    }



    public function add_customer()

    {

        $customer['cities'] = DB::table('tbl_cities')->get();

        $customer['work'] = DB::table('tbl_work')->get();

        return view('customers.add',$customer);

    }



    public function add_customer_post(Request $request)

    {



        $validator = Validator::make($request->all(),

        [

             'email' => 'required|string|email|max:254|unique:users',

             'name' => 'required|string|max:254',

             //'title' => 'required',

             'phone' => 'required',

             // 'city' => 'required',

             'password' => 'required',

        ]);



        $attributeNames = array(

             'email' => 'Email Address',

        );



        $validator->setAttributeNames($attributeNames);



        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();

        }



        $data = ([

            'name'=> $request->name,

            'phone'=> $request->phone,

            'email'=> $request->email,

            //'secretary_title'=> $request->title,

            //'city'=> $request->city,

            //'work'=> $request->work,

            //'discription' => $request->note,

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



        $created = DB::table('users')->insertGetId($data);

        if($created){

            DB::table('user_has_groups')->insert(['group_id' => 14, 'user_id' => $created]);



            if($request->header("Authorization")){

                return response()->json(['success' => 'Created'],$this->successStatus);

            }



            return redirect('list-customer')->with('success','Customer Created');

        }else{



             if($request->header("Authorization")){

                return response()->json(['error' => 'Something went wrong'],$this->successStatus);

            }

            return redirect()->back()->with('error','Something went wrong!');

        }

    }





    public function update_customer_post(Request $request)

    {



    	$validator = Validator::make($request->all(),

        [

             'name' => 'required|string|max:254',

             //'title' => 'required',

             'phone' => 'required',

             //'city' => 'required',

        ]);



        if ($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();

        }



         $data = ([

            'name'=> $request->name,

            'phone'=> $request->phone,

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



        if (!is_null($request->password)) {

            $data['password'] = Hash::make($request->password);

        }



        $created = DB::table('users')->where('id', $request->customer_id)->update($data);

        if($created){

            return redirect('list-customer')->with('success','Customer Updated');

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

    }
    public function add_contacts(Request $request){
        $dataQ = $request->validate([
        'user_id'=>'required',
        'contact_no'=>'required',
        'contact_name'=>'required',
        ]);
        $data=new UserContacts();
        $data->user_id=$request->user_id;
        $data->contact_no=$request->contact_no;
        $data->contact_name=$request->contact_name;
        $data->save();
        return response()->json(['status' => 'success','message' => 'Record Added Successfully!']);
    }
    public function get_contacts($id){
        return UserContacts::where('user_id',$id)->get();
    }
    public function delete_contact($id) {
        UserContacts::destroy($id);
        return response()->json(['status' => 'success','message' => 'Record Deleted Successfully!']);
    }

    public function getDiscountAmount(Request $request) {
        $package_id = $request->package_id;
        $coupon_code = $request->coupon_code;

        $plan = DB::table('package_plans')->where('id', $request->package_id)->first();
        $coupon = DB::table('coupons')->where('code', $coupon_code)->first();

        $plan_amount = $plan->amount;
        $coupon_amount = $coupon->coupon_value;

        if ($coupon->status != 1)
            return response(['error'=> 'non active coupon'], 400);

        if (!isset($plan_amount))
            return response(['error'=> 'invalid plan'], 400);

        if (!isset($coupon_amount))
            $coupon_amount = 0;

        $currentTime = Carbon::now()->toDateTimeString();

        if ($currentTime < $coupon->start_time || $currentTime > $coupon->end_time)
            return response(['error'=> 'invalid duration coupon'], 400);

        if ($plan_amount < $coupon_amount)
            return response(['error'=> 'coupon value overflow'], 400);

        $discountAmount = null;

        if ($coupon->type == "Free") {

        } else if ($coupon->type == "Percentage") {
            $discountAmount = $plan_amount - $plan_amount / 100 * $coupon_amount;

            return response()->json(['result'=> $discountAmount], 200);
        } else if ($coupon->type == "Flat") {
            $discountAmount = $plan_amount - $coupon_amount;

            return response()->json(['result'=> $discountAmount], 200);
        }
    }

    public function paytab_payment(Request $request) {
        $fields = array("merchant_email"=> 'algrawi1121@gmail.com', "secret_key"=> 'H3OKWJXONEYEFxpNhgDx1KnC79gaWpsDthop1leO0ctGKSt287AaRXMZ6392tCGWU4mVqAKrNd7x6BzfJ9pA7cAdfKfInWEh00dr');
		$this->curlCallToPayment($fields, 'https://www.paytabs.com/apiv2/create_pay_page');

		$user = DB::table('users')->where('id', $request->user_id)->first();
		$plan = DB::table('package_plans')->where('id', $request->package_id)->first();
		$discount_amount = $request->discount_amount;

		if (!$user) {
		    $user = DB::table('users')->first();
		}

		if (!$plan) {
		    $plan = DB::table('package_plans')->first();
		}

		$reference = time();
		$fields = array(
            "merchant_email"=> 'algrawi1121@gmail.com',
            "secret_key"=> 'H3OKWJXONEYEFxpNhgDx1KnC79gaWpsDthop1leO0ctGKSt287AaRXMZ6392tCGWU4mVqAKrNd7x6BzfJ9pA7cAdfKfInWEh00dr',
            'ip_customer' => $_SERVER['REMOTE_ADDR'],
            'ip_merchant' => isset($_SERVER['SERVER_ADDR'])? $_SERVER['SERVER_ADDR'] : '::1',
            'title' => $user->name,
            'cc_first_name' => $user->name,
            'cc_last_name' => $user->name,
            'email' => $user->email,
            'cc_phone_number' => $user->phone,
            'phone_number' => $user->phone,
            'billing_address' => "Riyadh",
            'city' => "Riyadh",
            'state' => "Riyadh",
            'postal_code' => "11564",
            'country' => "SAU",
            'address_shipping' => "Riyadh",
            'city_shipping' => "Riyadh",
            'state_shipping' => "Riyadh",
            'postal_code_shipping' => "11564",
            'country_shipping' => "BHR",
            "products_per_title"=> $plan->name_en,
            'currency' => "SAR",
            "unit_price"=> $discount_amount,
            'quantity' => "1",
            'other_charges' => "0",
            'amount' => $plan->amount,
            'discount'=>"0",
            "msg_lang" => "english",
            "reference_no" => $reference,
            "site_url" => "https://beyond-ksa.com/paytab_payment",
            'return_url' => "https://beyond-pa.com/success",
            "cms_with_version" => "API USING PHP"
        );

		$result = $this->curlCallToPayment($fields, 'https://www.paytabs.com/apiv2/create_pay_page');

		if(json_decode($result)->response_code == 4012){
    	    DB::table('user_subscriptions')->insert([
    	        'user_id' => $user->id,
    	        'plan_id' => $plan->id,
    	        'start_date' => now(),
    	        'end_date' => now()->addDays(DB::table('package_durations')
    	                ->select('number_of_days')
    	                ->where('id', $plan->duration)
    	                ->first()->number_of_days),
    	        'status' => 0,
    	        'payment' => $plan->amount,
	        ]);
	        return redirect(json_decode($result)->payment_url);
        }
    }

    public function callback(Request $request) {
        if (isset($request->payment_reference)) {
            DB::table('user_subscriptions')
                ->where('id', DB::table('user_subscriptions')->max('id'))
                ->update([
                    'status' => 1,
                ]);
        }
    }

    public function make_payment(Request $request) {

    }

    private function curlCallToPayment($fields, $url)
    {
        $fields_string = "";
		foreach ($fields as $key => $value) {
			$fields_string .= $key . '=' . $value . '&';
		}
		rtrim($fields_string, '&');
        $ch = curl_init();
		$ip = $_SERVER['REMOTE_ADDR'];

		$ip_address = array(
			"REMOTE_ADDR" => $ip,
			"HTTP_X_FORWARDED_FOR" => $ip
		);

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $ip_address);
		curl_setopt($ch, CURLOPT_POST, count($fields));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, 1);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
    }
}







