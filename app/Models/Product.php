<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'image',
        'shoppee', 'whatsapp', 'weight', 'type', 'packaging',
        'shelf_life', 'production', 'category_id', 'views', 'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'slug');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeNotFeatured($query)
    {
        return $query->where('is_featured', false);
    }
}
