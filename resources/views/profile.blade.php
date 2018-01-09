@extends('layouts.admin')

@section('contenido')

<div class="row">
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
</div>
<div class="row">
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
    <p></p>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="{{ asset(Storage::url(Auth::user()->avatar)) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>Perfil de {{ Auth::user()->name }}</h2>
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