@extends('layouts.main')
@section('title', 'Pagina principal')

@section('content')
{{-- href="/excluir/{{$livro->id_livro}}" --}}
<script>
    function confirmDelete(delUrl) {
        if (confirm("Deseja apagar o livro? Não é possivel recuperar.")) {
            document.location = delUrl;
        }  
    }
</script>

    <div class="container">
         <!-- NOTIFICACAO DE EDIÇÃO -->
         <?php
         if(isset($erro)){ 
            if($erro == 0){ ?> 
                <!-- MENSAGEM DE CONTA CRIADA-->
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Livro editado com sucesso!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <!-- MENSAGEM DE CONTA NÃO CRIADA-->
            <?php }else{ ?>
                <div class="alert alert-danger alert-dismissible fade show " role="alert" style="margin-top: -50px!important;margin-bottom: 50px!important;">
                    <strong>Não foi possível editar o livro.</strong> Tente novamente mais tarde.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
        } ?>


        <div class="row">
            <div class="col-4">
                <div class="div-img-livro-selecionado">
                    <img src="{{ $livro->img_livro }}" class="img-livro-selecionado">
                </div>
            </div>
            <div class="col-8 col-info-livro">
                <h1 class="nome-livro-lido">{{  $livro->nome_livro  }}</h1>
                <p>{{  $livro->descricao_livro  }}</p>
                           
           
                
                <div class="row row-livro-lido">
                    <div class="col">
                        <h3>Tempo lido: {{$livro->tempo_lido }}</h3>
                        <h3>Páginas Lidas: {{$livro->paginas_lidas}} / {{$livro->total_paginas}}</h3>
                        <h3>Terminou: {{$livro->lido}}</h3>
                    </div>
                    <div class="col col-livro-lido">
                        <a href="/editar/{{$livro->id_livro}}" class="btn btn-outline-primary">Editar</a>
                        <a onclick="confirmDelete('/excluir/{{$livro->id_livro}}')"   class="btn btn-outline-danger">Excluir</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection

