<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        "first_name" => $faker->name,
        "last_name" => $faker->lastName,
        "gender" => $faker->boolean,
        "date" => $faker->date(),
        "address" => $faker->address,
        "passport" => Str::random(8),
        "passport_fin" => Str::random(7),
        "phone" => $faker->numberBetween(150000, 50000000),
        "email" => Str::random(10) . '@gmail.com',
        "password" => Hash::make(Str::random(10)),
        "status" =>1,
         "delete"=>0,
        "customer_code" => $faker->numberBetween(150000, 500000),
        "discount" => $faker->numberBetween(150, 500),
        "type" => $faker->boolean
    ];
});
