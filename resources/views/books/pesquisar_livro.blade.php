@extends('layouts.main')
@section('title', 'Pagina principal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
            </div>

            @if ($_GET['livro'])
                @if (count($livros))
                    <h1 class="text-center titulo-livros">Livros com: "{{$_GET['livro']}}"</h1>
                @else
                <h1 class="text-center titulo-livros">Nenhum livro encontrado com: "{{$_GET['livro']}}"</h1>
                @endif
            @else
                <h1  class="text-center titulo-livros">Meus livros</h1>
            @endif

            @foreach ($livros as $livro)
                <div class="col col-livro">
                    <a href="/livro?id={{ $livro->id_livro }}">
                        <div class="livro" style="background-image:url('{{ $livro->img_livro }}');">
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
