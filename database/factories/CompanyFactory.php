<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        
        'name' => $faker->unique()->company,
        'industry' => $faker->randomElement(['Information Technology and Services', 'Computer Software', 'Human Resources', 'Financial Services', 'Health, Wellness and Fitness']),
        'description' => $faker->paragraph,

        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'postal_code' => $faker->postcode,

        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
