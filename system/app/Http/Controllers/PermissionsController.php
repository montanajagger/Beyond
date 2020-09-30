<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;

class PermissionsController extends Controller
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
        $permissions['permissions'] = DB::table('permissions')->orderBy('id','desc')->get();
        return view('permissions.list',$permissions);
    } 

    public function edit_permission($id)
    {
        $permissions['permissions'] = DB::table('permissions')->where('id',$id)->first();
        return view('permissions.edit',$permissions);
    } 

    public function del_permission($id)
    {
        $deleted = DB::table('permissions')->where('id',$id)->delete();
        if($deleted){
            return redirect('permissions')->with('success','Permission Deleted');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }

    public function add_permission()
    {
        return view('permissions.add');
    }

    public function add_permission_post(Request $request)
    { 

        $validator = Validator::make($request->all(),
        [
             'name' => 'required|string|unique:permissions',
        ]);

        $attributeNames = array(
             'name' => 'Permission title',
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

   
        $created = DB::table('permissions')->insert($data);
        if($created){
            return redirect('permissions')->with('success','Permission Created');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }  

    public function update_permission_post(Request $request)
    { 

        $validator = Validator::make($request->all(),
        [
             'name' => 'required|string|unique:permissions,name,'.$request->id,
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
        //  return redirect()->back()->with('error','Title Alredy Exit!');
        // }


        $data = ([
            'name'=> $request->name,
            //'slug' => $slug,
            'description'=> $request->description,
         ]);
 
        $created = DB::table('permissions')->where('id', $request->id)->update($data);
        if($created){
            return redirect('permissions')->with('success','Permission Updated');
        }else{
            return redirect()->back()->with('error','Something went wrong!');
        }
    }


    function createSlug($str, $delimiter = '-'){

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

} 
}
