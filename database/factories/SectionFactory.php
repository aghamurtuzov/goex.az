<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Section;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Section::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "stock_id"=>1,
        "user_id"=>1,
        "date" => $faker->date(),
        "status" =>1,
        "delete"=>0,
    ];
});
