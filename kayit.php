<?php
require_once 'baglan.php';

if (isset($_POST['kayit_ol'])) {
    $ad = $_POST['kullanici_adi'];
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    // epostayı kontrol eder
    $kontrol = $db->prepare("SELECT * FROM kullanicilar WHERE eposta = ?");
    $kontrol->execute([$email]);
    
    if ($kontrol->rowCount() > 0) {
        $hata = "Bu e-posta adresi zaten kayıtlı! Lütfen giriş yapın.";
    } else {
        // veri tabanına ekler user olarak
        $ekle = $db->prepare("INSERT INTO kullanicilar (kullanici_adi, eposta, sifre, rol) VALUES (?, ?, ?, 'user')");
        $basarili = $ekle->execute([$ad, $email, $sifre]);

        if ($basarili) {
            // giris sayfasına yönlendir
            header("Location: login.php?durum=basarili");
            exit;
        } else {
            $hata = "Bir hata oluştu, lütfen tekrar deneyin.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-3">Kayıt Ol</h3>
            
            <?php if(isset($hata)) echo "<div class='alert alert-danger'>$hata</div>"; ?>

            <form method="post">
                <div class="mb-3">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="kullanici_adi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>E-posta Adresi</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Şifre</label>
                    <input type="password" name="sifre" class="form-control" required>
                </div>
                <button type="submit" name="kayit_ol" class="btn btn-success w-100">Kayıt Ol</button>
            </form>
            
            <div class="mt-3 text-center">
                <p>Zaten hesabın var mı? <a href="login.php">Giriş Yap</a></p>
                <a href="index.php" class="text-decoration-none text-secondary">← Ana Sayfaya Dön</a>
            </div>
        </div>
    </div>
</body>
</html>