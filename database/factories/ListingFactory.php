<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Listing;
use Faker\Generator as Faker;


$factory->define(Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'tags' => 'laravel, api, backend',
        'company' => $faker->company(),
        'location' => $faker->city(),
        'email' => $faker->email(),
        'website' => $faker->url(),
        'description' => $faker->paragraph(5),
    ];
});
