-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 17 Ara 2025, 19:38:13
-- Sunucu sürümü: 8.0.43
-- PHP Sürümü: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haber_sitesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

DROP TABLE IF EXISTS `haberler`;
CREATE TABLE IF NOT EXISTS `haberler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL,
  `ozet` text NOT NULL,
  `icerik` longtext NOT NULL,
  `resim_url` varchar(255) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `manset_mi` tinyint(1) DEFAULT '0',
  `yayin_tarihi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `baslik`, `ozet`, `icerik`, `resim_url`, `kategori_id`, `manset_mi`, `yayin_tarihi`) VALUES
(2, 'Beşiktaş\'tan Rafa Silva Açıklaması', 'Adale ağrısı tespit edildi.', 'Detaylı içerik...', 'img/rafa.webp', 2, 1, '2025-12-16 14:43:41'),
(3, 'Barış Alper Yılmaz Konuştu', 'Transfer iddialarına yanıt verdi.', 'SON DAKİKA | Barış Alper Yılmaz’dan Transfer Açıklaması: \"Avrupa Hayalim Var Ancak Tek Bir Şartla...\"\r\nGalatasaray’ın ve Milli Takım’ın yıldız ismi Barış Alper Yılmaz, hakkında çıkan transfer iddialarına son noktayı koydu. İngiltere Premier Lig devlerinin radarındaki genç oyuncu, Avrupa hedefini gizlemedi ancak ayrılık için \'kulüp menfaatini\' işaret etti.\r\n\r\n\"Premier Lig Neden Olmasın?\"\r\nFizik gücü ve süratiyle dikkat çeken Barış Alper, taraftarların kendisini İngiltere futboluna yakıştırması hakkında konuştu. Avrupa’da oynama isteğini dile getiren yıldız oyuncu şu ifadeleri kullandı:\r\n\r\n\"Ben de Avrupa\'da oynamak, kulübümü ve Türkiye\'yi orada temsil etmek istiyorum. Hızım ve oyun yapım nedeniyle taraftarlar İngiltere\'de (Premier Lig) oynayabileceğimi düşünüyor. İnşallah bir gün bu hayal gerçek olur.\"\r\n\r\nAyrılık İçin Tek Şart: \"Galatasaray\'ın Onayı\"\r\nMenajeri aracılığıyla gelen tekliflerle ilgilenmediğini ve tamamen saha içine odaklandığını belirten Yılmaz, transferin gerçekleşmesi için tek bir kırmızı çizgisi olduğunu vurguladı. Sarı-kırmızılı kulübe olan minnetini dile getiren oyuncu, \"Biz buralara Galatasaray sayesinde geldik. Bu transfer ancak kulübümün onayı ve menfaatleri doğrultusunda olur. Eğer şartlar oluşursa gereken yapılır, ancak şu an sözleşmem devam ediyor\" diyerek yönetime olan saygısını yineledi.', 'img/bay.jpeg', 2, 0, '2025-12-16 14:43:41'),
(4, 'Osimhen Fırtınası', 'Gol krallığında zirveye oynuyor.', 'GALATASARAY’DA OSIMHEN FIRTINASI ESİYOR: \"MASKELİ KRAL\" DURDURULAMIYOR!\r\nSarı-kırmızılı forma ile çıktığı her maçta fark yaratan Nijeryalı süper star, attığı goller ve hırsıyla RAMS Park’ı büyülemeye devam ediyor. Osimhen\'in performansı sadece Süper Lig\'i değil, Avrupa manşetlerini de süslüyor.\r\n\r\nİSTANBUL – Galatasaray’ın dünya çapındaki golcüsü Victor Osimhen, sarı-kırmızılı formayla adeta ikinci baharını yaşıyor. Sezon başından bu yana sergilediği performansla takımın hücum hattındaki en büyük silahı haline gelen Nijeryalı yıldız, son oynanan maçta yaptığı şovla \"Osimhen Fırtınası\"nın dinesiyeceğe benzemediğini kanıtladı.', 'img/osi.jpeg', 2, 0, '2025-12-16 14:43:41'),
(5, 'Bakan Şimşek\'ten asgari ücret, vergi ve kira açıklaması', 'VATANDAŞIN ALEYHİNE VERGİ OLMAYACAK', 'Vergi ve harçları yeniden değerleme oranında değil hedef enflasyona göre belirleneceğini söyleyen Bakan Şimşek, \"Özellikle son iki yılda kira ve eğitim enflasyonu, manşetin en az iki katı hızla arttı. Ancak önümüzdeki dönemde sosyal konut seferberliği, deprem konutlarının tamamlanmasıyla birlikte konut arzı artıyor ve kira artışını sınırlayacak. Ayrıca eğitime değer kural bazlı bir fiyatlama modelini yüce Meclisimiz kabul etti. Yine bütçe imkanları çerçevesinde 2026 için vergi ve harç güncellemelerini yeniden değerleme oranında değil, hedeflediğimiz enflasyon oranında belirleyeceğiz. Ancak şunun da altına çizmek istiyorum; gelir vergisi tarifesi gibi vatandaşlarımızın lehine olan vergi mevzuatındaki güncellemeleri daha yüksek olan, yani yüzde 25.5 olan yeniden değerleme oranında arttıracağız. Dolayısıyla kamunun fiyatlarını yüzde 16-19 arasında belirlerken, vatandaşın lehine olan hususlarda yeniden değerleme oranında uygulayacağız\" dedi.', 'img/bakan.webp', 1, 1, '2025-12-16 14:43:41'),
(6, 'Risk büyüyor. Yapay zekalı tarayıcılar bizi nasıl gözetliyor?', 'Yapay zeka tarayıcı eklentileri kullanıcıların sağlık kayıtları, banka bilgileri, sosyal güvenlik numaraları ve sosyal medya aktiviteleri gibi bilgilere erişebiliyor.', 'OpenAI, Opera, Perplexity ve diğerleri birbiri ardına yapay zekalı tarayıcı çıkararak yeni çağın Google Chrome’una ulaşmaya çalışıyor. Üstelik Google da boş durmuyor. O da Disco adlı bir başka yapay zekalı tarayıcı geliştiriyor.\r\n\r\nÖte yandan yapay zekalı tarayıcı furyasında kullanıcıların ne kadar güvende olduğu tartışmalı. Zira yakın tarihli bir araştırma, yapay zeka destekli tarayıcıların kullanıcı gizliliğini ciddi biçimde ihlal ettiğini ortaya koyuyor.', 'img/yapayzeka.webp', 3, 0, '2025-12-16 17:43:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`) VALUES
(1, 'Ekonomi'),
(2, 'Spor'),
(3, 'Teknoloji');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(50) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `rol` enum('admin','editor','user') DEFAULT 'user',
  `kayit_tarihi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `eposta`, `sifre`, `rol`, `kayit_tarihi`) VALUES
(1, 'sedanur', 'seda@mail.com', '123456', 'admin', '2025-12-16 14:43:41'),
(2, 'nazlı', 'nazli@mail.com', '1234', 'user', '2025-12-17 22:29:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `haber_id` int NOT NULL,
  `kullanici_id` int NOT NULL,
  `yorum_metni` text NOT NULL,
  `tarih` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `haber_id` (`haber_id`),
  KEY `kullanici_id` (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `haber_id`, `kullanici_id`, `yorum_metni`, `tarih`) VALUES
(1, 3, 1, 'gitmemesi takım için en iyisi olur\r\n', '2025-12-16 15:55:54'),
(4, 6, 2, 'korkutucu', '2025-12-17 22:33:23'),
(5, 6, 2, 'korkutucu', '2025-12-17 22:33:29'),
(6, 6, 2, ':))', '2025-12-17 22:34:37');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `haberler`
--
ALTER TABLE `haberler`
  ADD CONSTRAINT `haberler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`id`);

--
-- Tablo kısıtlamaları `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD CONSTRAINT `yorumlar_ibfk_1` FOREIGN KEY (`haber_id`) REFERENCES `haberler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yorumlar_ibfk_2` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
