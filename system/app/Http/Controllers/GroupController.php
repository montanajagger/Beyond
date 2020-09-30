<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Group;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $groups['groups'] = DB::table('groups')->where('slug','!=','super-admin')->orderBy('id','desc')->get();
        return view('groups.list',$groups);
    } 

    public function edit_groups($id)
    {
        $groups['groups'] = DB::table('groups')->where('id',$id)->first();
        return view('groups.edit',$groups);
    } 

    public function del_groups($id)
    {
        $deleted = DB::table('groups')->where('id',$id)->delete();
        if($deleted){
            return redirect('groups')->with('success','Group Deleted');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_groups()
    {
        return view('groups.add');
    }

    public function add_group_post(Request $request)
    { 

        $validator = Validator::make($request->all(),
        [
             'name' => 'required|string|unique:groups',
        ]);

        $attributeNames = array(
             'name' => 'Group title',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){        
            return redirect()->back()->withErrors($validator)->withInput();
        }
        #### slug
        $slug = $this->createSlug($request->name);

 
        $data = ([
            'name'=> $request->name,
            'slug' => $slug,
            'description'=> $request->description,
        ]);

   
        $created = DB::table('groups')->insert($data);
        if($created){
            return redirect('groups')->with('success','Group Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }  

    public function update_group_post(Request $request)
    { 

    	$validator = Validator::make($request->all(),
        [
             'name' => 'required|string|unique:groups,name,'.$request->id,
        ]);

        $attributeNames = array(
             'name' => 'Group title',
        );

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails()){        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        #### slug
        // $slug = $this->createSlug($request->name);

        // $check_slug = DB::table('groups')->where('slug', $slug)->where('id', '<>', $request->id)->first();
        // if(!is_null($check_slug)){
        // 	return redirect()->back()->with('error','Title Alredy Exit!');
        // }


        $data = ([
            'name'=> $request->name,
            //'slug' => $slug,
            'description'=> $request->description,
         ]);
 
        $created = DB::table('groups')->where('id', $request->id)->update($data);
        if($created){
            return redirect('groups')->with('success','Groups Updated');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function group_permission($slug){
        
        $group = DB::table('groups')->where('slug',$slug)->first();
        if(is_null($group)){
            return redirect()->back();
        } 
        $data['group'] = $group;
        $data['permissions'] = \App\Permission::get();


        return view('groups.group_permission', $data);

    }

    public function update_permission(Request $request)
    {
        if($request->status == "on"){

            DB::table('group_has_permissions')->insert(['group_id' => $request->group,'permission_id' => $request->perm]);

        }else{

            DB::table('group_has_permissions')->where(['group_id' => $request->group,'permission_id' => $request->perm])->delete();

        }
        return "success";

    }


    function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

} 



}
