<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(City::class, function (Faker $faker) {
    return [
        "name" => $faker->country,
        "status" =>1
    ];
});
