<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'first_name' =>  $faker->name,
        'last_name' =>  $faker->lastName,
        "address_line_1" => $faker->address,
        "address_line_2" => $faker->address,
        "passport_fin" => Str::random(7),
        "country" => $faker->country,
        "city" => $faker->country,
        'street' =>  $faker->name,
        'index' =>  $faker->name,
        'district' =>  $faker->name,
        'province' =>  $faker->name,
        'receiver' =>  $faker->name,
        "phone" => $faker->numberBetween(150000, 50000000),
        "status" =>1,
        "delete"=>0,
    ];
});
