@extends('layouts.main')
@section('title', 'Pagina principal')

@section('content')
    <div class="container">
        <h1  class="text-center titulo-livros">Meus livros</h1>
        <!-- NOTIFICACAO DE CADASTRO -->
        <?php
         if(isset($_GET['cad'])){ 
            if($_GET['cad'] == 'sucess'){ ?> 
                <!-- MENSAGEM DE CONTA CRIADA-->
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Livro Cadastrado!</strong> Confira todos os livros cadastrados.
                    <button onclick="window.location.href = '/livros'" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <!-- MENSAGEM DE CONTA NÃO CRIADA-->
            <?php }elseif($_GET['cad'] == 'danger'){ ?>
                <div class="alert alert-danger alert-dismissible fade show " role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Livro não Cadastrado!</strong> Não foi possível cadastrar um livro.
                    <button onclick="window.location.href = '/livros'" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
        } ?>



        <!-- NOTIFICACAO DE EXCLUSÃO -->
        <?php
         if(isset($_GET['exc'])){ 
            if($_GET['exc'] == 'sucess'){ ?> 
                <!-- MENSAGEM DE CONTA CRIADA-->
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Livro Excluido com sucesso!</strong>
                    <button onclick="window.location.href = '/livros'" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <!-- MENSAGEM DE CONTA NÃO CRIADA-->
            <?php }elseif($_GET['exc'] == 'danger'){ ?>
                <div class="alert alert-danger alert-dismissible fade show " role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Não foi possível excluir o livro.</strong> Tente novamente mais tarde.
                    <button onclick="window.location.href = '/livros'" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
        } ?>

        <div class="row">
            @if ($livros == "[]")
                <h1 class="text-center">Você não tem nenhum Livro Cadastrado</h1>
                <a class="btn btn-primary mt-5" href="/criar">Clique aqui para cadastrar</a>
            @else
                @foreach ($livros as $livro)
                    <div class="col col-livro">
                        <a href="/livro?id={{ $livro->id_livro }}">
                            <div class="livro" style="background-image:url('{{ $livro->img_livro }}');">
                            </div>
                        </a>
                    </div>
                @endforeach   
            @endif
        </div>
    </div>
@endsection