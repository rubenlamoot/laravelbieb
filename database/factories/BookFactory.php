<?php

use Faker\Generator as Faker;
use App\Book;
use App\Author;



$factory->define(Book::class, function (Faker $faker) {
    $author = Author::pluck('id')->toArray();
    return [
        //
        'title' => $faker->sentence(6),
        'author_id' => $faker->randomElement($author),
        'isbn' => $faker->isbn13,
        'published' => $faker->year,
        'edition' => $faker->randomDigitNotNull . 'e druk',
        'description' => $faker->text(200),
        'aantal' => $faker->randomDigitNotNull
    ];
});
