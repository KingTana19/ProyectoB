<div class="modal fade" id="editar{{$item->id}}" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar producto</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.update',$item->id) }}" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" class="form-control-file" name="imagen" value="{{$item->imagen}}" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Costo</label>
                            <input type="number" class="form-control" value="{{$item->Costo}}" name="Costo" required>
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('Costo')}}</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" value="{{$item->Nombre}}" name="Nombre" required>
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('Nombre')}}</span>
                        </div>

                        <div class="form-group col-6">
                            <label>Categoría</label>
                            <select class="form-control @error('categoria_id') is-invalid @enderror"
                                name="categoria_id">
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
                        <label for="" class="form-label" required>Descripción</label>
                        <textarea name="Descripcion" id="Descripcion" type="text"
                            class="form-control">{{$item->Descripcion}}</textarea>
                        <span class="invalid-feedback d-block" role="alert">
                            {{$errors->first('Descripcion')}}</span>
                    </div>
                    <div class="py-4 col-12 d-md-flex center-content-md-end">
                        <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
