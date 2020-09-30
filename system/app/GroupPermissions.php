<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class GroupPermissions extends Authenticatable 
{

    protected $table = 'group_has_permissions';



    // public function group_permissions(){
    //     return 
    // }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

   
}
