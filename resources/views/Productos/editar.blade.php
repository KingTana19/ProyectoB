@extends('adminlte::page')

@section('InicioAdmin')
@stop

@section('content')
<div>
    <form id="formActualizar" action="{{ route('productos.update',$editar->id) }}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" class="form-control-file" name="imagen" value="{{$editar->imagen}}" required>
        </div>
        <div class="row">

            <div class="form-group col-6">
                <label>Costo</label>
                <input type="number" class="form-control"  value="{{$editar->Costo}}" name="Costo"
                    required>
                <span class="invalid-feedback d-block" role="alert">{{$errors->first('Costo')}}</span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label>Nombre</label>
                <input type="text" class="form-control"  value="{{$editar->Nombre}}" name="Nombre"
                required>
                <span class="invalid-feedback d-block" role="alert">{{$errors->first('Nombre')}}</span>
            </div>

            <div class="form-group col-6">
                <label>Categoría</label>
                <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id"
                   >
                    <option value="">Seleccionar</option>
                    @foreach ($catego as $c)
                    <option value="{{$c->id}}" {{ old('categoria_id') == $c->id ? 'selected' : ''}}>
                        {{$c->nombre}}
                    </option>
                    @endforeach
                </select>
                @error('categoria_id')
                <span class="invalid-feedback d-block" role="alert">
                    {{$errors->first('categoria_id')}}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descripción</label>
            <textarea  name="Descripcion" id="Descripcion" type="text"
                class="form-control" required>{{$editar->Descripcion}}</textarea>
            <span class="invalid-feedback d-block" role="alert">
                {{$errors->first('Descripcion')}}</span>
        </div>
    </form>
</div>

@endsection
