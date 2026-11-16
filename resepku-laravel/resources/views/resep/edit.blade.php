<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Resep - ResepKu</title>
    <style>body { font-family: sans-serif; padding: 20px; } input, textarea { width: 100%; padding: 10px; margin-bottom: 10px; } button { padding: 10px 20px; background: orange; color: white; border: none; cursor: pointer; }</style>
</head>
<body>
    <h1>Edit Resep: {{ $resep->judul }}</h1>
    
    <form action="{{ route('resep.update', $resep->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib di Laravel untuk proses Update -->
        
        <label>Judul Resep:</label>
        <input type="text" name="judul" value="{{ $resep->judul }}" required>
        
        <label>Kategori:</label>
        <input type="text" name="kategori" value="{{ $resep->kategori }}" required>
        
        <label>Bahan-bahan:</label>
        <textarea name="bahan" rows="4" required>{{ $resep->bahan }}</textarea>
        
        <label>Langkah Pembuatan:</label>
        <textarea name="langkah" rows="4" required>{{ $resep->langkah }}</textarea>
        
        <button type="submit">Update Resep</button>
        <a href="{{ route('resep.index') }}">Batal</a>
    </form>
</body>
</html>