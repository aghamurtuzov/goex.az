<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Condition;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
$factory->define(Condition::class, function (Faker $faker) {
    return [
        "user_id"=>1,
        "status" =>1,
        "delete"=>0,
        'content_az' =>  $faker->text,
        'content_en' =>  $faker->text,
        'content_ru' =>  $faker->text,
    ];
});
