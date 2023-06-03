@extends('layouts.main')

@section('content')
    <div class="container container-login">
            <div class="col-7 col-left-register">
                <h1>Criar Conta</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mb-3">

                            <div class="col">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                                <input id="name" type="text" class="form-control form-control-login @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">

                            <div class="col">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                                <input id="email" type="email" class="form-control form-control-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                <input id="password" type="password" class="form-control form-control-login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">

                            <div class="col">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>
                                <input id="password-confirm" type="password" class="form-control form-control-login" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

      
                                <button type="submit" class="btn btn-register btn-primary">
                                    {{ __('Criar Conta') }}
                                </button>
                    </form>
                </div>
        <div class="col-5 col-right-register div-text-register">
            <h1>Bem Vindo</h1>
            <p>Faça login e acesse seus livros</p>
        </div>
    </div>
@endsection
