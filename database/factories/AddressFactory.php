<?php

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        //
        'street' => $faker->streetName,
        'house_nr' => $faker->buildingNumber,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,

    ];
});
