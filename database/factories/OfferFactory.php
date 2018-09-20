<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

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

        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
