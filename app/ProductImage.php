<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'ProductImages';
    protected $fillable = [
    	'productId',
    	'productImage'
    ];
}
