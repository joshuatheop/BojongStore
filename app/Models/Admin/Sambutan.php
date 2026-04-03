<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    protected $table = 'sambutan';

    protected $fillable = [
        'nama_kepala_desa',
        'sambutan',
        'foto',
    ];
}
