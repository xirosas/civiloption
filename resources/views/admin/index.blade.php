@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>VoteControl</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-android-contact"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Coordinadores</span>
              <span class="info-box-number">{{ $coordinador }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-android-contacts"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lideres</span>
              <span class="info-box-number">{{ $lider }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-people"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Votantes</span>
              <span class="info-box-number">{{ $votante }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Reporte Mensual de Ingresos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Ingresos: {{$votante+$lider+$coordinador}} | 01 Ene, 2018 - 30 Ene, 2018</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Metas Estadisticas</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Votantes Aceptados</span>
                    <span class="progress-number"><b>{{$votante}}</b>/{{$totalVotante}}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: {{ $porcentajeVotante }}"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Coordinadores</span>
                    <span class="progress-number"><b>{{ $coordinador}}</b>/{{ $coordinador}}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: "></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Lideres</span>
                    <span class="progress-number"><b>{{ $lider}}</b>/{{ $lider}}</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: "></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Total Municipal</span>
                    <span class="progress-number"><b>{{$votante+$lider+$coordinador}}</b>/189719</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width:{{ $porcentajeTotal }}"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                    <h5 class="description-header">$35,210.43</h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                    <h5 class="description-header">$10,390.90</h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block border-right">
                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                    <h5 class="description-header">$24,813.53</h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  <div class="description-block">
                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                    <h5 class="description-header">1200</h5>
                    <span class="description-text">GOAL COMPLETIONS</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          @foreach($usuarios as $usu)
            <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">{{ $usu->name }} {{ $usu->lastname }}</span>
                <span class="info-box-number">
                    
                </span>

                <div class="progress">
                  <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                      Desde 10 de Enero
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
          @endforeach
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@stop