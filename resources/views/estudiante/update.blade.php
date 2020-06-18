@extends('layouts.app')
@section('title', 'Estudiantes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizacion del Estudiante: {{$estudiante->nombre}} {{$estudiante->apellido}}
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <h3>Soluciona estos errores</h3>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>

                        </div>
                        @endif
                        <form action="{{route('estudiante.update',$estudiante->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{$estudiante->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="{{$estudiante->apellido}}">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="{{$estudiante->telefono}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$estudiante->email}}">
                            </div>
                            <div class="form-group">
                                <label for="">Genero</label>
                                <input type="text" class="form-control" name="genero" value="{{$estudiante->genero}}">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" name="direccion" value="{{$estudiante->direccion}}">
                            </div>
                            <div class="form-group">
                                <label for="">Nacimiento</label>
                                <input type="date" class="form-control" name="nacimiento" value="{{$estudiante->nacimiento}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{route('estudiante.index')}}" class="btn btn-danger">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection