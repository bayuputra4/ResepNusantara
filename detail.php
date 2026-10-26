<?php
// Baca data dari JSON
$jsonContent = file_get_contents("resep.json");
$dataJson = json_decode($jsonContent, true);
$daftarResep = $dataJson["resep"];

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

// Cari resep berdasarkan ID
$resepDipilih = null;
foreach ($daftarResep as $r) {
    if ($r['id'] === $id) {
        $resepDipilih = $r;
        break;
    }
}

// Kalau tidak ketemu
if (!$resepDipilih) {
    $resepDipilih = $daftarResep[0];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $resepDipilih['judul']; ?> - ResepKu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">
            <a href="index.php">
                <img src="images/logo-resepku.png" alt="ResepKu" class="logo-img" style="height: 50px; width: auto; max-height: 50px;">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">← Kembali</a></li>
            </ul>
        </nav>
    </header>

    <main style="max-width: 800px; margin: 2rem auto; padding: 0 2rem;">
        <article style="background: white; padding: 2rem; border-radius: 16px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
            
            <div class="modal-emoji" style="font-size: 8rem; text-align: center; background: linear-gradient(135deg, #fef3c7, #fde68a); padding: 2rem; border-radius: 12px; margin-bottom: 1.5rem;">
                <?php echo $resepDipilih['gambar']; ?>
            </div>

            <h1 style="color: #1f2937; margin-bottom: 0.5rem;"><?php echo $resepDipilih['judul']; ?></h1>
            <p style="color: #6b7280; margin-bottom: 1.5rem;">
                ⏱️ <?php echo $resepDipilih['estimasi']; ?> | 
                🎯 <?php echo $resepDipilih['tingkat']; ?> | 
                🍽️ <?php echo $resepDipilih['porsi']; ?>
            </p>

            <h3 style="color: #d97706; margin-bottom: 0.5rem;">🥕 Bahan-bahan:</h3>
            <ul style="padding-left: 1.5rem; color: #4b5563; margin-bottom: 1.5rem;">
                <?php foreach ($resepDipilih['bahan'] as $b): ?>
                    <li><?php echo $b; ?></li>
                <?php endforeach; ?>
            </ul>

            <h3 style="color: #d97706; margin-bottom: 0.5rem;">👨‍🍳 Cara Membuat:</h3>
            <p style="color: #4b5563; line-height: 1.7;"><?php echo $resepDipilih['langkah']; ?></p>

        </article>
    </main>

    <footer>
        <p>&copy; 2024 ResepKu. Dibuat untuk tugas Web Programming.</p>
    </footer>

</body>
</html>