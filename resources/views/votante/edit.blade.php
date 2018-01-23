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
        	<h3>Editar Votante: {{$votante->nombre}} {{$votante->apellido}}</h3>
          	@if (count($errors)>0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach($errors->all() as $error)
            			<li>{{$error}}</li>
            			@endforeach
            		</ul>
            	</div>
          	@endif
          	{!!Form::model($votante, ['method'=>'PATCH','route'=>['votante.update',$votante->id]])!!}
          	{!!Form::token()!!}
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="estado">Tipo Votante</label>
                  <select name="estado" class="form-control">
                      @if($votante->estado==1)
                        <option value="1" selected>Votante</option>
                        <option value="2">Moto</option>
                        <option value="3">Vehiculo</option>
                        <option value="4">Rechazo</option>
                        <option value="5">Testigo</option>
                      @elseif($votante->estado==2)
                        <option value="1">Votante</option>
                        <option value="2" selected>Moto</option>
                        <option value="3">Vehiculo</option>
                        <option value="4">Rechazo</option>
                        <option value="5">Testigo</option>
                      @elseif($votante->estado==3)
                        <option value="1">Votante</option>
                        <option value="2">Moto</option>
                        <option value="3" selected>Vehiculo</option>
                        <option value="4">Rechazo</option>
                        <option value="5">Testigo</option>
                      @elseif($votante->estado==4)
                        <option value="1">Votante</option>
                        <option value="2">Moto</option>
                        <option value="3">Vehiculo</option>
                        <option value="4" selected>Rechazo</option>
                        <option value="5">Testigo</option>
                        @elseif($votante->estado==5)
                        <option value="1">Votante</option>
                        <option value="2">Moto</option>
                        <option value="3">Vehiculo</option>
                        <option value="4">Rechazo</option>
                        <option value="5" selected>Testigo</option>
                      @endif
                  </select> 
                </div>
                <div class="form-group">
                  <label for="id_lider">Lider</label>
                  <select name="id_lider" class="form-control">
                      @foreach($lideres as $lid)
                        @if($lid->id==$votante->id_lider)
                          <option value="{{ $lid->id }}" selected>{{ $lid->nombre }} {{ $lid->apellido }} - {{ $lid->cedula }}</option>
                        @else
                          <option value="{{ $lid->id }}">{{ $lid->nombre }} {{ $lid->apellido }} - {{ $lid->cedula }}</option>
                        @endif
                      @endforeach
                  </select> 
                </div>
            		<div class="form-group">
            			<label for="cedula">Cedula</label>
            			<input type="number" name="cedula" class="form-control" value="{{$votante->cedula}}" readonly>
            		</div>
            		<div class="form-group">
            			<label for="nombre">Nombre</label>
            			<input type="text" name="nombre" class="form-control" value="{{$votante->nombre}}" onkeydown="upperCaseF(this)">
            		</div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="apellido">Apellido</label>
            			<input type="text" name="apellido" class="form-control" value="{{$votante->apellido}}" onkeydown="upperCaseF(this)">
            		</div>
            		<div class="form-group">
                  <label for="id_barrio">Barrio</label>
                  <select name="id_barrio" class="form-control">
                      @foreach($barrios as $bar)
                        @if($bar->id==$votante->id_barrio)
                          <option value="{{ $bar->id }}" selected>
                            @if($bar->tipo==1)
                              {{ $bar->nombre }} - Barrio 
                            @elseif($bar->tipo==2)
                              {{ $bar->nombre }} - Corregimiento 
                            @elseif($bar->tipo==3)
                              {{ $bar->nombre }} - Vereda
                            @endif
                          </option>
                        @else
                          <option value="{{ $bar->id }}">
                            @if($bar->tipo==1)
                              {{ $bar->nombre }} - Barrio 
                            @elseif($bar->tipo==2)
                              {{ $bar->nombre }} - Corregimiento 
                            @elseif($bar->tipo==3)
                              {{ $bar->nombre }} - Vereda
                            @endif
                          </option>
                        @endif
                      @endforeach
                  </select> 
                </div>
                <div class="form-group">
                  <label for="id_puesto">Puesto</label>
                  <select name="id_puesto" class="form-control">
                      @foreach($puestos as $pue)
                        @if($pue->id==$votante->id_lider)
                          <option value="{{ $pue->id }}" selected>{{ $pue->nombrepuesto }}</option>
                        @else
                          <option value="{{ $pue->id }}">{{ $pue->nombrepuesto }}</option>
                        @endif
                      @endforeach
                  </select> 
                </div>
            		<div class="form-group">
            			<label for="telefono">Telefono</label>
            			<input type="text" name="telefono" class="form-control" value="{{$votante->telefono}}">
            		</div>
              </div>
              <div class="form-group">
                <input type="hidden" name="id_user" value="{{ Auth::id() }}" class="form-control">
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
    </section>
    <!-- /.content -->
@stop