@extends('layouts.menu')
@section('content')
<main id="main">
<h1>Bienvenido, Señor administrador</h1>
<form action="{{route('usuarios.update',$usuario->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="col-md-11 mx-auto bg-white p-3">
        <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">Nombre</label>
                <input id="name" name="name" type="text" class="form-control" value="{{$usuario->name}}">
            </div>

            <div class="mb-3 col-6">
                <label for="" class="form-label">Apellido</label>
                <input id="apellido" name="apellido" type="text" class="form-control" value="{{$usuario->apellido}}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="" class="form-label">Teléfono</label>
                <input id="telefono" name="telefono" type="text" class="form-control" value="{{$usuario->telefono}}">
            </div>
            <div class="mb-3 col-6">
                <label for="" class="form-label">Documento</label>
                <input id="documento" name="documento" type="text" class="form-control" value="{{$usuario->documento}}">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label class="form-label">Rol</label>
                <select class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
                    @if ($usuario->id === $usuario->rol)
                    <option value="{{$usuario->id}}">{{$usuario->rol}}</option>
                    @else
                    <option value="Usuario">Usuario</option>
                    {{-- <option value="Barbero">Barbero</option> --}}
                    <option value="Administrador">Adminitrador</option>
                    @endif
                </select>
                @error('rol')
                <span class="invalid-feedback d-block" role="alert">
                    {{$errors->first('rol')}}</span>
                @enderror
            </div>
            <div class="mb-3 col-6">
                <label for="" class="form-label">Correo</label>
                <input id="email" name="email" type="email" class="form-control"value="{{$usuario->email}}">
            </div>
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <select
                class="form-control @error('estado') is-invalid @enderror"
                name="estado">
                @if ($usuario->id === $usuario->estado)
                <option value="{{$usuario->id}}">{{$usuario->estado}}</option>
                @endif
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>

            </select>
            @error('estado')
            <span class="invalid-feedback d-block" role="alert">
                {{$errors->first('estado')}}</span>
            @enderror
        </div>
        <a href="/usuarios" class="btn btn-secondary" tabindex="4">Cancelar</a>

        <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');

</script>
@stop
