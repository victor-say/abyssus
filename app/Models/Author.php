<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'genero', 'main_Works', 'public_'
    ];

}
