<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public $table = 'ProductImages';
    protected $fillable = [
    	'productId',
    	'productImage'
    ];
}
