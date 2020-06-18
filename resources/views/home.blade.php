@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{route('estudiante.index')}}" class="btn btn-success d-block">Estudiante</a></li>
                        <li class="list-group-item"><a href="{{route('docente.index')}}" class="btn btn-success d-block">Docente</a></li>
                        <li class="list-group-item"><a href="{{route('materia.index')}}" class="btn btn-success d-block">Materia</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection