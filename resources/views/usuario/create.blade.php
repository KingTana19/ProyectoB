<div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingresar un nuevo usuario</h5>
            </div>
            <div class="modal-body">

                <form action="/usuarios" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Documento</label>
                            <input id="documento" name="documento" type="text" value="{{old('documento')}}"
                                class="form-control @error('documento') is-invalid @enderror" tabindex="2">
                            @error('documento')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('documento')}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Rol</label>
                            <select class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
                                <option value="">Seleccionar</option>
                                <option value="Usuario">Usuario</option>
                                {{-- <option value="Barbero">Barbero</option> --}}
                                <option value="Administrador">Adminitrador</option>
                            </select>
                            @error('rol')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('rol')}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Nombre</label>
                            <input id="name" name="name" type="text" value="{{old('name')}}"
                                class="form-control @error('name') is-invalid @enderror" tabindex="1">
                            @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('name')}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Apellido</label>
                            <input id="apellido" name="apellido" type="text" value="{{old('apellido')}}"
                                class="form-control @error('apellido') is-invalid @enderror" tabindex="1">
                            @error('apellido')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('apellido')}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Teléfono</label>
                            <input id="telefono" name="telefono" type="number" value="{{old('telefono')}}"
                                class="form-control @error('telefono') is-invalid @enderror">
                            @error('telefono')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('telefono')}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Correo</label>
                            <input id="email" name="email" type="email" value="{{old('email')}}"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('email')}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Contraseña</label>
                        <input id="password" name="password" type="password" value="{{old('password')}}"
                            class="form-control @error('password') is-invalid @enderror" tabindex="2">
                        @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            {{$errors->first('password')}}</span>
                        @enderror
                    </div>
                    
                    <a href="/usuarios" class="btn btn-secondary" tabindex="4">Cancelar</a>

                    <button type="submit" class="btn btn-primary" tabindex="5">Guardar</button>

                </form>
            </div>
        </div>
    </div>
</div>
