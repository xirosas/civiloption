@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Lideres
        <small>Aquí podrá agregar, listar, modificar y eliminar una o varios Lideres a la Base de datos.</small>
      </h1>
      <p>Cantidad Ingresada - {{$contador}}</p>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ url('/lider') }}">Lideres</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Lideres       <a href="{{ url('/lider/create') }}"> <button class="btn btn-success">Nuevo</button></a></h3>
          
          @include('lider.search')
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Coordinador</th>
              </thead>
              @foreach($lideres as $result)
              <tr>
                <td>{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->direccion }}</td>
                <td>{{ $result->nomcoordinador }} {{ $result->apecoordinador }}</td>
                <td>
                    <a href="{{ URL::action('LiderController@edit',$result->id) }}"><button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{ $result->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                </td>
              </tr>
              @include('lider.modal')
              @endforeach
            </table>
          </div>
          {{ $lideres->render() }}
        </div>
      </div>
    </section>
    <!-- /.content -->
@stop