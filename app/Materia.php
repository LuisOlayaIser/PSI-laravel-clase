<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Docente;

class Materia extends Model
{
    protected $fillable = [
        "id",
        "nombre",
        "creditos",
        "horas",
        "descripcion",
        "docente_id"
    ];

    public function docente(){
        return $this->belongsTo(Docente::class);
    }

    public function estudiante(){
        return $this->belongsToMany(Estudiante::class);
    }
}
