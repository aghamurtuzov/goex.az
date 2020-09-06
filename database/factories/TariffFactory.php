<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tariff;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Tariff::class, function (Faker $faker) {
    return [
        'price' => 1,
        'user_id' => 1,
        'weight_text_az' => $faker->text(100),
        'weight_text_ru' => $faker->text(100),
        'weight_text_en' => $faker->text(100),
        'status' => 1,
        'delete' => 0,
        'type' =>  $faker->boolean,
        'sort' => 1,
        'country_id' => 1,
        'start_weight' => $faker->numberBetween(1, 10),
        'end_weight' => $faker->numberBetween(1, 10),
    ];
});
