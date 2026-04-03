<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Berita;
use App\Models\Admin\Info;
use App\Models\Admin\Sambutan;

class LandingController extends Controller
{
    public function landing()
    {
        // Ambil semua berita terbaru
        $kontens = Berita::latest()->take(5)->get();

        // Siapkan data slide dari gambar berita
        $slides = $kontens->map(function ($konten) {
            // Jika gambar masih string, ubah ke array
            $gambarTambahan = is_string($konten->gambar)
                ? json_decode($konten->gambar, true)
                : $konten->gambar;

            // Pastikan array valid
            $gambarTambahan = is_array($gambarTambahan) ? $gambarTambahan : [];

            // Ambil gambar pertama dari array, atau fallback ke cover
            $gambarUtama = $gambarTambahan[0] ?? $konten->cover;

            return [
                'title' => $konten->judul,
                'image' => asset('storage/' . $gambarUtama),
            ];
        });

        $sambutan = Sambutan::first();

        $infos = Info::latest()->get();

        return view('welcome', compact('kontens', 'slides', 'sambutan', 'infos'));
    }

    public function kondisiumum()
    {
        return view('kondisiumum');
    }

    public function kondisisosial()
    {
        return view('kondisisosial');
    }

    public function keadaanekonomi()
    {
        return view('keadaanekonomi');
    }

    public function kelembagaandesa()
    {
        return view('kelembagaandesa');
    }

    public function isustrategis()
    {
        return view('isustrategis');
    }

    public function program()
    {
        return view('program');
    }

    public function produkunggulan()
    {
        return view('produkunggulan');
    }

        public function katalog()
    {
        return view('katalog');
    }

    public function berita()
    {
        $kontens = Berita::latest()->paginate(6);

        return view('berita', compact('kontens'));
    }
    public function showberita($id)
    {
        $kontens = Berita::with('user')->findOrFail($id);

        // Tambah 1 ke jumlah dibaca
        $kontens->increment('dibaca');

        return view('berita.show', compact('kontens'));
    }

    public function sejarah()
    {
        return view('sejarah');
    }
}
