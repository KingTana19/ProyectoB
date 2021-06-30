@extends('layouts.menu')
@section('content')
<main id="main">
    <section id="about" class="about">
        @include('cita.create')
        <div class="m-5">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id cita</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opción</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($lista as $cita)
                    <tr>
                        <td>{{$cita->id}}</td>
                        <td>{{$cita->fecha}}</td>
                        <td>{{$cita->hora}}</td>
                        <td>{{$cita->Usuario->name}}</td>
                        <td>{{$cita->Servicio->nombre}}</td>
                        <td>{{$cita->descripcion}}</td>
                        <td>{{$cita->Costo}}</td>
                        <td>{{$cita->estado}}</td>
                        <th>
                            <div class="row">
                                <a class="btn btn-primary ml-2 mr-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editar{{$cita->id}}" data-bs-whatever="@getbootstrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="modal fade" id="editar{{$cita->id}}" tabindex="-2"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar cita</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('cita.update',$cita->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('PUT') !!}
                                                <div class="row">
                                                <div class="form-group col-6">
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
                                                <div class="form-group col-6">
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
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>Fecha</label>
                                                    <input type="date" class="form-control" name="fecha" id="fecha"
                                                        value="{{old('fecha')}}" required>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        {{$errors->first('fecha')}}</span>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label class="form-label">Hora</label>
                                                    <input type="time" class="form-control" name="hora" id="hora"
                                                        value="{{old('hora')}}" min="10:00" max="20:00" required>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        {{$errors->first('hora')}}</span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>Costo</label>
                                                    <input type="number" class="form-control" name="Costo" id="Costo"
                                                        value="{{old('CostoCosto')}}" required>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        {{$errors->first('Costo')}}</span>
                                                </div>
                                                <div class="form-group col-4">
                                                    <label>Estado</label>
                                                    <select class="form-control @error('estado') is-invalid @enderror"
                                                        name="estado">
                                                        @if ($cita->id === $cita->estado)
                                                        <option value="{{$cita->id}}">{{$cita->estado}}</option>
                                                        @endif
                                                        <option value="Activo">Activo</option>
                                                        <option value="Inactivo">Inactivo</option>

                                                    </select>
                                                    @error('estado')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        {{$errors->first('estado')}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="" class="form-label">Descripción</label>
                                                <textarea required name="descripcion" id="descripcion" type="text"
                                                    class="form-control">{{old('descripcion')}}</textarea>
                                                <span class="invalid-feedback d-block" role="alert">
                                                    {{$errors->first('descripcion')}}</span>
                                            </div>
                                            <div class="py-4 col-12 d-md-flex center-content-md-end">
                                                <button type="submit"
                                                    class="btn btn-primary w-100">Actualizar</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="py-3 col-12 d-md-flex justify-content-md-end">
                <button class="btn btn-primary col-3" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Agregar</button>
            </div>
        </div>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

<script src="{{ asset('js/citas.js') }}"></script>
<script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

<script>
    $('#table').DataTable({
        dom: "B" +
            "<'row'<'col-sm-12 col-md-6 py-2'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i>Excel",
                "titleAttr": "Esportando a Excel",
                "className": "btn btn-success ml-1"
            },
            {
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i>Pdf",
                "titleAttr": "Esportando a PDF",
                "className": "btn btn-danger ml-1"
            },
            {
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i>CSV",
                "titleAttr": "Esportando a CSV",
                "className": "btn btn-secondary ml-1"
            },
            /* {
                "extend":"print",
                "text":"<i class='fas fa-file-csv'></i> Imprimir",
                "titleAttr":"Imprimir a Archivo",
                "className":"btn btn-primary ml-1"
            } */
        ]
    });

</script>
@endsection
