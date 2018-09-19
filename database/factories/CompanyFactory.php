<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

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
    ];
});
