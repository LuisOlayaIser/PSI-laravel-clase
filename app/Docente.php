<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materia;

class Docente extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'genero',
        'direccion',
        'nacimiento',
        'tipo'
    ];

    public  function materia(){
        return $this->hasMany(Materia::class);
    }
}


