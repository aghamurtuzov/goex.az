<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Information;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title_az' =>  $faker->name,
        'title_en' =>  $faker->name,
        'title_ru' =>  $faker->name,
        'content_az' =>  $faker->text,
        'content_en' =>  $faker->text,
        'content_ru' =>  $faker->text,
        'image'=>$faker->imageUrl(800,400 , 'cats', true, 'Goex'),
        "date" => $faker->date(),
        "date_between" => $faker->date(),
        'category' =>  $faker->name,
        'view' =>  $faker->name,
        "status" =>1,
        "delete"=>0,
    ];
});
