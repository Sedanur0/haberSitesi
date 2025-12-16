<?php
// urlden katagori id alır, güvenlik için sayıya çevirir
// intval integer value
$kategori_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// kategori adini alir
$katSorgu = $db->prepare("SELECT kategori_adi FROM kategoriler WHERE id = ?");
$katSorgu->execute([$kategori_id]);
$kategori = $katSorgu->fetch(PDO::FETCH_ASSOC);

// kategori yoksa anasayfaya yönlenirir
if (!$kategori) {
    header("Location: index.php");
    exit;
}

// girilen kategoriye ait haberleri çeker
$haberSorgu = $db->prepare("SELECT * FROM haberler WHERE kategori_id = ? ORDER BY yayin_tarihi DESC");
$haberSorgu->execute([$kategori_id]);
$haberler = $haberSorgu->fetchAll(PDO::FETCH_ASSOC);
//pd0 - PHP Data Objects veri nesneleri
?>

<div class="row">
    <div class="col-lg-8">
        <h2 class="mb-4 border-bottom pb-2 border-primary">
            <?php echo $kategori['kategori_adi']; ?> Haberleri
        </h2>

        <div class="row">
            <?php if (count($haberler) > 0): ?>
                <?php foreach($haberler as $haber): ?>
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <img src="<?php echo $haber['resim_url']; ?>" class="card-img-top" alt="..." style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $haber['baslik']; ?></h5>
                            <p class="card-text text-muted small">
                                <i class="bi bi-calendar"></i> <?php echo date('d.m.Y', strtotime($haber['yayin_tarihi'])); ?>
                            </p>
                            <p class="card-text"><?php echo substr($haber['ozet'], 0, 90) . '...'; ?></p>
                            <a href="index.php?sayfa=detay&id=<?php echo $haber['id']; ?>" class="btn btn-sm btn-outline-primary">Haberi Oku</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-warning">
                    Bu kategoride henüz haber eklenmemiş.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="p-4 mb-4 bg-light rounded shadow-sm">
            <h4>Kategoriler</h4>
            <div class="list-group">
                <a href="index.php?sayfa=kategori&id=1" class="list-group-item list-group-item-action <?php echo ($kategori_id == 1) ? 'active' : ''; ?>">Ekonomi</a>
                <a href="index.php?sayfa=kategori&id=2" class="list-group-item list-group-item-action <?php echo ($kategori_id == 2) ? 'active' : ''; ?>">Spor</a>
                <a href="index.php?sayfa=kategori&id=3" class="list-group-item list-group-item-action <?php echo ($kategori_id == 3) ? 'active' : ''; ?>">Teknoloji</a>
            </div>
        </div>
    </div>
</div>