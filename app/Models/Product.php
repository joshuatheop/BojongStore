<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'image', 'weight', 'type', 'packaging', 'shelf_life', 'producer'
    ];

    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function favorits()
    {
        return $this->hasMany(Favorit::class);
    }
}
