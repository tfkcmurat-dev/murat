# Bilişim Servis tasarım paketi

`site-guncelleme.zip`, gönderilen site kaynakları üzerinden hazırlanmış güncelleme paketidir. Fotoğraflı ana sayfa, mobil düzen ve 28 hizmet/ürün detay içeriği içerir. Fotoğraflar temsili görsellerdir.

Canlı siteye yükleme yapılmadı. Paket veritabanı yedeği, veritabanı bağlantı ayarları veya yönetim paneli dosyaları içermez.

Tam hosting yedeğinizi saklayın. Yükleme hedefi DirectAdmin'deki `/domains/bilisimservis.com/public_html/` klasörüdür. ZIP kökünde `app/`, `public/` ve `sitemap.php` bulunur. Yalnızca paketteki dosyalar değiştirilmelidir; diğer dosyaları silmeyin. Yükleme sonrasında ana sayfa, hizmet sayfaları, yönetim paneli, iletişim ve teklif akışlarını kontrol edin.

Yerel PHP 8.3 ve örnek SQLite veritabanıyla 29 hizmet bağlantısı (28 yeni içerik ve bir mevcut kayıt örneği), mevcut/pasif kayıt davranışı, SSS ve mobil menü kontrol edildi. Canlı MySQL, e-posta gönderimi ve hosting üzerinde çalıştırma doğrulanmadı.
