<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $table = "user";

    protected $fillable = [
            'firstname', 
            'middlename', 
            'lastname', 
            'email', 
            'username', 
            'password', 
            'mobile',
            'address_id',
            'position_id',
    ];

    protected $hidden = [
        'password', 
        'remember_token',
    ];



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
