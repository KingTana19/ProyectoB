<div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva categoría</h5>
            </div>
            <div class="modal-body">

                <form id="formAgregar" action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-12">
                            <label>Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre"
                                value="{{old('nombre')}}">
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('nombre')}}</span>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type="button" id="btnAgregar" class="btn btn-primary" value="Agregar">
                </form>
            </div>
        </div>
    </div>
</div>
