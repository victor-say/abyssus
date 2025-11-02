<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',     //nome
        'author',   //autor
        'pages',    //paginas
        'publisher',//editora
        'universe', //universo 
        'synopsis', //sinopse
        'genero',   //genero
        'public',   //publico alvo
    ];
}
