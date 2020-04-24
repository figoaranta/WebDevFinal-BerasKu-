<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accountImage extends Model
{
    public $table = "accountImages";
    protected $fillable = [
    	'id',
    	'profilePic',
    ];
}
