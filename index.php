<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDN Haber</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">**SDN HABER**</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="#">Ana Sayfa</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Ekonomi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Spor</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Teknoloji</a></li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Haber Ara..." aria-label="Search">
                        <button class="btn btn-outline-light me-2" type="submit">Ara</button>
                        <button class="btn btn-primary" type="button">Giriş</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-8">
                <div id="manşetCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img\gs.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block bg-dark opacity-75 p-2">
                                <h5>Galatasaray'da bir eksik daha! İlkay Gündoğan'ın ardından bir yıldız daha Göztepe maçında yok</h5>
                                <p>Süper Lig'de pazar günü Göztepe'yi konuk edecek olan Galatasaray'da İlkay Gündoğan'ın ardından bir yıldız daha zorlu mücadelede görev yapamayacak.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img\rafa.webp" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block bg-dark opacity-75 p-2">
                                <h5>Beşiktaş'tan Rafa Silva açıklaması: (D.O.M.S.) tespit edilmiştir</h5>
                                <p>Beşiktaş, Trendyol Süper Lig'de oynanan Konyaspor maçının ardından her iki alt baldır adalesinde sertlik ve ağrı hisseden Portekizli futbolcu Rafa Silva'da gecikmiş başlangıçlı kas ödemi tespit edildiğini duyurdu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mb-3 border-bottom pb-2">Son Dakika</h2>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="img\bay.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Galatasaray'dan Barış Alper Yılmaz açıklaması! "3 senedir..."</h5>
                                <p class="card-text">Son dakika Galatasaray haberleri: Galatasaray Sportif A.Ş. Başkan Vekili Abdullah Kavukcu, sezon başında adı NEOM SC ile anılan Barış Alper Yılmaz ile ilgili dikkat çeken ifadeler kullandı. İşte o sözler...<br> <br> <br> </p>
                                <a href="haber_detay.html" class="btn btn-sm btn-primary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <img src="img\osi.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Galatasaray’da Osimhen fırtınası! Mbappe ve Kane ile yarışıyor</h5>
                                <p class="card-text">Galatasaray’ın Nijeryalı yıldızı Victor Osimhen, Şampiyonlar Ligi’nde 145 dakikada attığı 3 golle krallık yarışında adından söz ettiriyor. Hücumdaki bitiriciliği kadar takım oyununa katkısıyla da alkış toplayan Osimhen, kısa sürede taraftarın gönlünde taht kurdu. İşte detaylar… </p>
                                <a href="haber_detay.html" class="btn btn-sm btn-primary">Devamını Oku</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="p-4 mb-4 bg-light rounded shadow-sm">
                    <h4>Popüler Haberler</h4>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#">Popüler Haber 1</a></li>
                        <li><a href="#">Popüler Haber 2</a></li>
                        <li><a href="#">Popüler Haber 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">Sedanur Değirmenci 24015221019</span>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fRVH30eR1XN8VwzT22gDMB66G8b2DqK6kE7yJgK1aT5k5GzT+mK2nKq7y" crossorigin="anonymous"></script>
</body>

</html>