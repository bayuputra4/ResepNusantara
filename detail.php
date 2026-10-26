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
    <title><?php echo htmlspecialchars($resepDipilih['judul']); ?> - ResepKu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">
            <a href="index.php">
                <img src="images/logo-resepku.png" alt="ResepKu" class="logo-img" style="height: 52px; width: auto; max-height: 52px;">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">← Kembali ke Beranda</a></li>
            </ul>
        </nav>
    </header>

    <main class="detail-main">
        <article class="detail-card">
            
            <?php if (preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', $resepDipilih['gambar'])): ?>
                <div class="detail-gambar-wrap">
                    <img src="<?php echo htmlspecialchars($resepDipilih['gambar']); ?>" alt="<?php echo htmlspecialchars($resepDipilih['judul']); ?>" class="detail-img">
                    <span class="badge-kategori" style="position: absolute; top: 18px; left: 18px;"><?php echo htmlspecialchars($resepDipilih['kategori']); ?></span>
                </div>
            <?php else: ?>
                <div class="modal-emoji" style="font-size: 6rem; text-align: center; background: linear-gradient(135deg, #fff7ed, #fed7aa); padding: 2rem; border-radius: 18px; margin-bottom: 1.5rem;">
                    <?php echo $resepDipilih['gambar']; ?>
                </div>
            <?php endif; ?>

            <h1 class="detail-title"><?php echo htmlspecialchars($resepDipilih['judul']); ?></h1>
            <div class="detail-meta">
                <span class="detail-meta-item">⏱️ <?php echo htmlspecialchars($resepDipilih['estimasi']); ?></span>
                <span class="detail-meta-item">🎯 <?php echo htmlspecialchars($resepDipilih['tingkat']); ?></span>
                <span class="detail-meta-item">🍽️ <?php echo htmlspecialchars($resepDipilih['porsi']); ?></span>
            </div>

            <h3 class="detail-section-title">🥕 Bahan-bahan:</h3>
            <ul class="detail-ingredients">
                <?php foreach ($resepDipilih['bahan'] as $b): ?>
                    <li><?php echo htmlspecialchars($b); ?></li>
                <?php endforeach; ?>
            </ul>

            <h3 class="detail-section-title">👨‍🍳 Cara Membuat:</h3>
            <div class="detail-steps">
                <?php 
                    $langkahFormatted = str_replace('. ', ".<br><br>", htmlspecialchars($resepDipilih['langkah']));
                    echo $langkahFormatted;
                ?>
            </div>

        </article>
    </main>

    <footer>
        <p>&copy; 2024 ResepKu. Dibuat untuk tugas Web Programming.</p>
        <div class="footer-links">
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kontak</a>
        </div>
    </footer>

</body>
</html>
