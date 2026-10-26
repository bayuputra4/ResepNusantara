<?php
class Resep {
    public $id, $judul, $gambar, $kategori, $estimasi, $tingkat, $porsi, $bahan, $langkah;

    public static function getAll() {
        $jsonContent = file_get_contents(__DIR__ . '/../resep.json');
        $dataJson = json_decode($jsonContent, true);
        $daftarResep = [];

        foreach ($dataJson["resep"] as $data) {
            $resep = new Resep();
            $resep->id = $data['id'];
            $resep->judul = $data['judul'];
            $resep->gambar = $data['gambar'];
            $resep->kategori = $data['kategori'];
            $resep->estimasi = $data['estimasi'];
            $resep->tingkat = $data['tingkat'];
            $resep->porsi = $data['porsi'];
            $resep->bahan = $data['bahan'];
            $resep->langkah = $data['langkah'];
            $daftarResep[] = $resep;
        }
        return $daftarResep;
    }
}
?>