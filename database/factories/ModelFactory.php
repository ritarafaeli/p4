<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
        'is_parent' => $faker->boolean(50),
    ];
});

$factory->define(App\UserInput::class, function (Faker\Generator $faker) {
    return [
        'category' => 'language',
        'subcategory' => $faker->languageCode,
    ];
});

$factory->define(App\Caregiver::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'bio' => $faker->text(),
        'zip_code' => $faker->numberBetween(10000,99999),
        'age' => $faker->numberBetween(18,65),
        'years_experience' => $faker->numberBetween(0,30),
        'is_smoker' => $faker->boolean(20),
        'is_driver' => $faker->boolean(90),
        'is_cpr_certified' => $faker->boolean(30),
        'is_experienced_infants' => $faker->boolean(50),
        'is_experienced_toddlers' => $faker->boolean(50),
        'is_experienced_preschoolers' => $faker->boolean(50),
        'is_experienced_specialneeds' => $faker->boolean(50),
        'education_level_id' => $faker->numberBetween(7,11),
    ];
});


$factory->define(App\Guardian::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
    ];
});


$factory->define(App\Job::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'parent_id' => factory(\App\Guardian::class)->create()->id,
        'title' => $faker->text(30),
        'description' => $faker->text(200),
        'zip_code' => $faker->numberBetween(10000,99999),
        'num_children' => $faker->numberBetween(1,5),
        'is_driver' => $faker->boolean(90),
        'is_cpr_certified' => $faker->boolean(30),
        'is_smoker' => $faker->boolean(10),
        'education_level_id' => $faker->numberBetween(7,11),
        'hourly_rate_id' => $faker->numberBetween(1,6),
    ];
});