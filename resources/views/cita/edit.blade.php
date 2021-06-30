@extends('adminlte::page')

@section('title', 'InicioAdmin')

@section('content_header')
    <h1>Bienvenido, señor administrador</h1>
@stop

@section('content')

    <p  >Edite la cita</p>

<form action="/citas/{{$cita->id}}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label for="" class="form-label">Fecha</label>
<input id="fecha" name="fecha" type="text" class="form-control" value="{{$cita->fecha}}">
</div>

<div class="mb-3">
<label for="" class="form-label">Servicio</label>
<input id="servicio" name="servicio" type="text" class="form-control" value="{{$cita->servicio}}">
</div>

<div class="mb-3">
<label for="" class="form-label">Descripción</label>
<input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$cita->descripcion}}">
</div>

<div class="mb-3">
<label for="" class="form-label">Costo</label>
<input id="costo" name="costo" type="number" step="any" class="form-control" value="{{$cita->Costo}}">
</div>

<div class="mb-3">
    <label>Estado</label>
    <select
        class="form-control @error('estado') is-invalid @enderror"
        name="estado">
        @if ($item->id === $item->estado)
        <option value="{{$item->id}}">{{$item->estado}}</option>
        @endif
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>

    </select>
    @error('estado')
    <span class="invalid-feedback d-block" role="alert">
        {{$errors->first('estado')}}</span>
    @enderror
</div>


<a href="/productos" class="btn btn-secondary" tabindex="4">Cancelar</a>

<button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
