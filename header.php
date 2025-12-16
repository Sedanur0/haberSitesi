<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDN Haber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">SDN HABER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="index.php">Ana Sayfa</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?sayfa=kategori&id=1">Ekonomi</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?sayfa=kategori&id=2">Spor</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?sayfa=kategori&id=3">Teknoloji</a></li>
                    </ul>
                    <div class="d-flex">
                        <?php if (isset($_SESSION['kullanici_id'])): ?>
                        <span class="navbar-text me-3 text-white">
                             <?php echo $_SESSION['kullanici_adi']; ?>
                        </span>
        
                         <?php if($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'editor'): ?>
                             <a href="panel.php" class="btn btn-warning btn-sm me-2">Yönetim Paneli</a>
                        <?php endif; ?>

                         <a href="cikis.php" class="btn btn-outline-light btn-sm">Çıkış</a>
                         <?php else: ?>
                             <a href="login.php" class="btn btn-primary">Giriş Yap</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container my-4">