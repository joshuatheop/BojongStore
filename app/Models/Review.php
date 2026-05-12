<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name', 'umkm_name', 'reviewer_name', 'reviewer_initials',
        'is_verified', 'rating', 'content', 'product_image',
    ];

    protected $casts = ['is_verified' => 'boolean'];

    public function getStarsHtmlAttribute(): string
    {
        $filled = str_repeat('<i class="bx bxs-star text-yellow-400 text-sm"></i>', $this->rating);
        $empty  = str_repeat('<i class="bx bx-star text-yellow-200 text-sm"></i>', 5 - $this->rating);
        return $filled . $empty;
    }
}
