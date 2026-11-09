<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep; // Panggil Model Resep

class ResepController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel reseps
        $reseps = Resep::all(); 

        // Kirim data ke view 'resep.index'
        return view('resep.index', compact('reseps')); 
    }
}