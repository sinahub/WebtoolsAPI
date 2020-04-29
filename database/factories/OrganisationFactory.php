<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Organisation;

$factory->define(Organisation::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
