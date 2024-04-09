@extends('layouts.app')

@section('title', 'myMeds - Registro')

@section('content')
<div class="container" style="font-size: 1.75rem;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: rgba(19, 35, 47, 0.9);">
                <div class="card-header" style="color: white; font-size: 2.5rem; font-weight: 600; text-align: center">
                    {{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-solid fa-user"></i> {{
                                __('Nombre*') }}</label>

                            <div class=" col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" style="font-size: 16px;" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-regular fa-envelope"></i> {{
                                __('Email*')
                                }}</label>

                            <div class=" col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" style="font-size: 16px;" required
                                    autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-solid fa-mobile"></i> {{
                                __('Teléfono*')
                                }}</label>

                            <div class=" col-md-6">
                                <input id="phone_number" type="number"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" style="font-size: 16px;" required
                                    autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-solid fa-key"></i> {{
                                __('Contraseña*')
                                }}</label>

                            <div class=" col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    style="font-size: 16px;" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end"
                                style="color: rgba(255, 255, 255, 0.5);"><i class="fas fa-solid fa-key"></i> {{
                                __('Confirma
                                Contraseña*') }}</label>

                            <div class=" col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" style="font-size: 16px;" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary"
                                    style="font-size: 2rem; width: 50%; background: #1ab188; border: white; font-weight: 600">
                                    {{ __('Registro') }}
                                </button>
                                <br>
                                <a class="btn btn-link" style="font-size: 1.5rem" href="{{ route('login') }}">
                                    {{ __('Ya tengo una cuenta') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection