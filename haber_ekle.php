<?php
session_start();
require_once 'baglan.php';

// Yetki kontrolü
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user') {
    header("Location: index.php");
    exit;
}

// Form gönderildi mi?
if (isset($_POST['kaydet'])) {
    $baslik = $_POST['baslik'];
    $ozet = $_POST['ozet'];
    $icerik = $_POST['icerik'];
    $kategori_id = $_POST['kategori_id'];
    $resim_url = $_POST['resim_url']; // Basitlik için URL olarak alıyoruz
    $manset = isset($_POST['manset']) ? 1 : 0; // Checkbox işaretli mi?

    $ekle = $db->prepare("INSERT INTO haberler (baslik, ozet, icerik, resim_url, kategori_id, manset_mi) VALUES (?, ?, ?, ?, ?, ?)");
    $ekle->execute([$baslik, $ozet, $icerik, $resim_url, $kategori_id, $manset]);

    header("Location: panel.php"); // Panele geri dön
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Haber Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4>Yeni Haber Ekle</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-select">
                            <option value="1">Ekonomi</option>
                            <option value="2">Spor</option>
                            <option value="3">Teknoloji</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Resim URL (Örn: img/haber1.jpg)</label>
                        <input type="text" name="resim_url" class="form-control" value="img/varsayilan.jpg">
                    </div>
                    <div class="mb-3">
                        <label>Özet (Kısa Açıklama)</label>
                        <textarea name="ozet" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Haber İçeriği</label>
                        <textarea name="icerik" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="manset" id="manset">
                        <label class="form-check-label" for="manset">Manşette Göster (Slider)</label>
                    </div>
                    <button type="submit" name="kaydet" class="btn btn-success">Haberi Kaydet</button>
                    <a href="panel.php" class="btn btn-secondary">İptal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>