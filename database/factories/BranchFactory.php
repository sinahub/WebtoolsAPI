<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

use App\Branch;
use App\Organisation;


$factory->define(Branch::class, function (Faker $faker) {
    $rand_org = Organisation::all('id')->random(1)[0]['id'];

    return [
        'name' => $faker->name,
        'organisation_id' => $rand_org,
    ];
});