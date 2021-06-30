@extends('layouts.menu')
@section('content')
<main id="main">
    <section id="about" class="about">
        @include('Productos.create')
        <div class="m-5">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th class="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opción</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($productos as $item)
                    <tr>
                        <th>{{$item->Codigo}}</th>
                        <th>{{$item->Nombre}}</th>
                        <th>
                            <img src="{{asset('static/img/Corte.jpg')}}"  height="100">
                        </th>
                        <th>{{$item->Descripcion}}</th>
                        <th>{{$item->Costo}}</th>
                        <th>{{$item->categoria->nombre}}</th>
                        <th>{{$item->estado}}</th>
                        <th>
                            <div class="row">
                                <a class="btn btn-primary ml-2 mr-2" type="button" data-bs-toggle="modal"
                                    data-bs-target="#editar{{$item->id}}" data-bs-whatever="@getbootstrap"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="modal fade" id="editar{{$item->id}}" tabindex="-2"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('productos.update',$item->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                {!! method_field('PUT') !!}
                                                <div class="form-group">
                                                    <label>Imagen</label>
                                                    <input type="file" class="form-control-file" name="imagen"
                                                        value="{{$item->imagen}}" required>
                                                    <span class="invalid-feedback d-block"
                                                        role="alert">{{$errors->first('imagen')}}</span>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" value="{{$item->Nombre}}"
                                                        name="Nombre" required>
                                                    <span class="invalid-feedback d-block"
                                                        role="alert">{{$errors->first('Nombre')}}</span>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6">
                                                        <label>Costo</label>
                                                        <input type="number" class="form-control"
                                                            value="{{$item->Costo}}" name="Costo" required>
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{$errors->first('Costo')}}</span>
                                                    </div>
                                                    <div class="form-group col-6">
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
                                                </div>
                                                <div class="row">

                                                    <div class="form-group col-6">
                                                        <label>Código</label>
                                                        <input type="number" name="Codigo" class="form-control
                                                    @error('Codigo') is-invalid @enderror" value="{{$item->Codigo}}"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label>Categoría</label>
                                                        <select
                                                            class="form-control @error('categoria_id') is-invalid @enderror"
                                                            name="categoria_id">
                                                            @if ($item->id === $item->categoria_id)
                                                            <option value="{{$item->id}}">{{$item->categoria_id}}
                                                            </option>
                                                            @endif

                                                            @foreach ($catego as $c)
                                                            <option value="{{$c->id}}"
                                                                {{ old('categoria_id') == $c->id ? 'selected' : ''}}>
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
                                                    <textarea name="Descripcion" id="Descripcion" type="text"
                                                        class="form-control" required>{{$item->Descripcion}}</textarea>
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        {{$errors->first('Descripcion')}}</span>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
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

<script>
    $("#btnAgregar").click(function () {

        Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Agregar producto',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#formAgregar").submit();
                Swal.fire(
                    '¡Agregado!',
                    'Producto Agregado correctamente.',
                    'success'
                )
            }
        })


    })



    $("#btnActualizar").click(function () {
        let form = $("#formActualizar");
        Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, editar producto',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#btnActualizar").submit();
                Swal.fire(
                    '¡Editado!',
                    'Producto editado correctamente.',
                    'success'
                )
            }
        })
    })


    function eliminar() {
        Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar categoria',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                $("#formEliminar").submit();
                Swal.fire(
                    '¡Eliminado!',
                    'Categoria eliminada correctamente.',
                    'success'
                )
            }
        })
    }


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
