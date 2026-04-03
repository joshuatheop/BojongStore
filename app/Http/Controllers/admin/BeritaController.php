<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'cover' => 'required|image',
            'gambar.*' => 'image|nullable',
        ]);

        $coverPath = $request->file('cover')->store('berita/cover', 'public');

        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $gambarPaths[] = $gambar->store('berita/gambar', 'public');
            }
        }

        Berita::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'cover' => $coverPath,
            'gambar' => $gambarPaths,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'cover' => 'image|nullable',
            'gambar.*' => 'image|nullable',
        ]);

        if ($request->hasFile('cover')) {
            Storage::disk('public')->delete($berita->cover);
            $berita->cover = $request->file('cover')->store('berita/cover', 'public');
        }

        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $gambar) {
                $gambarPaths[] = $gambar->store('berita/gambar', 'public');
            }
            $berita->gambar = $gambarPaths;
        }

        $berita->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        Storage::disk('public')->delete($berita->cover);
        if ($berita->gambar) {
            foreach ($berita->gambar as $gambar) {
                Storage::disk('public')->delete($gambar);
            }
        }
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
