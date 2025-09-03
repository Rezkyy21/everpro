<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class IklanController extends Controller
{
    /**
     * Menampilkan daftar semua iklan.
     */
    public function index()
    {
        $iklans = Iklan::all();
        return view('admin.iklan.index', compact('iklans'));
    }

    /**
     * Menampilkan formulir untuk membuat iklan baru.
     */
    public function create()
    {
        return view('admin.iklan.create');
    }

    /**
     * Menyimpan iklan yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
        ]);

        $path = '';
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('iklan', 'public');
        }

        Iklan::create([
            'judul' => $request->judul,
            'gambar' => basename($path),
            'link' => $request->link,
            'aktif' => true,
        ]);

        return redirect()->route('admin.iklan.index')->with('success', 'Iklan berhasil ditambahkan!');
    }

    /**
     * Menghapus iklan dari database.
     */
    public function destroy(Iklan $iklan)
    {
        // Hapus file gambar dari storage
        Storage::disk('public')->delete('iklan/' . $iklan->gambar);

        // Hapus data iklan dari database
        $iklan->delete();

        return redirect()->route('admin.iklan.index')->with('success', 'Iklan berhasil dihapus.');
    }
}
