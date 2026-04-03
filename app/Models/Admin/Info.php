<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    protected $fillable = [
        'sekilas_info',
    ];
}
