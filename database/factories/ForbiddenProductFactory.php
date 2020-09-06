<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ForbiddenProduct;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
$factory->define(ForbiddenProduct::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name_az' =>  $faker->name,
        'name_en' =>  $faker->name,
        'name_ru' =>  $faker->name,
        'image'=>$faker->imageUrl(800,400 , 'cats', true, 'Goex'),
        "status" =>1,
        "delete"=>0,
    ];
});
