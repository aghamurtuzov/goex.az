<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\About;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(About::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'content_az' =>  $faker->text,
        'content_en' =>  $faker->text,
        'content_ru' =>  $faker->text,
        "status" =>1,
        "delete"=>0,
    ];
});
