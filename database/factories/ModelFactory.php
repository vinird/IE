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

$factory->define(App\Noticia::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url_img' => '1467680479_aa.png',
        'url_document' => '1467680479_logo.rar',
        'content' => str_random(10).' '.str_random(20).' '.str_random(10),
        'auth' => $faker->name,
        'user_id' => 1
    ];
});

$factory->define(App\Evento::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url_img' => '1467610657_a.png',
        'url_document' => '1467610657_b.pdf',
        'content' => str_random(10).' '.str_random(20).' '.str_random(10),
        'event_date' => '2016/07/05',
        'org' => $faker->name,
        'user_id' => 1,
        'sede_id' => 2
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
