@extends('layouts.app')
@section('title', 'Estudiantes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Creacion de Estudiante
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
                        <form action="{{route('estudiante.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="{{old('apellido')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Genero</label>
                                <input type="text" class="form-control" name="genero" value="{{old('genero')}}">
                            </div> -->
                            <div class="form-group">
                                <label for="">Genero</label>
                                <select name="genero" id="" class="form-control">
                                    <option value="m" selected>Masculino</option>
                                    <option value="f">Femenino</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" name="direccion" value="{{old('direccion')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Nacimiento</label>
                                <input type="date" class="form-control" name="nacimiento" value="{{old('nacimiento')}}">
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