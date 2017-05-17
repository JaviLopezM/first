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
        'nombre' => $faker->firstName,
        'apellidos' =>$faker->lastName,
        'DNI'=>$faker->numberBetween(11111111,999999999),
        'telefono'=>$faker->phoneNumber,
        'email' => $faker->safeEmail,
        'direccion' => $faker->address,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['user', 'editor']),
        'foto' => 'default.jpg'
    ];
});
    //Creem un model que utilitzarem al seeder per utilitzar el faker que crearà contingut aleatori
$factory->define(App\Note::class, function (Faker\Generator $faker) {
    return [
        'note' => $faker->paragraph,

    ];
});