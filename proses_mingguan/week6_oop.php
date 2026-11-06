<?php
// KODINGAN WEEK 6 (CLASS & OBJECT)
class Resep {
    public $judul;
    public $estimasi;
    public $tingkat;

    public function __construct($judul, $estimasi, $tingkat) {
        $this->judul = $judul;
        $this->estimasi = $estimasi;
        $this->tingkat = $tingkat;
    }

    public function getInfo() {
        return "⏱️ {$this->estimasi} | 🎯 {$this->tingkat}";
    }
}

// Bikin Object
$resep1 = new Resep("Nasi Goreng Spesial", "15 Menit", "Mudah");
$resep2 = new Resep("Orek Tempe Kecap", "15 Menit", "Mudah");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ResepKu - Week 6 (OOP)</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body style="padding: 2rem;">
    <h2>Latihan OOP (Week 6)</h2>
    <div class="resep-list" style="display: flex; gap: 1rem;">
        <div class="kartu-resep" style="border: 1px solid #ccc; padding: 1rem; border-radius: 8px;">
            <h3><?php echo $resep1->judul; ?></h3>
            <p><?php echo $resep1->getInfo(); ?></p>
        </div>
        <div class="kartu-resep" style="border: 1px solid #ccc; padding: 1rem; border-radius: 8px;">
            <h3><?php echo $resep2->judul; ?></h3>
            <p><?php echo $resep2->getInfo(); ?></p>
        </div>
    </div>
</body>
</html>