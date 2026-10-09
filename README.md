# Bilişim Servis tasarım paketi

`site-guncelleme.zip`, gönderilen site kaynakları üzerinden hazırlanmış güncelleme paketidir. Fotoğraflı ana sayfa, mobil düzen ve 28 hizmet/ürün detay içeriği içerir. Fotoğraflar temsili görsellerdir.

Canlı siteye yükleme yapılmadı. Paket veritabanı yedeği, veritabanı bağlantı ayarları veya yönetim paneli dosyaları içermez.

Tam hosting yedeğinizi saklayın. Yükleme hedefi DirectAdmin'deki `/domains/bilisimservis.com/public_html/` klasörüdür. ZIP kökünde `app/`, `public/` ve `sitemap.php` bulunur. Yalnızca paketteki dosyalar değiştirilmelidir; diğer dosyaları silmeyin. Yükleme sonrasında ana sayfa, hizmet sayfaları, yönetim paneli, iletişim ve teklif akışlarını kontrol edin.

Yerel PHP 8.3 ve örnek SQLite veritabanıyla 29 hizmet bağlantısı (28 yeni içerik ve bir mevcut kayıt örneği), mevcut/pasif kayıt davranışı, SSS ve mobil menü kontrol edildi. Canlı MySQL, e-posta gönderimi ve hosting üzerinde çalıştırma doğrulanmadı.

## Üst menü ve hizmet temizliği

`menu-hizmet-duzenleme.zip` beş dosyalık ek güncellemedir. Üst marka/menü düzenini yeniler, banner üzerindeki dört etiketi bağlantı olmaktan çıkarır ve katalog dışındaki eski hizmetleri sayfalardan, ilgili hizmetlerden ve site haritasından kaldırır. Eski veritabanı kayıtları silinmez; katalogla aynı slug'a sahip aktif kayıtlar önceliğini korur. Yerel kontrollerde 28 katalog bağlantısı, eski kayıtların gizlenmesi ve banner etiketlerinin bağlantı içermemesi doğrulandı. Güncel ana sayfa görüntüsü `menu-onizleme.png` dosyasındadır. ZIP dosyalarının web dosyası izinleri 644, klasör izinleri 755 olarak hazırlanmıştır.
