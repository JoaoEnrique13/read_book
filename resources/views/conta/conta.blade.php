@extends('layouts.main')

@section('content')
<div class="container">
             <!-- NOTIFICACAO DE EDIÇÃO -->
             <?php
             if(isset($erro)){ 
                if($erro == 0){ ?> 
                    <!-- MENSAGEM DE CONTA CRIADA-->
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                        <strong>Conta atualizada com sucesso!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
    
                <!-- MENSAGEM DE CONTA NÃO CRIADA-->
                <?php }else{ ?>
                    <div class="alert alert-danger alert-dismissible fade show " role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                        <strong>Não foi possível atualizar a conta.</strong> Tente novamente mais tarde.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php }
            } ?>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Minha Conta</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_user') }}">
                        @csrf
                        <input id="id" type="text" class="form-control d-none" name="id" value="{{ $user->id }}" required>
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control form-control-login @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control form-control-login @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" value="{{$user->password}}" type="password" class="form-control form-control-login @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" value="{{$user->password}}" type="password" class="form-control form-control-login" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-atualizar-conta btn-primary">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                        <a href="/logout">Sair</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
