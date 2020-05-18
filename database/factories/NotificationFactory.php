<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notification;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'accountId' => $faker->accountId,
        'notificationStatus' => $faker->notificationStatus,
        'notificationMessage' => $faker->notificationMessage
    ];
});
