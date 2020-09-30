<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use \Junges\ACL\Http\Models\Group;
use Illuminate\Support\Facades\DB;
use \Junges\ACL\Http\Models\Permission;
class AcessController extends Controller
{

    public function index(){

    // Breadcrumbs
     $breadcrumbs = [
        ['link' => "modern", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => " Extra Components"], ['name' => "Access Controller"],
    ];
    //Pageheader set true for breadcrumbs
    $pageConfigs = ['pageHeader' => true];
 
        
        return view('pages.access-control',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }

    public function roles($role){
        if(Auth::user()){
            // check group is empty
            $group = DB::table('groups')->count();
            if($group == null){
                //if group empty add two group and assign permission
                $group = new Group;            
                $group->name = "Admin";
                $group->slug = "admin-user";
                $group->description = "Monitor and manage everything";
                $group->save();
                $group->assignAllPermissions();

                $group = new Group;            
                $group->name = "Editor";
                $group->slug = "editor-user";
                $group->description = "User can only edit post.";
                $group->save();
                $group->assignPermissions('edit-post');
           } 
        //    if 
            $user = Auth::user();
            $user->assignGroup('admin-user', 'editor-user');
            if($role === 'admin'){
                $user->assignAllGroups();
            }
            else{
                $user->revokeAllGroups();
                $user->assignGroup('editor-user'); 
            }
        }
        return redirect()->back();
    }
    public function home(){
        return view('pages.dashboard-ecommerce');
    }
}
