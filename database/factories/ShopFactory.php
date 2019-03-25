<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address1' => $faker->address,
        'address2' => $faker->address,
        'zip_code' => $faker->numberBetween(1000000, 9999999),
        'company_seal' => $faker->imageUrl(),
    ];
});
