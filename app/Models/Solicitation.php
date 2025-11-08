<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitation extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'ask_',
        'type_',
        'timetamp_'
    ];
}

