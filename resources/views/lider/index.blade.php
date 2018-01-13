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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h3>Listado de Lideres       
            <span class="pull-right">
              <a href="{{ url('/lider/create') }}"> 
                <button class="btn btn-success"data-toggle="tooltip" data-placement="top" title="Crea un nuevo Lider">
                    Nuevo
                </button>
              </a>
            </span>
          </h3>
          @include('lider.search')
        </div>
      </div>
      <span class="pull-right">
        <div class="input-group">
          <div class="input-group-btn">
            <a href="" target="blank">
              <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Imprimir">
                <span class="glyphicon glyphicon glyphicon-print" aria-hidden="true"></span>
              </button>
            </a>
            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Descargar">
              <span class="glyphicon glyphicon glyphicon-download-alt" aria-hidden="true"></span>
            </button>
          </div>
        </div>
      </span>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <thead class="thead-dark">
                <th scope="col">Cedula <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Nombre <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Apellido <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Teléfono <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Dirección <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Coordinador <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th><i class="fa fa-cogs"></i></th>
              </thead>
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
                    <div class="btn-group btn-group-xs" role="group" aria-label="...">
                    <a href="{{ URL::action('LiderController@edit',$result->id) }}">
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