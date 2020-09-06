<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sack;
use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Sack::class, function (Faker $faker) {
    return [
        'stock_id' => 1,
        'user_id' => 1,
        'name'=>$faker->name,
        "position" => $faker->numberBetween(1, 4),
        'type'=>1,
        'status' => 1,
        'delete' => 0,
        'date' => $faker->date(),
    ];
});
