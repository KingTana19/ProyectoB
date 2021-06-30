<div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva cita</h5>
            </div>
            <div class="modal-body">

                <form action="{{ route('cita.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label">Usuarios</label>
                            <select class="form-control @error('usuario') is-invalid @enderror"
                                name="usuario_id" id="usuario_id" required>
                                <option value="">Seleccionar</option>
                                @foreach ($usuarios as $user)
                                <option value="{{$user->id}}"
                                    {{ old('name') == $user->id ? 'selected' : ''}}>
                                    {{$user->name}} ({{ $user->email  }})
                                </option>
                                @endforeach
                            </select>
                            @error('usuario')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('usuario')}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label class="form-label">Servicio</label>
                            <select class="form-control @error('servicio') is-invalid @enderror"
                                name="servicio_id" id="servicio_id" required>
                                <option value="">Seleccionar</option>
                                @foreach ($servicios as $ser)
                                <option value="{{$ser->id}}"
                                    {{ old('nombre') == $ser->id ? 'selected' : ''}}>
                                    {{$ser->nombre}}
                                </option>
                                @endforeach
                            </select>
                            @error('servicio')
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('servicio')}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label class="col-form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha"
                                value="{{old('fecha')}}" required>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('fecha')}}</span>
                        </div>
                        <div class="mb-3 col-6">
                            <label class="col-form-label">Hora</label>
                            <input type="time" class="form-control" name="hora" id="hora"
                                value="{{old('hora')}}" min="10:00" max="20:00" required>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('hora')}}</span>
                        </div>
                        <div class="mb-3 col-12">
                            <label class="col-form-label">Costo</label>
                            <input type="number" class="form-control" name="Costo" id="Costo"
                                value="{{old('CostoCosto')}}" required>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('Costo')}}</span>
                        </div>
                        <div class="form-group col-12">
                            <label for="" class="form-label">Descripción</label>
                            <textarea required name="descripcion" id="descripcion" type="text"
                                class="form-control">{{old('descripcion')}}</textarea>
                            <span class="invalid-feedback d-block" role="alert">
                                {{$errors->first('descripcion')}}</span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Agendar cita">
                </form>
            </div>
        </div>
    </div>
</div>


