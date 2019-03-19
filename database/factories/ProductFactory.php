<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'name' => $faker->sentence(2),
            'image' => 'uploads/products/book.png',
            'price' => $faker->numberBetween(1000,10000),
            'description' => $faker->paragraph(3)
    ];
});
