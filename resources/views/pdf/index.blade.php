@extends('layouts.admin')
@section('contenido')
	  <section class="content-header">
      <h1>
        Administración de Lideres
        <small>Aquí se genera la lista imprimible de votantes por lideres.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active"><a href="{{ url('/lider') }}">Lideres</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <h3>Listado de Lideres</h3>
          
          @include('pdf.search')
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
              @foreach($lideres as $result)
              
              <tr>
                <td>{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->direccion }}</td>
                <td>
                    <a href="{{ URL::action('PdfController@totalVotantes',$result->id) }}"><button class="btn btn-primary">Listar</button></a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
          {{ $lideres->appends(['searchText' => $searchText])->render() }}
        </div>
      </div>
    </section>
@stop