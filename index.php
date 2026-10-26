<?php
// ============================================
// RESEPKU - WEEK 5 : PHP SERVER-SIDE
// ============================================

// Baca data dari resep.json
$jsonContent = file_get_contents("resep.json");
$dataJson = json_decode($jsonContent, true);
$daftarResep = $dataJson["resep"];

// FUNCTION: FORMAT TINGKAT
function formatTingkat($tingkat) {
    if ($tingkat === "Mudah") return "🟢 Mudah";
    elseif ($tingkat === "Sedang") return "🟡 Sedang";
    else return "🔴 Sulit";
}

// FUNCTION: HITUNG TOTAL RESEP
function hitungTotalResep($resep) {
    return count($resep);
}

// AMBIL KATEGORI UNIK
$kategoriUnik = array_unique(array_column($daftarResep, "kategori"));

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResepKu - Inspirasi Masakan Rumahan Indonesia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="images/logo-resepku.png" alt="ResepKu" class="logo-img" style="height: 50px; width: auto; max-height: 50px;">
            </a>
        </div>
        
        <button class="menu-toggle" id="menu-toggle">☰</button>

        <nav id="navbar">
            <ul>
                <li><a href="#hero">Beranda</a></li>
                <li><a href="#kategori">Kategori</a></li>
                <li><a href="#resep-populer">Daftar Resep</a></li>
                <li><a href="#tentang">Tentang</a></li>
            </ul>
        </nav>
    </header>

    <!-- MAIN -->
    <main>
        
        <!-- HERO -->
        <section id="hero">
            <div class="hero-content">
                <h2>Masak Apa Hari Ini?</h2>
                <p>Resep rumahan simpel untuk anak kos, ibu muda, dan pemula. Bahan gampang, ada di warung!</p>
            </div>
        </section>

        <!-- KATEGORI -->
        <section id="kategori">
            <h2>Jelajahi Kategori</h2>
            <div class="kategori-list">
                <?php foreach ($kategoriUnik as $kat): ?>
                    <article class="kategori-card">
                        <span class="kategori-icon">
                            <?php 
                                if ($kat === "sarapan") echo "🍳";
                                elseif ($kat === "makan-siang") echo "🍚";
                                elseif ($kat === "camilan") echo "🍢";
                                elseif ($kat === "minuman") echo "🥤";
                                else echo "🍽️";
                            ?>
                        </span>
                        <h3><?php echo ucfirst(str_replace("-", " ", $kat)); ?></h3>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- DAFTAR RESEP -->
        <section id="resep-populer">
            <h2>Daftar Resep Rumahan (<?php echo hitungTotalResep($daftarResep); ?> Resep)</h2>
            <div class="resep-list">
                
                <?php foreach ($daftarResep as $resep): ?>
                    <article class="kartu-resep">
                        <div class="kartu-emoji"><?php echo $resep['gambar']; ?></div>
                        <h3><?php echo $resep['judul']; ?></h3>
                        <p>⏱️ <?php echo $resep['estimasi']; ?> | <?php echo formatTingkat($resep['tingkat']); ?> | 🍽️ <?php echo $resep['porsi']; ?></p>
                        <p>🥕 <?php echo implode(", ", array_slice($resep['bahan'], 0, 3)); ?>...</p>
                        <a href="detail.php?id=<?php echo $resep['id']; ?>" class="btn-detail">Lihat Resep →</a>
                    </article>
                <?php endforeach; ?>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer id="tentang">
        <p>&copy; 2024 ResepKu. Dibuat untuk tugas Web Programming.</p>
        <div class="footer-links">
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kontak</a>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>