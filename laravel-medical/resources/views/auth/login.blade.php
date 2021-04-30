@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-body rounded">
        <div class="row ">
            <div class="col-0 col-lg-6 position-relative">
                <img src="{{ asset('img/logoNegro.png') }}" alt="" id="logoLogin">
            </div>
            <div class="col-12 col-lg-6">
                <div class="text-end">
                    
                </div>
                <h2 class="fw-bold text-center pt-5 mb-5">Bienvenido</h2>
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>

                    <div class="my-3">
                        <span class="text-center d-block"><a href="#" title="">Recuperar Contraseña</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
