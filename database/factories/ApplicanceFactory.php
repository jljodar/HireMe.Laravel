<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Applicance::class, function (Faker $faker) {
    // Use an array to keep track of the offer-user pairs generated, avoiding Integrity constraint violation
    static $combinations;
    $combinations = (($combinations) ? : []);
    $actualCombination = [];

    do {
        $offer = App\Offer::all()->random();
        $user = App\User::all()->random();

        $actualCombination = [$offer->id, $user->id];

    } while(in_array($actualCombination, $combinations));

    $combinations[] = $actualCombination;


    $createdDate = $faker->dateTimeBetween($offer->started_at, 'now');
    $viewedDate = ((rand(0, 99) > 60) ? $faker->dateTimeBetween($createdDate, 'now') : null);
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

    // The updated date will be the date of the last status change
    $updatedDate = $acceptedDate ?? $declinedDate ?? $viewedDate ?? $createdDate;

    return [
        'user_id' => $user->id,
        'offer_id' => $offer->id,

        'viewed_at' => $viewedDate,
        'accepted_at' => $acceptedDate,
        'declined_at' => $declinedDate,

        'created_at' => $createdDate,
        'updated_at' => $updatedDate,
    ];
});
