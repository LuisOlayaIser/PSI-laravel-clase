<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materias = Materia::orderBy('created_at','desc')->get();
        $materias->each(function ($data){
            $data->docente = Docente::findOrFail($data->docente_id);
        });
        return view('materia.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docentes = Docente::all();
        return view('materia.create', compact('docentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            "nombre" => 'required',
            "creditos" => 'required',
            "horas" => 'required',
            "descripcion" => 'required',
            "docente_id" => 'required',
        ];
        $this->validate($request,$reglas);
        $campos = $request->all();
        $materia = Materia::create($campos);
        return redirect()->route('materia.index')->with('info',"La materia se creó exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->docente = Docente::findOrFail($materia->docente_id);
        $estudiantes = $materia->estudiante;
        return view('materia.show', compact('materia','estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        $docentes = Docente::all();
        return view('materia.update', compact('materia','docentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $materium)
    {
        $reglas = [
            "nombre" => 'required',
            "creditos" => 'required',
            "horas" => 'required',
            "descripcion" => 'required',
            "docente_id" => 'required',
        ];
        $this->validate($request,$reglas);
        $materia = Materia::findOrFail($materium);
        $campos = $request->all();
        $materia->fill($campos);
        $materia->save();
        return redirect()->route('materia.index')->with('info',"La materia se actualizó exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $materia = Materia::findOrFail($id);
            $materia->delete();
        return redirect()->route('materia.index')->with('info', "Se elimininó la materia exitosamente");
        } catch (\Throwable $th) {
            return redirect()->route('materia.index')->with('error', "No se puede elimininar la materia porque esta relacionado");
        }
    }
}
