@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Testigos
        <small>Aquí podrá agregar, listar, modificar y eliminar una o varios Testigos a la Base de datos.</small>
      </h1>
      <p>Cantidad Ingresada - {{$contador}}</p>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Testigos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            	<h3>Nuevo Testigo</h3>
            	@if (count($errors)>0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach($errors->all() as $error)
            			<li>{{$error}}</li>
            			@endforeach
            		</ul>
            	</div>
            	@endif
                {!!Form::open(array('url'=>'testigo','method'=>'POST','autocomplete'=>'off'))!!}
                {!!Form::token()!!}
            	<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="number" name="cedula" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_coordinador">Coordinador</label>
                            <select name="id_coordinador" id="id_coordinador" class="form-control">
                                @foreach($coordinadores as $coor)
                                  <option value="{{ $coor->id }}" @if(old('id_coordinador') == $coor->id) {{ 'selected' }} @endif>
                                    {{ $coor->nombre }} {{ $coor->apellido }} - {{ $coor->cedula }}
                                  </option>
                                @endforeach
                            </select> 
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre..." onkeydown="upperCaseF(this)">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" placeholder="Apellido..." onkeydown="upperCaseF(this)">
                        </div>
                        <div class="form-group">
                          <label for="id_puesto">Puesto</label>
                          <select name="id_puesto" class="form-control">
                              @foreach($puestos as $pue)
                                <option value="{{ $pue->id }}">{{ $pue->nombrepuesto }}</option>
                              @endforeach
                          </select> 
                        </div>
                        <div class="form-group">
                          <label for="mesa">Mesa</label>
                          <input type="number" name="mesa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" class="form-control" placeholder="Telefono..." onkeydown="upperCaseF(this)">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="{{ Auth::id() }}" class="form-control">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="center-block">
                            <div class="form-group btn-group btn-group-lg" role="group" aria-label="...">
                                <button class="btn btn-primary" type="submit">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!} 
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop
