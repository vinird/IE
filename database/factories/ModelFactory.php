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
    ];
});

// $factory->define(App\Sede::class, function (Faker\Generator $faker) {
//     return [
//         'name' => str_random(10),
//         'link' => str_random(20),
//     ];
// });

$factory->define(App\Mensaje::class, function (Faker\Generator $faker) {
    return [
        'message' => str_random(10).' '.str_random(10).' '.str_random(10).' '.str_random(10) ,
        'sendBy' => 2,
        'takeBy' =>1
    ];
});
