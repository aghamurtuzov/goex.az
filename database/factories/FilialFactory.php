<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Filial;
use Faker\Generator as Faker;

$factory->define(Filial::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "status" => $faker->boolean,
        "delete" => false
    ];
});
