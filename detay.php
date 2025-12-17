<?php
// url'den id alır
$haber_id = isset($_GET['id']) ? $_GET['id'] : 0;

// haberi veri tabanından çeker
$sorgu = $db->prepare("SELECT * FROM haberler WHERE id = ?");
$sorgu->execute([$haber_id]);
$haber = $sorgu->fetch(PDO::FETCH_ASSOC);

if (!$haber) {
    echo "<div class='alert alert-danger'>Haber bulunamadı.</div>";
    exit; // haber yoksa kodun devamını çalıştırmaz
}

// yorum ekelemek 
if (isset($_POST['yorum_yap'])) {
    if (isset($_SESSION['kullanici_id'])) {
        $yorum = htmlspecialchars($_POST['yorum']); // Yorumu temizle
        $uye_id = $_SESSION['kullanici_id']; // Giriş yapanın ID'si
        
        $ekle = $db->prepare("INSERT INTO yorumlar (haber_id, kullanici_id, yorum_metni) VALUES (?, ?, ?)");
        
        $ekle->execute([$haber_id, $uye_id, $yorum]);
        
        echo "<div class='alert alert-success'>Yorumunuz başarıyla eklendi!</div>";
        
        
    } else {
        echo "<div class='alert alert-warning'>Yorum yapmak için giriş yapmalısınız.</div>";
    }
}

// habere ait yorumları çeker
$yorumSorgu = $db->prepare("SELECT y.*, k.kullanici_adi 
                            FROM yorumlar y 
                            JOIN kullanicilar k ON y.kullanici_id = k.id 
                            WHERE y.haber_id = ? ORDER BY y.tarih DESC");
$yorumSorgu->execute([$haber_id]);
$yorumlar = $yorumSorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-lg-8">
        <h1 class="mb-3"><?php echo $haber['baslik']; ?></h1>
        <img src="<?php echo $haber['resim_url']; ?>" class="img-fluid rounded mb-3 w-100" alt="Haber Resmi">
        <p class="text-muted"><small>Yayınlanma: <?php echo $haber['yayin_tarihi']; ?></small></p>
        <div class="fs-5">
            <?php echo nl2br($haber['icerik']); ?>
        </div>

        <hr class="my-5">

        <h3>Yorumlar</h3>
        
        <?php if (isset($_SESSION['kullanici_id'])): ?>
            <div class="card mb-4 bg-light">
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Yorumunuz:</label>
                            <textarea name="yorum" class="form-control" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="yorum_yap" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning">
                Yorum yapabilmek için lütfen <a href="login.php" class="alert-link">Giriş Yapın</a>.
            </div>
        <?php endif; ?>

        <?php foreach($yorumlar as $y): ?>
            <div class="card mb-3 border-0 shadow-sm">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">
                        <strong><?php echo $y['kullanici_adi']; ?></strong> 
                        <small>- <?php echo $y['tarih']; ?></small>
                    </h6>
                    <p class="card-text"><?php echo $y['yorum_metni']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        
        <?php if(count($yorumlar) == 0) echo "<p class='text-muted'>Henüz yorum yapılmamış. İlk yorumu sen yap!</p>"; ?>

    </div>

    <div class="col-lg-4">
        <div class="p-4 mb-4 bg-light rounded shadow-sm">
            <h4>Diğer Haberler</h4>
            <ul class="list-unstyled">
                <li><a href="index.php">Ana Sayfaya Dön</a></li>
            </ul>
        </div>
    </div>
</div>