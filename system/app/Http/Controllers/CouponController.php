<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class CouponController extends Controller
{
    public function index()
    {
        $coupons['coupons'] = DB::table('coupons')->orderBy('id','desc')->get();
        return view('coupon.list',$coupons);
    }

    public function edit_coupon($id)
    {
        $coupons['coupons'] = DB::table('coupons')->where('id',$id)->first();
        return view('coupon.edit',$coupons);
    }

    public function del_coupon($id)
    {
        $deleted = DB::table('coupons')->where('id',$id)->delete();
        if($deleted){
            return redirect('coupon-list')->with('success','Coupon Deleted');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_coupon()
    {
        return view('coupon.add');
    }

    public function add_coupon_post(Request $request)
    {

    	//dd($request->all());


        $validator = Validator::make($request->all(),
        [
             'code' => 'required|string|unique:coupons',
             'type' => 'required',
             'coupon_value' => 'required',
             'status' => 'required',
             'start_date' => 'required',
             'end_date' => 'required',
        ]);

        $attributeNames = array(
             'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'code'=> $request->code,
            'type'=> $request->type,
            'coupon_value'=> $request->coupon_value,
            'status'=> $request->status,
            'start_time'=> $request->start_date,
            'end_time' => $request->end_date,
        ]);


        $created = DB::table('coupons')->insert($data);
        if($created){
            return redirect('coupon-list')->with('success','Coupon Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function update_coupon_post(Request $request)
    {

    	$validator = Validator::make($request->all(),
        [
             'code' => 'required|string|unique:coupons,code,'.$request->coupon_id.',id',
             'type' => 'required',
             'coupon_value' => 'required',
             'status' => 'required',
             'start_date' => 'required',
             'end_date' => 'required',
        ]);

        $attributeNames = array(
             'code' => 'Coupon Code',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $data = ([
            'code'=> $request->code,
            'type'=> $request->type,
            'coupon_value'=> $request->coupon_value,
            'status'=> $request->status,
            'start_time'=> $request->start_date,
            'end_time' => $request->end_date,
        ]);


        $created = DB::table('coupons')->where('id', $request->coupon_id)->update($data);
        //if($created){
            return redirect('coupon-list')->with('success','Coupon Updated');
        // }else{
        //     return redirect()->back()->with('error','Something went wrong!');
        // }
    }

    public function update_status_post(Request $request){
        $created = DB::table('coupons')->where('id', $request->id)->first();
        if ($created->status == 0) {
            DB::table('coupons')->where('id', $request->id)->update(['status' => 1]);
        }else{
            DB::table('coupons')->where('id', $request->id)->update(['status' => 0]);
        }
    }
}



