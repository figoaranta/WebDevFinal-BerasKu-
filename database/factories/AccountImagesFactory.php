<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\accountImages;
use Faker\Generator as Faker;

$factory->define(accountImages::class, function (Faker $faker) {
    return [
    	'id' => $faker->id,
        'profilePic' => $faker->profilePic
    ];
});
