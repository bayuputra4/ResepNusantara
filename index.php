<?php
require_once __DIR__ . '/controllers/ResepController.php';
$app = new ResepController();
$app->index();
?>