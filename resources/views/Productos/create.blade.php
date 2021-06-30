<div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo producto</h5>
            </div>
            <div class="modal-body">

                <form id="formAgregar" action="{{ route('productos.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="">Imagen</label>
                            <input type="file" class="form-control-file" name="imagen" id="imagen"
                                value="{{old('imagen')}}" accept="image/*">
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('imagen')}}</span>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Código</label>
                            <input id="Codigo" name="Codigo" type="number" value="{{old('Codigo')}}" required
                                class="form-control" tabindex="1">
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('Codigo')}}</span>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Costo</label>
                            <input id="Costo" name="Costo" type="number" value="{{old('Costo')}}" step="any"
                                class="form-control" tabindex="3" required>
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('Costo')}}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Nombre</label>
                            <input id="Nombre" name="Nombre" value="{{old('Nombre')}}" type="text"
                                class="form-control" tabindex="1" required>
                            <span class="invalid-feedback d-block" role="alert">{{$errors->first('Nombre')}}</span>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label">Categoría</label>
                            <select class="form-control @error('categoria_id') is-invalid @enderror"
                                name="categoria_id" id="categoria_id">
                                <option value="">Seleccionar</option>
                                @foreach ($catego as $CATEGORIA)
                                <option value="{{$CATEGORIA->id}}"
                                    {{ old('categoria_id') == $CATEGORIA->id ? 'selected' : ''}}>
                                    {{$CATEGORIA->nombre}}
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
                        <textarea id="Descripcion" name="Descripcion" type="text" class="form-control"
                            cols="8" required>{{old('Descripcion')}}</textarea>
                        <span class="invalid-feedback d-block" role="alert">
                            {{$errors->first('Descripcion')}}</span>
                    </div>

                    <a href="/productos" class="btn btn-secondary" tabindex="4">Cancelar</a>

                    <button type="button" id="btnAgregar" class="btn btn-primary">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
