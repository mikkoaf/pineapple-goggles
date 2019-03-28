<?php

use Faker\Generator as Faker;

$factory->define(App\DialoguePerson::class, function (Faker $faker) {
    return [
        //
        // connected to a user
        'person_name' => $faker->name(),
    ];
});
