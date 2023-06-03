<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_livro', 
        'img_livro', 
        'lido',
        'total_paginas',
        'tempo_lido',
        'paginas_lidas',
        'descricao_livro'
    ];
}
