@extends('layouts.menu')
@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="container">
            <div class="col-md-11 mx-auto bg-white p-3">
                @include('Categorias.create')
                <div>
                    <table id="table" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Fecha Creación</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $categoria)
                            <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</th>
                                <td>{{$categoria->created_at}}</td>
                                <td>
                                    <div class="row">

                                        <a class="btn btn-primary mr-2" style="margin-left: 180px" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{$categoria->id}}"
                                            data-bs-whatever="@getbootstrap"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="currentColor" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>

                                        <div class="modal fade" id="exampleModal{{$categoria->id}}" tabindex="-2"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                    </div>
                                                    <div class="modal-body">
                                                        <h3>Actualizar categoria</h3>
                                                        <div class="col-md-10 mx-auto bg-white p-3">
                                                            <form id="formActualizar" action="{{ route('categorias.update',$categoria->id) }}" method="POST">
                                                                {!! csrf_field() !!}
                                                                {!! method_field('PUT') !!}
                                                                <div class="row">
                                                                    <div class="mb-3 col-12">

                                                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                                            name="nombre" id="nombre"
                                                                            placeholder="nombre categoria"
                                                                            value="{{$categoria->nombre}}" required>
                                                                        <span class="invalid-feedback d-block"
                                                                            role="alert">{{$errors->first('nombre')}}</span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="py-4 col-12 d-md-flex center-content-md-end">
                                                                    <input type="submit" id="btnActualizar" class="btn btn-primary col"
                                                                        value="Actualizar">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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
        </div>
    </section>

</main>
<script src="{{asset('static/js/main.js')}}">
</script>
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

    $("#btnAgregar").click(function(){

Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Agregar categoria',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                    $("#formAgregar").submit();
                    Swal.fire(
                        '¡Agregado!',
                        'Categoria Agregada correctamente.',
                        'success'
                    )
            }
        })
    })

    $("#btnActualizar").click(function(){
        let form = $("#formActualizar");
        Swal.fire({
            title: '¿Estás seguro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, editar categoria',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                    $("#formActualizar").submit();
                    Swal.fire(
                        '¡Editado!',
                        'Categoria editada correctamente.',
                        'success'
                    )
            }
        })
    })

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
        ]
    });

</script>
@endsection
