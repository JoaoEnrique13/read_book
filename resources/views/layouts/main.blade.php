{{-- VERIFICA SE É ADMINISTRADOR OU NÃO --}}
@php
  $userController = new App\Http\Controllers\UserController();
  $isAdmin =  $userController->isAdmin();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="../img/estante_icon.png" type="image/x-icon">
    @vite([
            'resources/js/app.js',
            'resources/css/app.css',
            'node_modules/bootstrap/dist/css/bootstrap.min.css',
            'node_modules/bootstrap/dist/js/bootstrap.bundle.js'    
    	])
</head>
<body>
  
  <main>
      <nav class="navbar navbar-expand-lg navbar-dark bg-blue">
          <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="../img/estante_icon.png" height="50" class="log-menu"> Read Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @if (auth()->check()) {{-- CASO ESTEJA LOGADO--}}
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Livros
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/livros">Meus livros</a></li>
                    <li><a class="dropdown-item" href="/criar">Cadastrar livro</a></li>
                  </ul>
                </li>

                @if ($isAdmin)
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Gerenciar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/admins">Administradores</a></li>
                      <li><a class="dropdown-item" href="/users">Usuários</a></li>
                    </ul>
                  </li>
                @endif
                
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="/conta">Conta</a>
                </li>
                @endif
                
                {{-- <li class="nav-item">
                  <a class="nav-link" href="/criar">Criar</a>
                </li> --}}
              </ul>
              {{-- <form class="d-flex" method="GET" action="/pesquisa"> --}}
                  {{-- @csrf
                  <input class="form-control me-2" type="search" id="livro" name="livro" placeholder="Nome do Livro" aria-label="Search">
                  <button class="btn btn-outline-blue" type="submit">Pesquisar</button> --}}
                
                  @if (auth()->check()) {{-- CASO ESTEJA LOGADO--}}
                    <form class="d-flex" method="GET" action="/pesquisa"> 
                      @csrf
                      <input class="form-control me-2" type="search" id="livro" name="livro" placeholder="Nome do Livro" aria-label="Search">
                      <button class="btn btn-outline-blue" type="submit">Pesquisar</button>
                    </form>

                  @else{{-- CASO NÃO ESTEJA LOGADO--}}
                    <div class="d-flex">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="/register"><Button class="btn btn-criar-conta">Criar Conta</Button></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="/login"><Button class="btn btn-fazer-login">Fazer Login</Button></a>
                        </li>
                      </ul>
                    </div>
                  @endif
              {{-- </form> --}}
            </div>
          </div>
        </nav>
        @yield('content')
    </main>
    <script src="js/app.js"></script>
</body>
</html>