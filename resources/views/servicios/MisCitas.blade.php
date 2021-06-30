@extends('layouts.menu')
@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="col-md-11 mx-auto bg-white p-3">

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

                    </tr>
                    @endforeach
                </tbody>
            </table>
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
