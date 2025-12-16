<?php
session_start(); 
require_once 'baglan.php';
require_once 'baglan.php'; 
include 'header.php';      

// urlden sayfanın paremetresini alır eğer almazsa anasayfa olur
$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 'anasayfa';

switch ($sayfa) {
    case 'anasayfa':
        include 'anasayfa.php';
        break;
    case 'detay':
        include 'detay.php'; 
        break;
    case 'kategori':
        include 'kategori.php'; 
        break;
    default:
        include 'anasayfa.php';
        break;
}

include 'footer.php';      
?>



