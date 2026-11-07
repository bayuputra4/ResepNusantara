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
                <img src="images/logo-resepku.png" alt="ResepKu" class="logo-img" style="height: 60px; width: auto;">
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
        
        <!-- HERO & SEARCH -->
        <section id="hero">
            <div class="hero-content">
                <h2>Masak Apa Hari Ini?</h2>
                <p>Resep rumahan simpel untuk anak kos, ibu muda, dan pemula. Bahan gampang, ada di warung!</p>
                
                <form id="search-form" class="search-box">
                    <input type="text" id="search-input" placeholder="Cari resep atau bahan (misal: telur, tempe, mie...)" name="search">
                    <button type="submit" id="search-btn">Cari</button>
                </form>
            </div>
        </section>

        <!-- KATEGORI -->
        <section id="kategori">
            <h2>Jelajahi Kategori</h2>
            <div class="kategori-list" id="kategori-list">
                <article class="kategori-card" data-kategori="sarapan">
                    <span class="kategori-icon">🍳</span>
                    <h3>Sarapan</h3>
                </article>
                <article class="kategori-card" data-kategori="makan-siang">
                    <span class="kategori-icon">🍚</span>
                    <h3>Makan Siang</h3>
                </article>
                <article class="kategori-card" data-kategori="camilan">
                    <span class="kategori-icon">🍢</span>
                    <h3>Camilan</h3>
                </article>
                <article class="kategori-card" data-kategori="minuman">
                    <span class="kategori-icon">🥤</span>
                    <h3>Minuman</h3>
                </article>
            </div>
        </section>

        <!-- DAFTAR RESEP (DARI MVC) -->
        <section id="resep-populer">
            <h2>Daftar Resep Rumahan (Versi MVC)</h2>
            <div class="resep-list" id="resep-container">
                
                <?php foreach ($daftarResep as $resep): ?>
                    <article class="kartu-resep">
                        <?php if (preg_match('/\.(jpg|jpeg|png|webp|gif|svg)$/i', $resep->gambar)): ?>
                            <div class="kartu-gambar">
                                <img src="<?php echo htmlspecialchars($resep->gambar); ?>" alt="<?php echo htmlspecialchars($resep->judul); ?>" loading="lazy">
                                <span class="badge-kategori"><?php echo htmlspecialchars($resep->kategori); ?></span>
                            </div>
                        <?php else: ?>
                            <div class="kartu-emoji"><?php echo $resep->gambar; ?></div>
                        <?php endif; ?>
                        
                        <div class="kartu-body">
                            <h3><?php echo htmlspecialchars($resep->judul); ?></h3>
                            <div class="kartu-meta">
                                <span>⏱️ <?php echo htmlspecialchars($resep->estimasi); ?></span>
                                <span>🎯 <?php echo htmlspecialchars($resep->tingkat); ?></span>
                                <span>🍽️ <?php echo htmlspecialchars($resep->porsi); ?></span>
                            </div>
                            <p class="kartu-bahan">🥕 <strong>Bahan:</strong> <?php echo htmlspecialchars(implode(', ', array_slice($resep->bahan, 0, 3))); ?>...</p>
                            <a href="detail.php?id=<?php echo $resep->id; ?>" class="btn-detail" data-id="<?php echo $resep->id; ?>">Lihat Resep →</a>
                        </div>
                    </article>
                <?php endforeach; ?>

            </div>
        </section>

    </main>

    <!-- MODAL DETAIL -->
    <div class="modal-overlay" id="modal-overlay">
        <div class="modal-content">
            <button class="modal-close" id="modal-close">✕</button>
            <div class="modal-gambar" id="modal-gambar"></div>
            <h2 id="modal-judul">Judul Resep</h2>
            <p id="modal-info">Estimasi | Tingkat</p>
            <h3>🥕 Bahan-bahan:</h3>
            <ul id="modal-bahan"></ul>
            <h3>👨‍🍳 Cara Membuat:</h3>
            <p id="modal-langkah"></p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer id="tentang">
        <p>&copy; 2024 ResepKu. Dibuat untuk tugas Web Programming.</p>
        <div class="footer-links">
            <a href="#">Kebijakan Privasi</a>
            <a href="#">Syarat & Ketentuan</a>
            <a href="#">Kontak</a>
        </div>
    </footer>

    <!-- JANGAN LUPA MASUKIN SCRIPT JS -->
    <script src="script.js"></script>
</body>
</html>
