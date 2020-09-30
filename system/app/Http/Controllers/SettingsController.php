<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Group;
use DB;

 
class SettingsController extends Controller
{
    public function get_page()
    {
        $settings = DB::table('settings')->get();
        return view('home_page_settings',compact('settings'));  
    } 


    public function home_page_settings(Request $request){
       //dd($request->all());

       $validator = Validator::make($request->all(),
        [
             'first_part_title_eng' => 'required',
             'first_part_title_arabic' => 'required',
             'first_part_discription_eng' => 'required',
             'first_part_discription_arabic' => 'required',
             'apple_store_url' => 'required',
             'android_store_url' => 'required',
             'about_eng' => 'required',
             'sbout_arabic' => 'required',
             'about_discription_english' => 'required',
             'about_discription_arabic' => 'required',
             'reg_pro_title_en' => 'required',
             'reg_pro_title_ar' => 'required',
             'reg_pro_desc_en' => 'required',
             'reg_pro_desc_ar' => 'required',
        ]);

      
       if ($validator->fails()){        
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $all_data = $request->except(['_token']);
       foreach ($all_data as $key => $value) {
          $exit = DB::table('settings')->where('key_name', $key)->first();
          if(is_null($exit)){
               DB::table('settings')->insert(
               	['key_name' => $key, 'key_value' => $value]);
          }else{
               DB::table('settings')->where('key_name', $exit->key_name)->update(
               	[ 'key_value' => $value]);
          }
       
       }

       return redirect()->back()->with('success', 'Setting successfully updated!');

    }

 

}
