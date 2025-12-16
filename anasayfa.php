<?php
// manşetler (Slider)
$mansetSorgu = $db->prepare("SELECT * FROM haberler WHERE manset_mi = 1 ORDER BY yayin_tarihi DESC LIMIT 5");
$mansetSorgu->execute();
$mansetler = $mansetSorgu->fetchAll(PDO::FETCH_ASSOC);

// karttaki haberler
$haberSorgu = $db->prepare("SELECT * FROM haberler WHERE manset_mi = 0 ORDER BY yayin_tarihi DESC LIMIT 6");
$haberSorgu->execute();
$haberler = $haberSorgu->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row">
    <div class="col-lg-8">
        <div id="manşetCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach($mansetler as $key => $manset): ?>
                    <div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
                        <img src="<?php echo $manset['resim_url']; ?>" class="d-block w-100" alt="<?php echo $manset['baslik']; ?>" style="height: 400px; object-fit: cover;">
                        <div class="carousel-caption d-none d-md-block bg-dark opacity-75 p-2">
                            <h5><?php echo $manset['baslik']; ?></h5>
                            <p><?php echo $manset['ozet']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#manşetCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#manşetCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>

        <h2 class="mb-3 border-bottom pb-2">Son Dakika</h2>
        <div class="row">
            <?php foreach($haberler as $haber): ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="<?php echo $haber['resim_url']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $haber['baslik']; ?></h5>
                        <p class="card-text"><?php echo substr($haber['ozet'], 0, 100) . '...'; ?></p>
                        <a href="index.php?sayfa=detay&id=<?php echo $haber['id']; ?>" class="btn btn-sm btn-primary">Devamını Oku</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="p-4 mb-4 bg-light rounded shadow-sm">
            <h4>Kategoriler</h4>
            <ul class="list-unstyled mb-0">
                <li><a href="index.php?sayfa=kategori&id=1">Ekonomi</a></li>
                <li><a href="index.php?sayfa=kategori&id=2">Spor</a></li>
                <li><a href="index.php?sayfa=kategori&id=3">Teknoloji</a></li>
            </ul>
        </div>
    </div>
</div>