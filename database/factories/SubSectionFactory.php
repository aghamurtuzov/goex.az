<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubSection;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(SubSection::class, function (Faker $faker) {
    return [
        "section_id"=>1,
        "user_id"=>1,
        "name" => $faker->name,
        "date" => $faker->date(),
        "status" => $faker->boolean,
        "type" => $faker->boolean
    ];
});
