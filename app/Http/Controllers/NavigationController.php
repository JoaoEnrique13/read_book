<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class NavigationController extends Controller
{
    public function index(){
        $livros = Livro::all();

        if(auth()->check()){
            return redirect("livros");
        }
        return view("index");
        
    }

    public function login(){
        return view("conta.login");
    }

    public function register(){
        return view("conta.register");
    }

    public function criarLivro(){
        return view("books.criar_livro");
    }
}
