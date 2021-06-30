@extends('layouts.menu')
@section('content')
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
        <h1>{{auth::user()->name}}</h1>
        <p><span class="typed" data-typed-items="Barber shop, una barberia, para todos, los usuarios."></span></p>
    </div>
</section>
<script src="{{asset('static/js/main.js')}}">
</script>
@endsection
