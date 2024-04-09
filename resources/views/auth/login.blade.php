@extends('layouts.app')

@section('title', 'myMeds - Login')

@section('content')
<div class="container" style="font-size: 1.75rem; margin-top: 5rem">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: rgba(19, 35, 47, 0.9);">
                <div class="card-header" style="color: white; font-size: 2.5rem; font-weight: 600; text-align: center">
                    {{ __('Iniciar
                    Sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-regular fa-envelope"></i> {{
                                __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" style="font-size: 16px;" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-solid fa-key"></i> {{
                                __('Contraseña')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    style="font-size: 16px;" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" style="color: rgba(255, 255, 255, 0.5);"
                                        for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"
                                    style="font-size: 2rem; width: 50%; background: #1ab188; border: white; font-weight: 600">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" style="font-size: 1.5rem"
                                    href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection