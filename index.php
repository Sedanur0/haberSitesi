<?php
session_start(); // Session başlatılıyor
require_once 'baglan.php';
require_once 'baglan.php'; // Veritabanını çağır
include 'header.php';      // Üst kısmı çağır

// URL'den 'sayfa' parametresini al, yoksa 'anasayfa' yap
$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 'anasayfa';

switch ($sayfa) {
    case 'anasayfa':
        include 'anasayfa.php';
        break;
    case 'detay':
        include 'detay.php'; // Artık detay sayfamız hazır
        break;
    case 'kategori':
        include 'kategori.php'; // Artık kategori sayfamız hazır
        break;
    default:
        include 'anasayfa.php';
        break;
}

include 'footer.php';      // Alt kısmı çağır
?>



