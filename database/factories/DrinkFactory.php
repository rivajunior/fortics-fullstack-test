<?php

// @var $factory \Illuminate\Database\Eloquent\Factory

use App\Models\Drink;
use Faker\Generator as Faker;

$factory->define(Drink::class, function (Faker $faker) {
    return [
        'brand' => $faker->words(2, true),
        'type_id' => $faker->numberBetween(1, 3),
        'flavor' => $faker->words(3, true),
        'mililiters' => $faker->numberBetween(0, 100000),
        'price' => $faker->randomFloat(2, 0, 99999),
        'quantity' => $faker->numberBetween(0, 10000),
    ];
});
