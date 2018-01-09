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
        <li class="active"><a href="{{ url('/votante') }}">Votantes</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Votantes       <a href="{{ url('/votante/create') }}"> <button class="btn btn-success">Nuevo</button></a></h3>
          
          @include('votante.search')
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
                <th>Votacion</th>
                <th>Lider</th>
                <th>Usuario</th>
              </thead>
              @foreach($votantes as $result)
              <tr>
                <td>{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->ubicacion }} - {{ $result->puesto }} - {{ $result->mesa }}</td>
                <td>{{ $result->nomlider }} {{ $result->apelider }}</td>
                <td>{{ $result->nomusuario }} {{ $result->apeusuario }}</td>
                <td>
                    <a href="{{ URL::action('VotanteController@edit',$result->id) }}"><button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{ $result->id }}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                </td>
              </tr>
              @include('votante.modal')
              @endforeach
            </table>
          </div>
          {{ $votantes->render() }}
        </div>
      </div>
    </section>
    <!-- /.content -->
@stop