<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Resep - ResepKu</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        input, textarea { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { padding: 10px 20px; background: green; color: white; border: none; cursor: pointer; }
        
        /* Style buat kotak error Laravel */
        .alert-error { background: #fee2e2; color: #dc2626; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #fca5a5; }
        .alert-error ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>
    <h1>Tambah Resep Baru</h1>
    
    <!-- KOTAK ERROR VALIDASI LARAVEL -->
    @if ($errors->any())
        <div class="alert-error">
            <strong>Ups! Ada kesalahan input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('resep.store') }}" method="POST">
        @csrf <!-- Wajib di Laravel untuk keamanan form -->
        
        <div class="form-group">
            <label>Judul Resep:</label>
            <!-- value="{{ old('judul') }}" berguna agar inputan tidak hilang saat error -->
            <input type="text" name="judul" value="{{ old('judul') }}">
        </div>
        
        <div class="form-group">
            <label>Kategori:</label>
            <input type="text" name="kategori" value="{{ old('kategori') }}">
        </div>
        
        <div class="form-group">
            <label>Bahan-bahan:</label>
            <!-- old() di textarea ditaruh di antara tag pembuka dan penutup -->
            <textarea name="bahan" rows="4">{{ old('bahan') }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Langkah Pembuatan:</label>
            <textarea name="langkah" rows="4">{{ old('langkah') }}</textarea>
        </div>
        
        <button type="submit">Simpan Resep</button>
        <a href="{{ route('resep.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
</body>
</html>