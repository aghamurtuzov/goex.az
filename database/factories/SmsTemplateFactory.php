<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SmsTemplate;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(SmsTemplate::class, function (Faker $faker) {
    return [
        'message' => $faker->text,
        'status' => 1,
        'delete' => 0,
    ];
});
