<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        "phone" => $faker->numberBetween(150000, 50000000),
        "wp" => $faker->numberBetween(150000, 50000000),
        "address_az" => $faker->address,
        "address_en" => $faker->address,
        "address_ru" => $faker->address,
        "work_date_az" => $faker->date(),
        "work_date_ru" => $faker->date(),
        "work_date_en" => $faker->date(),
        "work_hour" => $faker->date(),
        "email" => $faker->email,
        "status" => 1,
        "delete" => 0,
        "user_id"=>1,
    ];
});
