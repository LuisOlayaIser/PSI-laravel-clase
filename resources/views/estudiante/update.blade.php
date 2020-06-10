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
                    Actualizacion del Estudiante {{$estudiante->nombre}} {{$estudiante->apellido}}
                </div>
                <div class="card-body">
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
                           <input type="text" class="form-control" name="nacimiento" value="{{$estudiante->nacimiento}}">
                       </div>
                       <button type="submit" class="btn btn-primary">Enviar</button>
                       <a href="{{route('estudiante.index')}}" class="btn btn-danger">Regresar</a>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html> 