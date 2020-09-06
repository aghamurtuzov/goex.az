<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sms;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Sms::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'type' => 1,
        'message' => $faker->text,
        'status' => 1,
        'delete' => 0,
        'phone' => $faker->numberBetween(150000, 50000000)
    ];
});
