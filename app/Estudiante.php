<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materia;

class Estudiante extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'genero',
        'direccion',
        'nacimiento'
    ];

    public function materia(){
        return $this->belongsToMany(Materia::class);
    }
}
