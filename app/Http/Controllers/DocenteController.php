<?php

namespace App\Http\Controllers;

use App\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = Docente::orderBy('created_at','desc')->get();
        return view('docente.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docente.create');
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
            "nombre"=> 'required',
            "apellido" => 'required',
            "telefono" => 'required',
            "email" => 'required|email',
            "genero" => 'required',
            "direccion" => 'required',
            "nacimiento" => 'required',
            "tipo" => 'required'
        ];
        $this->validate($request,$reglas);
        $campos = $request->all();
        $docente = Docente::create($campos);
        return redirect()->route('docente.index')->with('info',"El docente se creó exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        $materias = $docente->materia;
        $estudiantes = $docente->materia()
        ->with('estudiante')
        ->get()
        ->pluck("estudiante")
        ->collapse()
        ->unique()
        ->values();
        return view('docente.show', compact('docente','estudiantes','materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        return view('docente.update', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $reglas = [
            "nombre"=> 'required',
            "apellido" => 'required',
            "telefono" => 'required',
            "email" => 'required|email',
            "genero" => 'required',
            "direccion" => 'required',
            "nacimiento" => 'required',
            "tipo" => 'required'
        ];
        $this->validate($request,$reglas);
        $docente->fill($request->all());
        $docente->save();
        return redirect()->route('docente.index')->with('info',"El docente se actualizó exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        try {
            $docente->delete();
        return redirect()->route('docente.index')->with('info', "Se elimininó el docente exitosamente");
        } catch (\Throwable $th) {
            return redirect()->route('docente.index')->with('error', "No se puede elimininar el docente porque esta relacionado");
        }
    }
}
