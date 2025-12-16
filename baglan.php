<?php
try {
    $host = 'localhost';
    $dbname = 'haber_sitesi';
    $username = 'root';
    $password = '12345678'; 

    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı Hatası: " . $e->getMessage());
}
?>