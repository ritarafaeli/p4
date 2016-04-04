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
        'password' => bcrypt(str_random(10)),
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
        'is_smoker' => $faker->boolean(20),
        'is_driver' => $faker->boolean(90),
        'is_cpr_certified' => $faker->boolean(30),
        'education_level_id' => factory(\App\UserInput::class)->create()->id,
    ];
});

$factory->define(App\Guardian::class, function (Faker\Generator $faker) use ($factory) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
    ];
});