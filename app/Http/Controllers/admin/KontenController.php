<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Konten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        $sections = Konten::$sectionLabels;

        // Ensure all sections exist in DB
        foreach (array_keys($sections) as $key) {
            Konten::firstOrCreate(['section' => $key], [
                'headline'    => '',
                'subheadline' => '',
                'body'        => '',
            ]);
        }

        $activeSection = $request->query('section', 'banner_beranda');
        $konten        = Konten::where('section', $activeSection)->first();
        $allKonten     = Konten::all()->keyBy('section');

        return view('admin.konten.index', compact('sections', 'activeSection', 'konten', 'allKonten'));
    }

    public function update(Request $request, $section)
    {
        $data = $request->validate([
            'headline'    => 'nullable|string|max:500',
            'subheadline' => 'nullable|string|max:1000',
            'body'        => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $konten = Konten::firstOrCreate(['section' => $section]);

        if ($request->hasFile('image')) {
            if ($konten->image) {
                Storage::disk('public')->delete($konten->image);
            }
            $data['image'] = $request->file('image')->store('konten', 'public');
        }

        $konten->update($data);

        return back()->with('success', 'Konten berhasil diperbarui dan ditayangkan.');
    }
}
