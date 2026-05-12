<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    use HasFactory;

    protected $fillable = ['section', 'headline', 'subheadline', 'image', 'body'];

    public static $sectionLabels = [
        'banner_beranda' => 'Banner Beranda',
        'tentang_kami'   => 'Tentang Kami',
        'info_kontak'    => 'Info Kontak',
    ];
}
