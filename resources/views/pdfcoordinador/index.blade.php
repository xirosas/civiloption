@extends('layouts.admin')
@section('contenido')
	  <section class="content-header">
      <h1>
        Administración de Coordinadores
        <small>Aquí se genera la lista imprimible de votantes por Coordinadores.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ url('/lider') }}">Coordinadores</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Coordinadores</h3>
          
          @include('pdfcoordinador.search')
          <a href="{{ URL::action('PdfCoordinadorController@totalVotantes',1) }}"><button class="btn btn-primary">Listar</button></a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>#</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>Telefono</th>
              </thead>
              @foreach($lideres as $result)
              
              <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->direccion }}</td>

              </tr>
              @endforeach
            </table>
          </div>
          {{ $lideres->appends(['searchText' => $searchText])->render() }}
        </div>
      </div>
    </section>
@stop