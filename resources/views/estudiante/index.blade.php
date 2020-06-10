<!DOCTYPE html>
<html>

<head>
    <title>Estudiantes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Estudiantes
                        <a href="{{route('estudiante.create')}}" class="btn btn-success btn-sm float-right">Nuevo</a>
                    </div>
                    <div class="card-body">
                        
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
                                <th>Email</th>
                                <th>Genero</th>
                                <th>Direccion</th>
                                <th>Nacimiento</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->apellido }} </td>
                                    <td>{{$estudiante->telefono}} </td>
                                    <td>{{$estudiante->email}} </td>
                                    <td>{{$estudiante->genero}} </td>
                                    <td>{{$estudiante->direccion}} </td>
                                    <td>{{$estudiante->nacimiento}} </td>
                                    <td>
                                        <a href="{{route('estudiante.edit',$estudiante->id)}}"  class="btn btn-warning">Editar</a>
                                        <!-- <a href="javascript: document.getElementById('delete-{{$estudiante->id}}').submit()" class="btn btn-danger">Eliminar</a> -->
                                        <form id="delete-{{$estudiante->id}}" action="{{route('estudiante.destroy', $estudiante->id)}}" method="post">
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


</body>

</html>