<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
      'name'        => $faker->sentence(1, false),
      'description' => $faker->sentence(),
      'price'       => '100.25',
    ];
});
