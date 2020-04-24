<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'firstName' 	=> $faker->firstName,
        'lastName' 		=> $faker->lastName,
        'userName' 		=> $faker->userName,
        'NIM' 			=> $faker->NIM,
        'dateOfBirth' 	=> $faker->dateOfBirth,
        'email' 		=> $faker->safemail,
        'phoneNumber'	=> $faker->phoneNumber,
        'password' 		=> $faker->password,
        'userType' 		=> $faker->userType,
    ];
});
