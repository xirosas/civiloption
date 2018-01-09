@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Coordinador
        <small>Aquí podrá agregar, listar, modificar y eliminar una o varios Coordinadores a la Base de datos.</small>
      </h1>
      <p>Cantidad Ingresada - {{$contador}}</p>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Coordinadores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3>Editar Coordinador: {{$coordinador->nombre}} {{$coordinador->apellido}}</h3>
          	@if (count($errors)>0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach($errors->all() as $error)
            			<li>{{$error}}</li>
            			@endforeach
            		</ul>
            	</div>
          	@endif

          	{!!Form::model($coordinador, ['method'=>'PATCH','route'=>['coordinador.update',$coordinador->id]])!!}
          	{!!Form::token()!!}
          		<div class="form-group">
          			<label for="cedula">Cedula</label>
          			<input type="number" name="cedula" class="form-control" value="{{$coordinador->cedula}}">
          		</div>
          		<div class="form-group">
          			<label for="nombre">Nombre</label>
          			<input type="text" name="nombre" class="form-control" value="{{$coordinador->nombre}}" onkeydown="upperCaseF(this)">
          		</div>
          		<div class="form-group">
          			<label for="apellido">Apellido</label>
          			<input type="text" name="apellido" class="form-control" value="{{$coordinador->apellido}}" onkeydown="upperCaseF(this)">
          		</div>
          		<div class="form-group">
          			<label for="direccion">Direccion</label>
          			<input type="text" name="direccion" class="form-control" value="{{$coordinador->direccion}}" onkeydown="upperCaseF(this)">
          		</div>
          		<div class="form-group">
          			<label for="telefono">Telefono</label>
          			<input type="text" name="telefono" class="form-control" value="{{$coordinador->telefono}}">
          		</div>
              <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
              </div>
          	{!!Form::close()!!}
        </div>
	    </div>
    </section>
    <!-- /.content -->
@stop