<?php
session_start();
require_once 'baglan.php';

// yetki kontrolü
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user') {
    header("Location: index.php");
    exit;
}

// ıd kontrolü ve silme işlemi
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // veri tabanından sil
    $sil = $db->prepare("DELETE FROM haberler WHERE id = ?");
    $sil->execute([$id]);
}

// işlem bitince panele geri dön
header("Location: panel.php");
exit;
?>