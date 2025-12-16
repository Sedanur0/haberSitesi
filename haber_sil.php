<?php
session_start();
require_once 'baglan.php';

// 1. Yetki Kontrolü
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user') {
    header("Location: index.php");
    exit;
}

// 2. ID Kontrolü ve Silme İşlemi
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Veritabanından sil
    $sil = $db->prepare("DELETE FROM haberler WHERE id = ?");
    $sil->execute([$id]);
}

// 3. İşlem bitince panele geri dön
header("Location: panel.php");
exit;
?>