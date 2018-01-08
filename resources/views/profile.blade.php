@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{ Storage::url($user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>Perfil de {{ $user->name }}</h2>
            <form enctype="multipart/form-data" action="{{ url('/profile') }}" method="POST">
                <label>Actualizar Imagen</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="pull-right btn btn-sm btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection