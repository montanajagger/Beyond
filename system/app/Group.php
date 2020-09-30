<?php

namespace App;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Group extends Authenticatable 
{

    protected $table = 'groups';



    public function group_permissions(){
        return $this->belongsTo('App\GroupPermissions', 'id', 'group_id');
    }
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

   
}
