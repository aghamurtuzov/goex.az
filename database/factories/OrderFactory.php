<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Orders;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Orders::class, function (Faker $faker) {
    return [
        'situation' => $faker->numberBetween(1,7),
        'confirmation' => $faker->numberBetween(1,7),
        'accepted' => $faker->numberBetween(1,7),
        'controls' => $faker->numberBetween(1,7),
        'category' => $faker->numberBetween(1,2),
        'link' => $faker->word(),
        'barcode' => Str::random(7),
        'product_name' => $faker->word(),
        'sack_id' => $faker->numberBetween(1,7),
        'customer_id' => $faker->numberBetween(1,7),
        'product_company' => $faker->word(),
        'follow_code' => $faker->numberBetween(1000,50000),
        'quantity' => $faker->numberBetween(50,100),
        'price_status' => $faker->numberBetween(1,0),
        'publish_date' => $faker->dateTime,
        'exchange' => $faker->numberBetween(1,7),
        'product_type' => $faker->numberBetween(1,7),
        'position' => $faker->numberBetween(1,7),
        'width' => $faker->numberBetween(1,15),
        'length' => $faker->numberBetween(1,15),
        'weight' => $faker->numberBetween(1,15),
        'value' => $faker->numberBetween(10,100),
        'total_price' => $faker->numberBetween(50,100),
        'receipt_date' => $faker->dateTime,
    ];
});
