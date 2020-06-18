@extends('layouts.app')
@section('title', 'Docentes')
@section('content')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizacion de la Materia: {{$materia->nombre}} 
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
                        <form action="{{route('materia.update',$materia->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{$materia->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="">Creditos</label>
                                <input type="number" class="form-control" name="creditos" value="{{$materia->creditos}}">
                            </div>
                            <div class="form-group">
                                <label for="">Horas</label>
                                <input type="number" class="form-control" name="horas" value="{{$materia->horas}}">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" value="{{$materia->descripcion}}">
                            </div>
                            <div class="form-group">
                                <label for="">Docente</label>
                                <select name="docente_id" id="" class="form-control">
                                    @foreach($docentes as $docente)
                                        @if($materia->docente_id == $docente->id)
                                        <option value="{{$docente->id}}" selected>{{$docente->nombre}} {{$docente->apellido}}</option>
                                        @else
                                        <option value="{{$docente->id}}">{{$docente->nombre}} {{$docente->apellido}}</option>
                                        @endif
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