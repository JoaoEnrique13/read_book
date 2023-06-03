@extends('layouts.main')
@section('title', 'Pagina principal')

@section('content')
    <div class="container">



            <form class="form-cadastrar-livro" action="/update" method="post">
                @csrf
                <h1 class="text-center">Cadastre um Livro</h1>
                <input class="d-none" type="text" name="id_livro" id="id_livro" value="{{$livro->id_livro}}">
                <div class="mb-3">
                  <label for="nome_livro" class="form-label">Nome do Livro</label>
                  <input type="text" class="form-control @error('nome_livro') is-invalid @enderror" id="nome_livro" name="nome_livro" value="{{$livro->nome_livro}}">

                  @error('nome_livro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="mb-3 ">
                    <label data-label-image class="form-label">Capa do Livro
                        <input type="file" class="d-none" data-input-image id="img_livro" name="img_livro" value="{{$livro->img_livro}}">
                        <input class="d-none" id="img_livro" name="img_livro" type="text" value="{{$livro->img_livro}}">
                        <div class="img-escolher-capa" style="background-image: url('{{$livro->img_livro}}')">
                            <img data-image-preview height="300px" width="200px" class="img-escolher-capa">
                        </div>
                    </label>
                </div>

                <div class="mb-3 ">
                    <label for="lido" class="form-label">Terminou o Livro</label>
                    <input type="text" class="form-control" id="lido" name="lido" value="{{$livro->lido}}">
                </div>

                <div class="mb-3 ">
                    <label for="total_paginas" class="form-label">Total de Páginas</label>
                    <input type="text" class="form-control" id="total_paginas" name="total_paginas" value="{{$livro->total_paginas}}">
                </div>

                <div class="mb-3 ">
                    <label for="tempo_lido" class="form-label">Tempo lido</label>
                    <input type="text" class="form-control" id="tempo_lido" name="tempo_lido" value="{{$livro->tempo_lido}}">
                </div>

                <div class="mb-3 ">
                    <label for="paginas_lidas" class="form-label">Páginas Lidas</label>
                    <input type="text" class="form-control" id="paginas_lidas" name="paginas_lidas" value="{{$livro->paginas_lidas}}">
                </div>

                <div class="mb-3 ">
                    <label for="descricao_livro" class="form-label">Descrição do Livro</label>
                    <textarea class="form-control" id="descricao_livro" name="descricao_livro" rows="3">{{$livro->descricao_livro}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
    </div>
    <script src="js\preview_image.js"></script>
@endsection