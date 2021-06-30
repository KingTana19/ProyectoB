@extends('layouts.mlogin')

@section('mlogin')
<section section class="login-block" >
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card ">
                <div class="card-header"><h2 class="text-center">Recuperar Contraseña</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Correo" class="form-control @error('email')  is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block btn-center">
                                    {{ __('Cambiar contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
