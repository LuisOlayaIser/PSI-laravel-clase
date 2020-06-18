@extends('layouts.app')
@section('title', 'Docentes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Docentes
                        <a href="{{route('docente.create')}}" class="btn btn-success btn-sm float-right">Nuevo</a>
                    </div>
                    <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                        @endif
                        @if(session('info'))
                        <div class="alert alert-success">
                            {{session('info')}}
                        </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Telefono</th>
                                <th>Tipo</th>

                                <!-- <th>Genero</th>
                                <th>Direccion</th>
                                <th>Nacimiento</th> -->
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($docentes as $docente)
                                <tr>
                                    <td>{{ $docente->nombre }}</td>
                                    <td>{{ $docente->apellido }} </td>
                                    <td>{{$docente->telefono}} </td>
                                    <td>{{$docente->email}} </td>
                                    <!-- <td>{{$docente->genero=='m' ? "Masculino": "Femenino"}} </td>
                                    <td>{{$docente->direccion}} </td>
                                    <td>{{$docente->nacimiento}} </td> -->
                                    <td>

                                        <a href="{{route('docente.show',$docente->id)}}"  class="btn btn-success">Ver</a>
                                        <a href="{{route('docente.edit',$docente->id)}}"  class="btn btn-warning">Editar</a>
                                        
                                        <form  action="{{route('docente.destroy', $docente->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
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

    @endsection