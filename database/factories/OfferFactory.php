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

$factory->define(App\Offer::class, function (Faker $faker) {
    $company = App\Company::all()->random();
    $startDate = $faker->dateTimeBetween('-1 month', 'now');

    return [
        'user_id' => $company->user->id,
        'company_id' => $company->id,
        
        'title' => $faker->jobTitle,
        'body' => $faker->paragraph(rand(3, 10)),

        'started_at' => $startDate,
        'ended_at' => $faker->dateTimeInInterval($startDate, '+3 months'),
    ];
});
