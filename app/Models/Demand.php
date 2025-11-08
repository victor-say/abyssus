<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name_asks_',
        'book_asks_',
        'date_asks',
        
    ];
}
