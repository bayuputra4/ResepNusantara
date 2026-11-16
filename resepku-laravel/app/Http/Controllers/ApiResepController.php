<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class ApiResepController extends Controller
{
    // 1. GET API (Menampilkan semua data dalam bentuk JSON - Status 200)
    public function index()
    {
        $reseps = Resep::all();
        return response()->json([
            'status' => 'success',
            'data' => $reseps
        ], 200); 
    }

    // 2. POST API (Menyimpan data baru - Status 201 Created)
    public function store(Request $request)
    {
        // Validasi (Status 422 jika gagal)
        $request->validate([
            'judul' => 'required|max:100',
            'kategori' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
        ]);

        $resep = Resep::create($request->all());
        return response()->json([
            'status' => 'success',
            'message' => 'Resep berhasil ditambahkan',
            'data' => $resep
        ], 201);
    }

    // 3. GET DETAIL API (Menampilkan 1 data - Status 200 / 404)
    public function show($id)
    {
        $resep = Resep::find($id);
        
        if (!$resep) {
            return response()->json(['message' => 'Resep tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $resep], 200);
    }

    // 4. UPDATE API (Mengubah data - Status 200)
    public function update(Request $request, $id)
    {
        $resep = Resep::find($id);
        
        if (!$resep) {
            return response()->json(['message' => 'Resep tidak ditemukan'], 404);
        }

        $request->validate([
            'judul' => 'required|max:100',
            'kategori' => 'required',
            'bahan' => 'required',
            'langkah' => 'required',
        ]);

        $resep->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Resep diupdate', 'data' => $resep], 200);
    }

    // 5. DELETE API (Menghapus data - Status 200)
    public function destroy($id)
    {
        $resep = Resep::find($id);
        
        if (!$resep) {
            return response()->json(['message' => 'Resep tidak ditemukan'], 404);
        }

        $resep->delete();
        return response()->json(['status' => 'success', 'message' => 'Resep dihapus'], 200);
    }
}