@extends('layouts.menu')

@section('content')
<main id="main">
    <section id="about" class="about">
        <div class="col-md-12 mx-auto bg-white p-3">
            <div class="row">
                @foreach ($servi as $item)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('static/img/Barberia.jpg')}}" width="100%" height="100%"></td>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->nombre}}</h5>
                            <p class="card-text">{{$item->descripcion}}
                            </p>
                            <h6>Precio: $ {{$item->precio}}</h6>
                            <div style="align-content: center">
                                <button type="button" onclick="agendar({{ $item->id }})" class="btn btn-primary">Agendar</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="modal fade" id="exampleModal" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agendar una nueva cita</h5>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('cita.store')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Usuarios</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth::user()->name }}" readonly>
                                            <input class="form-control" name="usuario_id" id="usuario"
                                                value="{{ auth::user()->id }}" hidden>
                                            @error('usuario')
                                            <span class="invalid-feedback d-block" role="alert">
                                                {{$errors->first('usuario')}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label class="form-label">Servicio</label>
                                            <input type="text" class="form-control" name="servicioN" id="servicioN"
                                                value="{{ auth::user()->id }}" readonly>
                                            <input class="form-control" name="servicio_id" id="servicio"
                                                hidden>
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
                                            <select class="form-control" name="hora" id="hora" required>
                                                <option value="">seleccione</option>
                                            </select>
                                            <span class="invalid-feedback d-block" role="alert">
                                                {{$errors->first('hora')}}</span>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label class="col-form-label">Costo</label>
                                            <input type="number" class="form-control" name="Costo" id="Costo"
                                                value="{{old('CostoCosto')}}" readonly>
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




            </div>
    </section>
</main>

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

<script>

    $(function(){
        $("#fecha").attr("min",  new moment().add(1, 'd').format('YYYY-MM-DD'))

        let c = 10;
        let s = "";
        let i = '00';

        while(c < 20){
            s += `<option>${c + ":" + i}</option>`
            i = i == "30" ? "00" : '30';
            c += i == 0 ? 1 : 0
        }

        $("#hora").html(s)
        })

        function agendar(id){
            $.ajax({ url: '/cita/consultar', data: { keyword: id}, dataType: 'json', }).done(function(ser){
                $("#Costo").val(ser.precio)
                $("#servicioN").val(ser.nombre)
                $("#servicio").val(ser.id)
                $("#exampleModal").modal('show')
            })
    }


</script>
@endsection


