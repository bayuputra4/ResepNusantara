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
    </style>
</head>
<body>

    <h1>Daftar Resep Rumahan (Laravel)</h1>
    <a href="/resep/create" style="padding: 10px; background: green; color: white; text-decoration: none; border-radius: 5px;">+ Tambah Resep Baru</a>

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
                        <a href="#">Edit</a> | 
                        <a href="#">Hapus</a>
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