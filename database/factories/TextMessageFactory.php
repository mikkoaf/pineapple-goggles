<?php

use Faker\Generator as Faker;

$factory->define(App\TextMessage::class, function (Faker $faker) {
    return [
        'message' => $faker->realText($faker->numberBetween(10, 60)),
        'message_sent' => $faker->dateTime(),
        'date' => $faker->date(),
        'time' => $faker->time('H.i'),
    ];
});
