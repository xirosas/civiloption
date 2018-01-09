@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Votantes
        <small>Aquí podrá agregar, listar, modificar y eliminar una o varios Votantes a la Base de datos.</small>
      </h1>
      <p>Cantidad Ingresada - {{$contador}}</p>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Votantes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        	<h3>Nuevo Votante</h3>
        	@if (count($errors)>0)
        	<div class="alert alert-danger">
        		<ul>
        			@foreach($errors->all() as $error)
        			<li>{{$error}}</li>
        			@endforeach
        		</ul>
        	</div>
        	@endif

        	{!!Form::open(array('url'=>'votante','method'=>'POST','autocomplete'=>'off'))!!}
        	{!!Form::token()!!}
                <div class="form-group">
                    <label for="id_lider">Lider</label>
                    <select name="id_lider" class="form-group">
                        @foreach($lideres as $lid)
                            <option value="{{ $lid->id }}">{{ $lid->cedula }} - {{ $lid->nombre }} {{ $lid->apellido }}</option>
                        @endforeach
                    </select> 
                </div>
        		<div class="form-group">
        			<label for="cedula">Cedula</label>
        			<input type="number" name="cedula" class="form-control">
        		</div>
        		<div class="form-group">
        			<label for="nombre">Nombre</label>
        			<input type="text" name="nombre" class="form-control" placeholder="Nombre..." onkeydown="upperCaseF(this)">
        		</div>
        		<div class="form-group">
        			<label for="apellido">Apellido</label>
        			<input type="text" name="apellido" class="form-control" placeholder="Apellido..." onkeydown="upperCaseF(this)">
        		</div>
        		<div class="form-group">
        			<label for="direccion">Ubicacion</label>
        			<input type="text" name="ubicacion" class="form-control" placeholder="Ubicacion..." onkeydown="upperCaseF(this)">
        		</div>
        		<div class="form-group">
        			<label for="telefono">Telefono</label>
        			<input type="text" name="telefono" class="form-control" placeholder="Telefono..." onkeydown="upperCaseF(this)">
        		</div>
                <div class="form-group">
                    <label for="mesa">Mesa</label>
                    <input type="text" name="mesa" class="form-control" placeholder="Mesa..." onkeydown="upperCaseF(this)">
                </div>
                <div class="form-group">
                    <label for="puesto">Puesto</label>
                    <input type="text" name="puesto" class="form-control" placeholder="Puesto..." onkeydown="upperCaseF(this)">
                </div>
                <div class="form-group">
                    <input type="hidden" name="id_user" value="{{ Auth::id() }}" class="form-control">
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
