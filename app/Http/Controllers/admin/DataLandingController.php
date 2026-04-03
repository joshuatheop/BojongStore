<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Sambutan;
use App\Models\Admin\Info;
use Illuminate\Support\Facades\Storage;

class DataLandingController extends Controller
{
    public function index()
    {
        $sambutan = Sambutan::first();
        $infos = Info::latest()->get();
        return view('admin.datalandingpage', compact('sambutan', 'infos'));
    }

    public function update(Request $request)
    {
        $sambutan = Sambutan::first();

        $validated = $request->validate([
            'nama_kepala_desa' => 'nullable|string|max:255',
            'sambutan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($sambutan && $sambutan->foto && Storage::disk('public')->exists($sambutan->foto)) {
                Storage::disk('public')->delete($sambutan->foto);
            }

            $validated['foto'] = $request->file('foto')->store('sambutan', 'public');
        }

        if ($sambutan) {
            $sambutan->update($validated);
        } else {
            Sambutan::create($validated);
        }

        return redirect()->back()->with('success', 'Sambutan berhasil diperbarui.');
    }


    public function storeOrUpdateinfo(Request $request)
{
    $request->validate([
        'sekilas_info' => 'required|string',
    ]);

    if ($request->id) {
        $info = Info::findOrFail($request->id);
        $info->update(['sekilas_info' => $request->sekilas_info]);
        return redirect()->back()->with('success', 'Info berhasil diperbarui.');
    } else {
        Info::create(['sekilas_info' => $request->sekilas_info]);
        return redirect()->back()->with('success', 'Info berhasil ditambahkan.');
    }
}

public function destroyinfo($id)
{
    $info = Info::findOrFail($id);
    $info->delete();
    return redirect()->back()->with('success', 'Info berhasil dihapus.');
}
}
