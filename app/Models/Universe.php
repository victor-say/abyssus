<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universe extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'author', 'personagens','books','conceitos'
    ];
}

