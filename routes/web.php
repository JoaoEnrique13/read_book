<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NavigationController::class, 'index'])->name('home');

//CASO O USUARIO ESTEJA LOGADO
Route::group(['middleware' => 'auth'], function () {
    Route::get('/livros', [LivroController::class, 'listarLivros'])->name("livros");
    Route::get('/livro', [LivroController::class, 'consultarLivro']);
    Route::get('/pesquisa', [LivroController::class, 'pesquisarLivro']);
    Route::get('/criar', [NavigationController::class, 'criarLivro']);
    Route::get('/editar/{id}', [LivroController::class, 'editar']);
    Route::get('/excluir/{id}', [LivroController::class, 'delete']);
    Route::get('/conta', [UserController::class, 'conta']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/update-user', [UserController::class, 'update'])->name('update_user');
    
    Route::get('/users', [UserController::class, 'listUser']);
    Route::get('/admins', [UserController::class, 'listAdmin']);

    
    Route::get('/delete/user/{id}', [UserController::class, 'deleteUser']);

    Route::post('/create', [LivroController::class, 'createLivro'])->name('create');
    Route::post('/createDois', [LivroController::class, 'createLivroDois']);
    Route::post('/update', [LivroController::class, 'update']);
});


//CASO O USUARIO NÃO ESTEJA LOGADO
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [NavigationController::class, 'login'])->name("login");
    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', [NavigationController::class, 'register'])->name("register");
    Route::post('/register', [UserController::class, 'store']);
});