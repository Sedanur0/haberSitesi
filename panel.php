<?php
session_start();
require_once 'baglan.php';

// 1. Yetki Kontrolü: Giriş yapmamışsa veya yetkisi user ise anasayfaya at
if (!isset($_SESSION['rol']) || $_SESSION['rol'] == 'user') {
    header("Location: index.php");
    exit;
}

// 2. Haberleri Listele
$sorgu = $db->prepare("SELECT h.*, k.kategori_adi FROM haberler h LEFT JOIN kategoriler k ON h.kategori_id = k.id ORDER BY h.yayin_tarihi DESC");
$sorgu->execute();
$haberler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetim Paneli</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-dark bg-danger mb-4">
        <div class="container">
            <a class="navbar-brand" href="panel.php">YÖNETİM PANELİ</a>
            <div>
                <a href="index.php" class="btn btn-outline-light btn-sm">Siteye Dön</a>
                <a href="cikis.php" class="btn btn-outline-light btn-sm">Çıkış</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Haber Listesi</h2>
            <a href="haber_ekle.php" class="btn btn-success">+ Yeni Haber Ekle</a>
        </div>

        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Resim</th>
                    <th>Başlık</th>
                    <th>Kategori</th>
                    <th>Tarih</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($haberler as $haber): ?>
                <tr>
                    <td><?php echo $haber['id']; ?></td>
                    <td><img src="<?php echo $haber['resim_url']; ?>" width="50"></td>
                    <td><?php echo $haber['baslik']; ?></td>
                    <td><?php echo $haber['kategori_adi']; ?></td>
                    <td><?php echo date('d.m.Y', strtotime($haber['yayin_tarihi'])); ?></td>
                    <td>
                        <a href="haber_duzenle.php?id=<?php echo $haber['id']; ?>" class="btn btn-primary btn-sm">Düzenle</a>
                        <a href="haber_sil.php?id=<?php echo $haber['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bu haberi silmek istediğinize emin misiniz?')">Sil</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>