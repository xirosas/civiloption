<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{!! Form::open(array('url'=>'votante','method'=>'get','autocomplete'=>'off','role'=>'search')) !!}
		<div class="form-group">
			<div class="input-group">
				<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}" aria-label="...">
				<div class="input-group-btn">
					<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Buscar por Nombre o Cedula">Buscar</button>
					<button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Imprimir"><span class="glyphicon glyphicon glyphicon-print" aria-hidden="true"></span></button>
					<button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Descargar"><span class="glyphicon glyphicon glyphicon-download-alt" aria-hidden="true"></span></button>
				</div>
			</div>
		</div>
		{{Form::Close()}}
	</div>
</div>