<?php

use Faker\Generator as Faker;

$factory->define(App\Update::class, function (Faker $faker) {
    return [
        'text' => $faker->sentence()
    ];
});
