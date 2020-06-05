<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'riceGradeType',
        'riceType',
        'riceShapeType',
        'riceColorType',
        'riceTextureType',
        'riceQuantity',
        'riceUnitType',
        'price',
    ];
}
