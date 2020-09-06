<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stock;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "latitude" => $faker->latitude(),
        "longitude" => $faker->longitude(),
        "country_id" => 1,
        "city_id" => 1,
        "user_id" => 1,
        "date" => $faker->date(),
        "address" => $faker->address,
        "phone_1" => $faker->numberBetween(150000, 50000000),
        "phone_2" => $faker->numberBetween(150000, 50000000),
        "phone_3" => $faker->numberBetween(150000, 50000000),
        "status" => 1,
        "delete" => 0,
        "type" => $faker->boolean
    ];
});
