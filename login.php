<?php
if (isset($_GET['durum']) && $_GET['durum'] == 'basarili') {
    echo "<div class='alert alert-success text-center m-3'>Kayıt başarılı! Şimdi giriş yapabilirsiniz.</div>";
}
session_start(); 
require_once 'baglan.php';

if (isset($_POST['giris_yap'])) {
    $email = $_POST['email'];
    $sifre = $_POST['sifre'];

    // kullaniciyi veri tabanında arar
    $sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE eposta = ? AND sifre = ?");
    $sorgu->execute([$email, $sifre]);
    $kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

    if ($kullanici) {
        // giriş başarılımı değilmi ona bakar
        $_SESSION['kullanici_id'] = $kullanici['id'];
        $_SESSION['kullanici_adi'] = $kullanici['kullanici_adi'];
        $_SESSION['rol'] = $kullanici['rol'];
        
        header("Location: index.php"); // anasayfaya yönlendirir
        exit;
    } else {
        $hata = "E-posta veya şifre hatalı!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-3">Giriş Yap</h3>
            <?php if(isset($hata)) echo "<div class='alert alert-danger'>$hata</div>"; ?>
            
            <form method="post">
                <div class="mb-3">
                    <label>E-posta Adresi</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Şifre</label>
                    <input type="password" name="sifre" class="form-control" required>
                </div>
                <button type="submit" name="giris_yap" class="btn btn-primary w-100">Giriş Yap</button>
            </form>
            <div class="mt-3 text-center">
                <p>Hesabın yok mu? <a href="kayit.php">Hemen Kayıt Ol</a></p>
                <a href="index.php">Ana Sayfaya Dön</a>
            </div>
        </div>
    </div>
</body>
</html>