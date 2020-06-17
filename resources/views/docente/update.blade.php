<!DOCTYPE html>
<html>

<head>
    <title>Docentes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Actualizacion del Docente: {{$docente->nombre}} {{$docente->apellido}}
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
                        {{$docente->id}}
                        <form action="{{route('docente.update',$docente->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="{{$docente->nombre}}">
                            </div>
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" name="apellido" value="{{$docente->apellido}}">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="{{$docente->telefono}}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$docente->email}}">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Genero</label>
                                <input type="text" class="form-control" name="genero" value="{{$docente->genero}}">
                            </div> -->
                            <div class="form-group">
                                <label for="">Genero</label>
                                <select name="genero" id="" class="form-control">
                                    @if($docente->genero == 'm')
                                    <option value="m" selected>Masculino</option>
                                    <option value="f">Femenino</option>
                                    @else
                                    <option value="m">Masculino</option>
                                    <option value="f" selected>Femenino</option>
                                    @endif
                                    
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" name="direccion" value="{{$docente->direccion}}">
                            </div>
                            <div class="form-group">
                                <label for="">Nacimiento</label>
                                <input type="date" class="form-control" name="nacimiento" value="{{$docente->nacimiento}}">
                            </div>
                            <div class="form-group">
                                <label for="">Tipo</label>
                                <select name="tipo" id="" class="form-control" value="{{$docente->tipo}}">
                                    @if($docente->tipo == 'Catedra')
                                    <option value="Catedra" selected>Catedra</option>
                                    <option value="Ocacional">Ocacional</option>
                                    <option value="Planta">Planta</option>
                                    @else
                                        @if($docente->tipo == 'Ocacional')
                                        <option value="Catedra" >Catedra</option>
                                    <option value="Ocacional" selected>Ocacional</option>
                                    <option value="Planta">Planta</option>
                                        @else
                                        <option value="Catedra" >Catedra</option>
                                    <option value="Ocacional">Ocacional</option>
                                    <option value="Planta" selected>Planta</option>
                                        @endif
                                    @endif
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="{{route('docente.index')}}" class="btn btn-danger">Regresar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>