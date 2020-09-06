<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faq;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
$factory->define(Faq::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title_az' =>  $faker->name,
        'title_en' =>  $faker->name,
        'title_ru' =>  $faker->name,
        'content_az' =>  $faker->text,
        'content_en' =>  $faker->text,
        'content_ru' =>  $faker->text,
        "status" =>1,
        "delete"=>0,
    ];
});
