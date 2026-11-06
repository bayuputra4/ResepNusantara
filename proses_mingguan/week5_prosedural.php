<?php
// KODINGAN WEEK 5 (SEBELUM MVC)
$jsonContent = file_get_contents(__DIR__ . '/../resep.json');
$dataJson = json_decode($jsonContent, true);
$daftarResep = $dataJson["resep"];

function formatTingkat($tingkat) {
    if ($tingkat === "Mudah") return "🟢 Mudah";
    elseif ($tingkat === "Sedang") return "🟡 Sedang";
    else return "🔴 Sulit";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ResepKu - Week 5 (Procedural)</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <main style="padding: 2rem;">
        <h2>Daftar Resep (Versi PHP Prosedural - Week 5)</h2>
        <div class="resep-list">
            <?php foreach ($daftarResep as $resep): ?>
                <article class="kartu-resep">
                    <div class="kartu-emoji"><?php echo $resep['gambar']; ?></div>
                    <h3><?php echo $resep['judul']; ?></h3>
                    <p>⏱️ <?php echo $resep['estimasi']; ?> | <?php echo formatTingkat($resep['tingkat']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>