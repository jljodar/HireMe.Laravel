<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Applicance::class, function (Faker $faker) {
    $offer = App\Offer::all()->random();
    $viewedDate = ((rand(0, 99) > 60) ? $faker->dateTimeBetween($offer->started_at, 'now') : null);
    
    $acceptedDate = null;
    $declinedDate = null;

    if($viewedDate) {
        $x = rand(0, 99);
        if($x > 85) {
            $acceptedDate = $faker->dateTimeBetween($viewedDate, 'now');
        } else if($x > 30) {
            $declinedDate = $faker->dateTimeBetween($viewedDate, 'now');
        }
    }

    return [
        'user_id' => App\User::all()->random()->id,
        'offer_id' => $offer->id,

        'viewed_at' => $viewedDate,
        'accepted_at' => $acceptedDate,
        'declined_at' => $declinedDate,

        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});