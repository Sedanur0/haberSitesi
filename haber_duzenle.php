<?php
session_start();
require_once 'baglan.php';

// 1. Yetki Kontrolü (Sadece Admin ve Editörler)
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user') {
    header("Location: index.php");
    exit;
}

// 2. Düzenlenecek Haberin ID'sini Al
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// 3. Mevcut Bilgileri Çek (Formu doldurmak için)
$sorgu = $db->prepare("SELECT * FROM haberler WHERE id = ?");
$sorgu->execute([$id]);
$haber = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$haber) {
    header("Location: panel.php"); // Haber bulunamazsa panele dön
    exit;
}

// 4. Form Gönderildiğinde Güncelleme Yap
if (isset($_POST['guncelle'])) {
    $baslik = $_POST['baslik'];
    $ozet = $_POST['ozet'];
    $icerik = $_POST['icerik'];
    $kategori_id = $_POST['kategori_id'];
    $resim_url = $_POST['resim_url'];
    $manset = isset($_POST['manset']) ? 1 : 0;

    $guncelle = $db->prepare("UPDATE haberler SET baslik=?, ozet=?, icerik=?, resim_url=?, kategori_id=?, manset_mi=? WHERE id=?");
    $guncelle->execute([$baslik, $ozet, $icerik, $resim_url, $kategori_id, $manset, $id]);

    header("Location: panel.php"); // İşlem bitince panele dön
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Haber Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Haber Düzenle</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label>Başlık</label>
                        <input type="text" name="baslik" class="form-control" value="<?php echo $haber['baslik']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-select">
                            <option value="1" <?php echo ($haber['kategori_id'] == 1) ? 'selected' : ''; ?>>Ekonomi</option>
                            <option value="2" <?php echo ($haber['kategori_id'] == 2) ? 'selected' : ''; ?>>Spor</option>
                            <option value="3" <?php echo ($haber['kategori_id'] == 3) ? 'selected' : ''; ?>>Teknoloji</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Resim URL</label>
                        <input type="text" name="resim_url" class="form-control" value="<?php echo $haber['resim_url']; ?>">
                    </div>
                    <div class="mb-3">
                        <label>Özet</label>
                        <textarea name="ozet" class="form-control" rows="2" required><?php echo $haber['ozet']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>İçerik</label>
                        <textarea name="icerik" class="form-control" rows="10" required><?php echo $haber['icerik']; ?></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="manset" id="manset" <?php echo ($haber['manset_mi'] == 1) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="manset">Manşette Göster</label>
                    </div>
                    
                    <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
                    <a href="panel.php" class="btn btn-secondary">İptal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>