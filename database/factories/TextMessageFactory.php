<?php

use Faker\Generator as Faker;

$factory->define(App\TextMessage::class, function (Faker $faker) {
    return [
        'message' => $faker->realText($faker->numberBetween(10, 60)),
        'message_sent' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'date' => $faker->date('Y-m-d', '1971-12-31'),
        'time' => $faker->time('H.i'),
    ];
});
