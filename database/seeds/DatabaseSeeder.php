<?php

use App\Docente;
use App\Estudiante;
use App\Materia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Estudiante::truncate();
        Docente::truncate();
        Materia::truncate();
        factory(Estudiante::class,200)->create();
        factory(Docente::class,20)->create();
        factory(Materia::class,50)->create()->each(
            function($materia){
                $estudiantes = Estudiante::all()->random(mt_rand(5,20))->pluck('id');
                $materia->estudiante()->attach($estudiantes);
            }
        );
    }
}
