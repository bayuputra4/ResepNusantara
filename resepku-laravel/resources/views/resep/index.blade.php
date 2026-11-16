<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Resep - ResepKu</title>
    <!-- Pakai CSS simpel biar tabelnya rapi -->
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #fde68a; }
        tr:nth-child(even) { background-color: #f9fafb; }
        .btn-tambah { padding: 10px; background: green; color: white; text-decoration: none; border-radius: 5px; display: inline-block; margin-bottom: 10px; }
        .btn-edit { color: blue; text-decoration: none; margin-right: 10px; }
        .btn-hapus { color: red; background: none; border: none; cursor: pointer; font-size: 16px; }
        .alert-success { padding: 10px; background-color: #d1fae5; color: #065f46; border: 1px solid #10b981; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <h1>Daftar Resep Rumahan (Laravel)</h1>

    <!-- Menampilkan pesan sukses setelah tambah/edit/hapus -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah -->
    <a href="{{ route('resep.create') }}" class="btn-tambah">+ Tambah Resep Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Resep</th>
                <th>Kategori</th>
                <th>Bahan Utama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reseps as $index => $resep)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $resep->judul }}</td>
                    <td>{{ $resep->kategori }}</td>
                    <td>{{ $resep->bahan }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <a href="{{ route('resep.edit', $resep->id) }}" class="btn-edit">Edit</a> | 
                        
                        <!-- Tombol Hapus (Harus pakai Form) -->
                        <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus" onclick="return confirm('Yakin mau hapus resep ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Belum ada data resep. Silakan tambah data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>