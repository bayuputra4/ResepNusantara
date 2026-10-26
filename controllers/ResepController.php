<?php
require_once __DIR__ . '/../models/Resep.php';

class ResepController {
    public function index() {
        $daftarResep = Resep::getAll();
        require __DIR__ . '/../views/resep-view.php';
    }
}
?>