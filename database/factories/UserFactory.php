<?php

use App\User;
use Faker\Provider\nl_BE\Person;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'insurance_nr' => Person::rrn(),
        'address' => $faker->streetName,
        'house_nr' => $faker->buildingNumber,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'role_id' => '2',
        'is_active' => '1'
    ];
});
