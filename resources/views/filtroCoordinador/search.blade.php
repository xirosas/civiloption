<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		{!! Form::open(array('url'=>'filtroCoordinador','method'=>'get','autocomplete'=>'off','role'=>'search')) !!}
		<div class="form-group">
			<div class="input-group">
				<select name="searchText" class="form-control">
					@foreach($coordinadores as $coor)
                          @if($coor->id==$lider->id_coordinador) 
                            <option value="{{ $coor->id }}" selected>{{ $coor->nombre }} {{ $coor->apellido }} - {{ $coor->cedula }}</option>
                          @else
                            <option value="{{ $coor->id }}">{{ $coor->nombre }} {{ $coor->apellido }} - {{ $coor->cedula }} - </option>
                          @endif
                        @endforeach
				</select>
				<div class="input-group-btn">
					<button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Buscar">Buscar</button>
				</div>
			</div>
		</div>
		{{Form::Close()}}
	</div>
</div>