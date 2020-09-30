<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
 
    public function __construct()
    {
        //$this->middleware('auth');
    }
 
    public function index()
    {
        return view('home');
    }

    public function new_home()
    {
        $all_settings = DB::table('settings')->select('key_name', 'key_value')->get();
        $testimonials = DB::table('testimonials')->get();
        $settings = array();
        if(isset($all_settings) && count($all_settings) > 0){
            foreach ($all_settings as $value) {
                $settings[$value->key_name] = $value->key_value;
            }
        }

        return view('index', compact('settings', 'testimonials'));
    }
    
    public function api_term_and_conditions()
    {
        return response()->json(['success' => DB::table('page_terms_conditions')->first()]); 
    }
 
    public function term_and_conditions()
    {
        $data['page_terms'] = DB::table('page_terms_conditions')->first();
        return view('terms.edit',$data);
    }
    
    public function term_and_conditions_view()
    {
        $all_settings = DB::table('settings')->select('key_name', 'key_value')->get();
        $testimonials = DB::table('testimonials')->get();
        $data['page_terms'] = DB::table('page_terms_conditions')->first();
        $settings = array();
        if(isset($all_settings) && count($all_settings) > 0){
            foreach ($all_settings as $value) {
                $settings[$value->key_name] = $value->key_value;
            }
        }
        
        return view('terms.terms_view',$data);
    }

    public function update_term_and_conditions(Request $request)
    {
        // dd($request->all());
        $update = DB::table('page_terms_conditions')->update(['page_body' => $request->editor1, 'page_body_arabic' => $request->editor2]);
        if($update){
            return redirect()->back()->with('success','Updated Successfully');
        }else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }
    
    public function get_home_screen_text()
    {
        $settings = DB::table('settings')
        ->select('key_value')
        ->where('key_name', 'home_screen_text')
        ->first();
        
        return response()->json([
            'value' => $settings->key_value,
        ]);
    }
}
