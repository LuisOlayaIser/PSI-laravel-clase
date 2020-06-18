@extends('layouts.app')
@section('title', 'Estudiantes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Estudiante: {{$estudiante->nombre}} {{$estudiante->apellido}}
                    </div>
                    <div class="card-body">
                        <p>Telefono: {{$estudiante->telefono}} </p>
                        <p>Coreo Electrónico: {{$estudiante->email}} </p>
                        <p>Genero: {{$estudiante->genero=='m' ? "Masculino": "Femenino"}} </p>
                        <p>Direccion: {{$estudiante->direccion}} </p>
                        <p>Fecha de Nacimiento: {{$estudiante->nacimiento}} </p>

                        <div>
                            <table class="table table-hover table-sm">
                                <thead>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Horas</th>
                                    <th>Descripcion</th>
                                    <th>Docente</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($materias as $materia)
                                    <tr>
                                        <td>{{ $materia->nombre }}</td>
                                        <td>{{ $materia->creditos }} </td>
                                        <td>{{$materia->horas}} </td>
                                        <td>{{$materia->descripcion}} </td>
                                        <td>{{$materia->docente->nombre}} {{$materia->docente->apellido}}</td>
                                        <td>

                                            <form action="{{route('estudiante.destroy', $materia->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                            </form>
                                        </td>
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