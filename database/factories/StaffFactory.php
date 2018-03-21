<?php

use Faker\Generator as Faker;
use App\Staff;
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

$factory->define(App\Staff::class, function (Faker $faker) {
    return [
        'full_name' =>	$faker->name(),
        'position' => $faker->jobTitle(),
        'skill' => $faker->sentence(),
        'year_exp' => $faker->numberBetween(1, 10),
        'year_join' => $faker->year(),
    ];
});
