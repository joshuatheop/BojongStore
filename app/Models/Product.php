<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'image',
        'shoppee', 'whatsapp', 'weight', 'type', 'packaging',
        'shelf_life', 'production', 'category_id', 'umkm_id', 'views', 'is_featured',
        'tags', 'seller',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

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

    /**
     * Get the display name for the seller/shop.
     * Prefers UMKM name if linked, falls back to seller text field.
     */
    public function getShopNameAttribute(): string
    {
        return $this->umkm?->name ?? $this->seller ?? 'UMKM Bojongsoang';
    }
}
