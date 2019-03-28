<?php

use Faker\Generator as Faker;

$factory->define(App\LocationHistory::class, function (Faker $faker) {
    return [
        //
        'timestamp' => $faker->unixTime(),
        'latitude' => $faker->latitude(),
        'longitude'=> $faker->longitude(),
    ];
});
