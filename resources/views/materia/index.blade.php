@extends('layouts.app')
@section('title', 'Materia')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Materias
                        <a href="{{route('materia.create')}}" class="btn btn-success btn-sm float-right">Nuevo</a>
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
                                <th>Creditos</th>
                                <th>horas</th>
                                <th>Docente</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($materias as $materia)
                                <tr>
                                    <td>{{ $materia->nombre }}</td>
                                    <td>{{ $materia->creditos }} </td>
                                    <td>{{$materia->horas}} </td>
                                    <td>{{$materia->docente->nombre}} {{$materia->docente->apellido}} </td>
                                    <!-- <td>{{$materia->genero=='m' ? "Masculino": "Femenino"}} </td>
                                    <td>{{$materia->direccion}} </td>
                                    <td>{{$materia->nacimiento}} </td> -->
                                    <td>

                                        <a href="{{route('materia.show',$materia->id)}}"  class="btn btn-success">Ver</a>
                                        <a href="{{route('materia.edit',$materia->id)}}"  class="btn btn-warning">Editar</a>
                                        
                                        <form  action="{{route('materia.destroy', $materia->id)}}" method="post">
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