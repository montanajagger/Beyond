<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Group;
use DB;

 
class SubAdminController extends Controller
{
    public function index()
    {
        $subadmins['subadmins'] = DB::table('users')->where('user_type','subadmin')->orderBy('id','desc')->get();
        return view('subadmin.list',$subadmins);
    } 

    public function edit_sub_admins($id)
    {
        $data['subadmin'] = DB::table('users')->where('id',$id)->where('user_type','subadmin')->first();
        $data['groups'] = DB::table('groups')->orderBy('id','desc')->get();
        $data['group_id'] = DB::table('user_has_groups')->where('user_id',$id)->first();
        return view('subadmin.edit',$data);
    } 

    public function del_sub_admins($id)
    {
        $deleted = DB::table('users')->where('id',$id)->delete();
        if($deleted){   
            DB::table('user_has_groups')->where('user_id',$id)->delete();
            return redirect('sub-admins')->with('success','Sub Admin Deleted');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_sub_admins()
    {
        $data['groups'] = DB::table('groups')->orderBy('id','desc')->get();
        return view('subadmin.add',$data);
    }

    public function add_subadmin_post(Request $request)
    { 

        $validator = Validator::make($request->all(),
        [
             'email' => 'required|string|email|max:254|unique:users',
             'username' => 'required|string|max:254|unique:users,username',
        ]);

        $attributeNames = array(
             'email' => 'Email Address',
             'username' => 'Username'
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
            'username'=> $request->username,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'subadmin'
        ]);

         if ($request->hasFile('picture')) {
            $data['picture'] = $filename;
         }
   
        $created = DB::table('users')->insertGetId($data);
        if($created){
        DB::table('user_has_groups')->insert(['group_id' => $request->permission, 'user_id' => $created]);
            return redirect('sub-admins')->with('success','Sub Admin Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }  

    public function update_subadmin_post(Request $request)
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
            'name'=> $request->firstname.' '.$request->lastname,
            'phone'=> $request->phone,
         ]);

         if ($request->hasFile('picture')) {
            $data['picture'] = $filename;
         }

        if (!is_null($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
 
        $updated = DB::table('users')->where('id', $request->user_id)->update($data);
        DB::table('user_has_groups')->where('user_id', $request->user_id)->update(['group_id' => $request->permission]); 
        if($updated){
            return redirect('sub-admins')->with('success','Sub Admin Updated');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }  
 

}
