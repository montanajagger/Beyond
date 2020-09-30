<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use DB;


class GeneralFieldsController extends Controller
{
    public $successStatus = 200;

    public function cities(Request $request)
    {
        $data['cities'] = DB::table('tbl_cities')->orderBy('name','asc')->get();
        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }
        return view('general_fields.cities',$data);
    }
    public function return_cities(Request $request)
    {
        $result['data'] = [];
        $data['cities'] = DB::table('tbl_cities')->orderBy('name','asc')->get();
        // if($request->header("Authorization")){
        //     return response()->json(['success' => $data],$this->successStatus);
        // }
       return json_encode($data);
    }
    public function add_cities(Request $request)
    {
        $data = ([
            "name" => $request->name,
            "ar_name" => $request->ar_name
        ]);
        $created = DB::table('tbl_cities')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','City Created');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

     public function edit_cities(Request $request)
    {
        $check = DB::table('tbl_cities')->where('id',$request->id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'City id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }

        $data = ([
            "name" => $request->name,
            "ar_name" => $request->ar_name
        ]);

        $updated = DB::table('tbl_cities')->where('id',$request->id)->update($data);

        if($updated){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect()->back()->with('success','City Updated');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function del_cities($id, Request $request)
    {

        $check = DB::table('tbl_cities')->where('id',$id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'City id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }


        $deleted = DB::table('tbl_cities')->where('id',$id)->delete();

        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','City Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }


    public function titles(Request $request)
    {
        $data['titles'] = DB::table('titles')->orderBy('name','asc')->get();
        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }
        return view('general_fields.titles',$data);
    }
    public function return_titles(Request $request)
    {
        $result['data'] = [];
        $data['titles'] = DB::table('titles')->orderBy('name','asc')->get();
        // if($request->header("Authorization")){
        //     return response()->json(['success' => $data],$this->successStatus);
        // }
       return json_encode($data);
    }
    public function add_title(Request $request)
    {
        $data = ([
            "name" => $request->name,
            "ar_name" => $request->ar_name
        ]);
        $created = DB::table('titles')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','Title Created');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

     public function edit_title(Request $request)
    {
        $check = DB::table('titles')->where('id',$request->id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'Title id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }

        $data = ([
            "name" => $request->name,
            "ar_name" => $request->ar_name
        ]);

        $updated = DB::table('titles')->where('id',$request->id)->update($data);

        if($updated){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect()->back()->with('success','Title Updated');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function del_title($id, Request $request)
    {

        $check = DB::table('titles')->where('id',$id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'Title id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }


        $deleted = DB::table('titles')->where('id',$id)->delete();

        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','Title Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }


    public function work(Request $request)
    {
        $data['work'] = DB::table('tbl_work')->orderBy('name','asc')->get();
        if($request->header("Authorization")){
            return response()->json(['success' => $data],$this->successStatus);
        }
        return view('general_fields.work',$data);
    }

    public function add_work(Request $request)
    {
        $data = ([
            "name" => $request->name
        ]);
        $created = DB::table('tbl_work')->insert($data);
        if($created){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Created'],$this->successStatus);
            }
            return redirect()->back()->with('success','Work Created');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

     public function edit_work(Request $request)
    {
        $check = DB::table('tbl_work')->where('id',$request->id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'Work id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }

        $data = ([
            "name" => $request->name
        ]);

        $updated = DB::table('tbl_work')->where('id',$request->id)->update($data);

        if($updated){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Updated'],$this->successStatus);
            }
            return redirect()->back()->with('success','Work Updated');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function del_work($id, Request $request)
    {

        $check = DB::table('tbl_work')->where('id',$id)->first();

        if(is_null($check)){
            if($request->header("Authorization")){
                return response()->json(['error' => 'Work id not found'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }


        $deleted = DB::table('tbl_work')->where('id',$id)->delete();

        if($deleted){
            if($request->header("Authorization")){
                return response()->json(['success' => 'Deleted'],$this->successStatus);
            }
            return redirect()->back()->with('success','Work Deleted');
        }else{
            if($request->header("Authorization")){
                return response()->json(['error' => 'Something went wrong'],$this->successStatus);
            }
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    /*====================================
    =            testimonials            =
    ====================================*/

    public function del_testimonials($id)
    {

        $check = DB::table('testimonials')->where('id',$id)->first();

        if(!is_null($check)){
            DB::table('testimonials')->where('id',$id)->delete();
            return redirect('testimonials')->with('success','Testimonials Deleted');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function testimonials(){
        $subadmins = DB::table('testimonials')->orderBy('name','asc')->get();
        return view('testimonials.index',compact('subadmins'));
    }

    public function add_testimonials(Request $request){


        $validator = Validator::make($request->all(),
        [
             'firstname' => 'required',
             'job' => 'required',
             'description' => 'required',

        ]);

        $attributeNames = array(
             'firstname' => 'Name',
             'job' => 'job'
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
            'picture' => 'Profile',
         );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('picture')->getClientOriginalExtension();
        $dir = 'uploads/testimonials/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('picture')->move($dir, $filename);
       }

       $data = ([
            'name'=> $request->firstname,
            'description'=> $request->description,
            'job_title'=> $request->job,

        ]);

         if ($request->hasFile('picture')) {
            $data['img'] = $filename;
         }

        $created = DB::table('testimonials')->insert($data);
        if($created){
            return redirect('testimonials')->with('success','Testimonials Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    /*=====  End of testimonials  ======*/


}



