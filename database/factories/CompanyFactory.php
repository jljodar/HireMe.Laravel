<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Company::class, function (Faker $faker) {
    $createdDate = $faker->dateTimeBetween('-2 month', 'now');

    $description = [];
    for($i = rand(2, 5); $i > 0 ; --$i) {
        $description[] = $faker->paragraph(rand(1, 5));
    }

    return [
        'user_id' => App\User::all()->random()->id,
        
        'name' => $faker->unique()->company,
        'industry' => $faker->randomElement(['Information Technology and Services', 'Computer Software', 'Human Resources', 'Financial Services', 'Health, Wellness and Fitness']),
        'description' => implode(PHP_EOL . PHP_EOL, $description),

        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'postal_code' => $faker->postcode,

        'created_at' => $createdDate,
        'updated_at' => $createdDate,
    ];
});
