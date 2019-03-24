<?php

use Faker\Generator as Faker;
use App\Author;

$factory->define(Author::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name
    ];
});
