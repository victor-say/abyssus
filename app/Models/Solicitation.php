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
        'data_hora',
        'data_hora_up',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

