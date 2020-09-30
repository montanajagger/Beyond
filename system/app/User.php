<?php

namespace App;
use Laravel\Passport\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Junges\ACL\Traits\UsersTrait;
use Illuminate\Support\Str;


class User extends Authenticatable 
{
    use HasApiTokens,Notifiable,UsersTrait;
    public $api_token = null;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','username','phone','name','work','city','api_token','picture','secretary_title','discription','status', 'device_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function generateToken()
    // {
    //     $this->api_token = Str::random(60);
    //     $this->save();

    //     return $this->api_token;
    // }
}
