<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    $number = rand(10, 46);
    $gender = rand(0, 1) ? 'men' : 'women';

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'avatar' => "https://randomuser.me/api/portraits/${gender}/{$number}.jpg",
        'remember_token' => str_random(10),
    ];
});
