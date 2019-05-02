<?php

use Faker\Generator as Faker;

$factory->define(App\DialoguePerson::class, function (Faker $faker) {
    return [
        //
        // connected to a user
        'user_id' => $faker->numberBetween(1,300),
        'person_name' => $faker->name(),

    ];
});
