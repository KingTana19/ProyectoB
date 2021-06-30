@extends('layouts.menu')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="col-md-12 mx-auto bg-white p-3">
            <div class="row">
                @foreach ($pro as $item)
                <div class="col-sm-3 mr-0 py-2">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('static/img/Corte.jpg')}}"  width="100%" height="100%">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->Nombre}}</h5>
                            <p class="card-text">{{$item->Descripcion}}
                            </p>
                            <h6>Precio: $ {{$item->Costo}}</h6>
                            <p>Categoria: <strong>
                                {{$item->categoria->nombre}}
                            </strong></p>
                            {{-- <div style="align-content: center">
                                <a href="#" class="btn btn-primary">Agendar</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
    </section>
</main>
@endsection
