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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h3>Listado de Votantes       <span class="pull-right"><a href="{{ url('/votante/create') }}"> <button class="btn btn-success"data-toggle="tooltip" data-placement="top" title="Crea un nuevo Votante">Nuevo</button></a></span></h3>
          
          @include('votante.search')
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
                <th scope="col">Puesto <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Lider <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th scope="col">Tipo <i class="fa fa-fw fa-sort pull-right"></i></th>
                <th><i class="fa fa-cogs"></i></th>
              </thead>
              @foreach($votantes as $result)
              <tr>
                <td scope="row">{{ $result->cedula }}</td>
                <td>{{ $result->nombre }}</td>
                <td>{{ $result->apellido }}</td>
                <td>{{ $result->telefono }}</td>
                <td>{{ $result->puesto }}</td>
                <td>{{ $result->nomlider }} {{ $result->apelider }}</td>
                  @if($result->estado==1)
                    <td style="background: green;">ACTIVO</td>
                  @elseif($result->estado==2)
                    <td style="background: yellow;">MOTO</td>
                  @elseif($result->estado==3)
                    <td style="background: blue;">VEHICULO</td>
                  @elseif($result->estado==4)
                    <td style="background: red;">RECHAZADO</td>
                  @elseif($result->estado==5)
                    <td style="background: purple;">TESTIGO</td>
                  @endif
                <td>
                  <div class="btn-group btn-group-xs" role="group" aria-label="...">
                    <a href="{{ URL::action('VotanteController@edit',$result->id) }}">
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
          {{ $votantes->appends(['searchText' => $searchText])->render() }}
        </div>
      </div>
    </section>
    <!-- /.content -->
@stop