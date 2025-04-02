@extends('adminlte::page')

@section('content_header')
    <h1><b>Editar Materias</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">edite Materia</h3>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{url('/admin/materias',$materia->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre dela carrera</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-graduation-cap"></i>
                                            </span>
                                        </div>
                                        <select class="form-control" name="carrera_id" required>
                                            <option value="">Selecione una carrera...</option>
                                            @foreach($carreras as $carrera)
                                   <option value="{{ $carrera->id }}"
                                     {{ old('carrera_id', $materia->carrera_id) == $carrera->id? 'selected' : ''}}>
                                    {{ $carrera->nombre }}
                                   </option>
                                   @endforeach
                                        </select>
        
                                    </div>
                                    @error('carrera_id')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                                <!--campo nombre-->
                                <div class="form-group">
                                    <label for="">Nombre dela materia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-book">
                                                    </i></span>
                                        </div>
                                        <input type="text" class="form-control" 
                                        name="nombre" value="{{ old('nombre',$materia->nombre) }}"
                                         placeholder="Escriba aquí el nombre de lamateria..." required>
                                    </div>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                                <!---codigo-->
                                <div class="form-group">
                                    <label for="">Codigo de la materia</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-barcode"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="codigo" value="{{ old('codigo',$materia->codigo) }}" 
                                        placeholder="Escriba aquí coidgo..." required>
                                    </div>
                                    @error('codigo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                                <hr>

                               <!--botones actuallizar--->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <button type="submit" class="btn btn-success">Actualizar materias</button>
                                    <a href="{{url('/admin/materias')}}" class="btn btn-secundary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
