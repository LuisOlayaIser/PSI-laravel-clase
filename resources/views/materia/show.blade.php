@extends('layouts.app')
@section('title', 'Docentes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Materia: {{$materia->nombre}} 
                    </div>
                    <div class="card-body">
                        <p>Creditos: {{$materia->creditos}} </p>
                        <p>Horas: {{$materia->horas}} </p>
                        <p>Descripcion: {{$materia->descripcion}} </p>
                        <p>docente: {{$materia->docente->nombre}} {{$materia->docente->apellido}} </p>
                        <p><a href="{{route('docente.show',$materia->docente->id)}}"  class="btn btn-success">Ver Docente</a></p>
                        

                    </div>

                    <div>
                    <table class="table table-hover table-sm">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <!-- <th>Genero</th>
                                <th>Direccion</th>
                                <th>Nacimiento</th> -->
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->apellido }} </td>
                                    <td>{{$estudiante->telefono}} </td>
                                    <td>{{$estudiante->email}} </td>
                                    <td>

                                        <a href="{{route('estudiante.show',$estudiante->id)}}"  class="btn btn-success">Ver</a>
                                        
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

    @endsection