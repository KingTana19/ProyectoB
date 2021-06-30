<div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva categoría</h5>
            </div>
            <div class="modal-body">

                <form id="formAgregar" action="{{ route('servicios.store')}}" method="POST">
                    @csrf
                    <div class="form-group col-12">
                        <label for="">Imagen</label>
                        <input type="file" class="form-control-file @error('Imagen') is-invalid @enderror" name="imagen" id="imagen" required>
                        <span class="invalid-feedback d-block" role="alert">{{$errors->first('imagen')}}</span>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="col-form-label">Nombre</label>
                            <input type="text" class="form-control @error('Nombre') is-invalid @enderror" name="nombre" id="nombre"
                                value="{{old('nombre')}}" required>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('nombre')}}</span>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="col-form-label">Precio</label>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio"
                                value="{{old('precio')}}" required>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('precio')}}</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-12">
                            <label for="" class="form-label @error('Descripcion') is-invalid @enderror">Descripción</label>
                            <textarea name="descripcion" id="descripcion" type="text"
                                class="form-control" required>{{old('descripcion')}}</textarea>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('descripcion')}}</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type="button" id="btnAgregar" class="btn btn-primary" value="Agregar servicio">
                </form>
            </div>
        </div>
    </div>
</div>
