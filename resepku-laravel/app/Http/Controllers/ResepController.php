<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep; // Panggil Model Resep

class ResepController extends Controller
{
    // 1. READ (Menampilkan semua data)
    public function index()
    {
        $reseps = Resep::all();
        return view('resep.index', compact('reseps'));
    }

    // 2. FORM CREATE (Menampilkan halaman form tambah data)
    public function create()
    {
        return view('resep.create');
    }

    // 3. CREATE (Menyimpan data baru ke database)
    public function store(Request $request)
    {
        // Validasi input (Sesuai materi Week 10)
        $request->validate([
            'judul' => 'required|max:100',
            'kategori' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
        ]);

        // Simpan ke database
        Resep::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('resep.index')->with('success', 'Resep berhasil ditambahkan!');
    }

    // 4. FORM EDIT (Menampilkan form edit berdasarkan ID)
    public function edit($id)
    {
        $resep = Resep::findOrFail($id);
        return view('resep.edit', compact('resep'));
    }

    // 5. UPDATE (Menyimpan perubahan data ke database)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:100',
            'kategori' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
        ]);

        $resep = Resep::findOrFail($id);
        $resep->update($request->all());

        return redirect()->route('resep.index')->with('success', 'Resep berhasil diupdate!');
    }

    // 6. DELETE (Menghapus data)
    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();

        return redirect()->route('resep.index')->with('success', 'Resep berhasil dihapus!');
    }
}