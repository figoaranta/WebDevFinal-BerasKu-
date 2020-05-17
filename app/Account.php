<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

// class Account extends Model
class Account extends Authenticatable implements JWTSubject
{

    protected $fillable = [
        'firstName', 	
		'lastName', 	
		'userName', 
        'email',		
		'NIM', 			
		'dateOfBirth',
        'address', 		
		'phoneNumber',
        'userGenderType',
		'password', 		
		'userType', 		
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
