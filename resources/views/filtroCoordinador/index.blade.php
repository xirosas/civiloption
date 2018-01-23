@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administración de Coordinador
        <small>Aquí podrá agregar, listar, modificar y eliminar una o varios Coordinadores a la Base de datos.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ url('/coordinador') }}">Coordinadores</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Coordinadores</h3>
          
          @include('filtroCoordinador.search')
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
              </thead>
              @foreach($lider as $result)
              <tr>
                <td>{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->direccion }}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@stop