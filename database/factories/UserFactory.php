<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        
        'name' => $faker->name,
        'last_name' => $faker->lastname,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'postal_code' => $faker->postcode,
        
        'about_me' => $faker->paragraph,

        'profile_visits' => rand(0, 200),
        'last_seen_at' => Carbon::now(),

        'remember_token' => str_random(10),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
