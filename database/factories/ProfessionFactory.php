<?php

use Faker\Generator as Faker;

// Podríem obtenir el model adequat amb:
// php artisan make:factory ProfessionFactory --model=Profession
$factory->define(App\Profession::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3, false)
    ];
});
