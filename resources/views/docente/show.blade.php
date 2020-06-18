@extends('layouts.app')
@section('title', 'Docentes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Docente: {{$docente->nombre}} {{$docente->apellido}}
                    </div>
                    <div class="card-body">
                        <p>Telefono: {{$docente->telefono}} </p>
                        <p>Coreo Electrónico: {{$docente->email}} </p>
                        <p>Genero: {{$docente->genero=='m' ? "Masculino": "Femenino"}} </p>
                        <p>Direccion: {{$docente->direccion}} </p>
                        <p>Fecha de Nacimiento: {{$docente->nacimiento}} </p>
                        <p>Tipo: {{$docente->tipo}} </p>

                        <div>
                            <h3>Materias</h3>
                            <table class="table table-hover table-sm">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Horas</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($materias as $materia)
                                    <tr>
                                        <td>{{ $materia->nombre }}</td>
                                        <td>{{ $materia->creditos }} </td>
                                        <td>{{$materia->horas}} </td>
                                        <td>{{$materia->descripcion}} </td>
                                        <td><a href="{{route('materia.show',$materia->id)}}"  class="btn btn-success">Ver</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div>
                            <h3>Estudiantes</h3>
                            <table class="table table-hover table-sm">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Correo</th>
                                </thead>
                                <tbody>
                                    @foreach($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{ $estudiante->nombre }}</td>
                                        <td>{{ $estudiante->apellido }} </td>
                                        <td>{{$estudiante->telefono}} </td>
                                        <td>{{$estudiante->email}} </td>
                                        <td><a href="{{route('estudiante.show',$estudiante->id)}}"  class="btn btn-success">Ver</a></td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection