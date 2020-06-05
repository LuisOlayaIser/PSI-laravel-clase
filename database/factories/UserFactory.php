<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Docente;
use App\User;
use App\Estudiante;
use App\Materia;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Estudiante::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'telefono' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'genero' => $faker->randomElement(['m','f']),
        'direccion' => $faker->address,
        'nacimiento' => $faker->date,
    ];
});

$factory->define(Docente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'telefono' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'genero' => $faker->randomElement(['m','f']),
        'direccion' => $faker->address,
        'nacimiento' => $faker->date,
        'tipo' => $faker->randomElement(['catedra','ocacional', 'planta']),
    ];
});

$factory->define(Materia::class, function (Faker $faker) {
    return [
        'nombre' => $faker->randomElement(['matematica','ingles','informatica','español','sociales','artistica']),
        'creditos' => $faker->numberBetween(1,4),
        'horas' => $faker->randomElement([2,3,4,5]),
        'descripcion' => $faker->paragraph(1),
        'docente_id' => Docente::inRandomOrder()->first()->id,
    ];
});
