<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('created_at','desc')->get();
        return view('estudiante.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');
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
            "nacimiento" => 'required'
        ];
        $this->validate($request,$reglas);
        $campos = $request->all();
        $estudiante = Estudiante::create($campos);
        return redirect()->route('estudiante.index')->with('info',"El estudiante se creo exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        return $estudiante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        $estudiantes= [$estudiante];
        return view('estudiante.update', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        $reglas = [
            "nombre"=> 'required',
            "apellido" => 'required',
            "telefono" => 'required',
            "email" => 'required|email',
            "genero" => 'required',
            "direccion" => 'required',
            "nacimiento" => 'required'
        ];
        $this->validate($request,$reglas);
        $estudiante->fill($request->all());
        $estudiante->save();
        return redirect()->route('estudiante.index')->with('info',"El estudiante se actualizó exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiante.index')->with('info', "Se elimininó el estudiante exitosamente");
    }
}
