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
        <li class="active"><a href="{{ url('/testigo') }}">Testigos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h3>Listado de Testigos       <span class="pull-right"><a href="{{ url('/testigo/create') }}"> <button class="btn btn-success"data-toggle="tooltip" data-placement="top" title="Crea un nuevo testigo">Nuevo</button></a></span></h3>
          
          @include('testigo.search')
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead class="thead-dark">
                <th scope="col">Cedula <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Nombre <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Apellido <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Telefono <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Barrio <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Puesto <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Coordinador <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Mesa <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th><i class="fa fa-cogs"></i></th>
              </thead>
              @foreach($testigos as $result)
              <tr>
                <td scope="row">{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->nombarrio }}</td>
                <td>{{ $result->puesto }}</td>
                <td>{{ $result->nomcoor }} {{ $result->apecoor }}</td>
                <td>{{ $result->mesa }}</td>
                <td>
                  <div class="btn-group btn-group-xs" role="group" aria-label="...">
                    <a href="{{ URL::action('TestigoController@edit',$result->id) }}">
                      <button class="btn btn-info btn-xs btn-block"  data-toggle="tooltip" data-placement="top" title="Editar">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </button>
                    </a>
                    <a href="" data-target="#modal-delete-{{ $result->id }}" data-toggle="modal">
                      <button class="btn btn-danger btn-xs btn-block" data-toggle="tooltip" data-placement="top" title="Eliminar">
                        <i class="fa fa-trash-o" aria-hidden="true" ></i>
                      </button>
                    </a>
                  </div>
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