<?php

use Faker\Generator as Faker;
use App\Book;
use Faker\Provider\Barcode;


$factory->define(Book::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence(6),
        'author' => $faker->name,
        'isbn' => $faker->isbn13,
        'published' => $faker->year,
        'edition' => $faker->randomDigit . 'e druk',
        'description' => $faker->text(200),
        'stock' => $faker->randomDigit
    ];
});
