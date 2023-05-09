@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        {{ __('Iniciar Sesión') }}
                    </div>
                    <div class="">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email"
                                    class="form-label text-md-end fw-bold">{{ __('Nombre de usuario:') }}</label>

                                <div class="">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password"
                                    class="form-label text-md-end fw-bold">{{ __('Contraseña:') }}</label>

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Iniciar sesión') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection