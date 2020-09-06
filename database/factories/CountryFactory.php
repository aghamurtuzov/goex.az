<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Country;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'name_az' => $faker->country,
        'name_ru' => $faker->country,
        'name_en' => $faker->country,
        'code' => $faker->numberBetween(150000, 50000000),
        'status' => 1,
        'delete' => 0,
    ];
});
