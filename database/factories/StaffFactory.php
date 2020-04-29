<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Branch;
use App\Staff;

$factory->define(Staff::class, function (Faker $faker) {
    $rand_branch = Branch::all('id')->random(1)[0]['id'];

    return [
        'name' => $faker->name,
        'branch_id' => $rand_branch,
    ];
});
