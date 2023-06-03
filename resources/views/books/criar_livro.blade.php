@extends('layouts.main')
@section('title', 'Pagina principal')

@section('content')
    <div class="container">
        {{-- {{$dados_livro}} --}}
        @if(!isset($dados_livro))
            <form class="form-cadastrar-livro" action="/create" method="post">
                @csrf
                <h1 class="text-center">Cadastre um Livro</h1>
                <div class="mb-3">
                    <label for="nome1" class="form-label">Nome do Livro</label>
                    <input type="text" class="form-control @error('nome1') is-invalid @enderror" id="nome1" name="nome1">

                    @error('nome1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        @endif
        
        @if(isset($dados_livro))
            <form class="form-cadastrar-livro" action="/createDois" method="post">
                @csrf
                <h1 class="text-center">Cadastre um Livro</h1>
                <div class="mb-3">
                  <label for="nome_livro" class="form-label">Nome do Livro</label>
                  <input type="text" class="form-control " disabled value="{{$book_name}}">
                  <input type="text" class="form-control d-none" id="nome_livro" name="nome_livro" value="{{$book_name}}">

                  @error('nome_livro')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                </div>
                @if($url_capa != "")
                    <div class="mb-3 ">
                        <label class="col-12 form-label">Capa do Livro</label>
                        <input type="text" class="d-none" id="img_livro" name="img_livro" value="{{$url_capa}}">
                        <img height="300px" width="200px" src="{{$url_capa}}" class="">
                    </div>
                @else
                    <div class="mb-3 ">
                        <label data-label-image class="form-label">Capa do Livro
                            <input type="file" class="d-none" data-input-image id="img_livro" name="img_livro" value="{{$url_capa}}">
                            <div class="img-escolher-capa">
                                Clique para escolher imagem
                                <img data-image-preview height="300px" width="200px" class="img-escolher-capa">
                            </div>
                        </label>
                    </div>
                @endif


                <input type="text" class="d-none form-control" id="pagina_total" name="pagina_total" value="{{$page_count}}">
                <div class="mb-3 ">
                    <label for="descricao" class="form-label">Descrição do Livro</label>
                    <textarea class="form-control @error('descricao_livro') is-invalid @enderror" id="descricao_livro" required name="descricao_livro" rows="3">{{$descricao}}</textarea>
                    @error('descricao_livro')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        @endif
    </div>
    <script src="js\preview_image.js"></script>
@endsection