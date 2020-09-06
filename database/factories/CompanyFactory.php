<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'tariff_id' => 1,
        'is_fix_or_person' => 1,
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'name_az' => $faker->name,
        'name_ru' => $faker->name,
        'name_en' => $faker->name,
        'discount' => $faker->boolean,
        'status' => 1,
        'delete' => 0,
    ];
});
