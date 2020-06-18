
@extends('layouts.app')
@section('title', 'Docentes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Creacion de Materia
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
                        <form action="{{route('materia.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{old('nombre')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Creditos</label>
                                <input type="number" class="form-control" name="creditos" value="{{old('creditos')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Horas</label>
                                <input type="number" class="form-control" name="horas" value="{{old('horas')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" value="{{old('descripcion')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Docente</label>
                                <select name="docente_id" id="" class="form-control">
                                    @foreach($docentes as $docente)
                                    <option value="{{$docente->id}}">{{$docente->nombre}} {{$docente->apellido}}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{route('materia.index')}}" class="btn btn-danger">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
