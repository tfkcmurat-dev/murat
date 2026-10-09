# Bilişim Servis tasarım paketi

`site-guncelleme.zip`, gönderilen site kaynakları üzerinden hazırlanmış güncelleme paketidir. Fotoğraflı ana sayfa, mobil düzen ve 28 hizmet/ürün detay içeriği içerir. Fotoğraflar temsili görsellerdir.

Canlı siteye yükleme yapılmadı. Paket veritabanı yedeği, veritabanı bağlantı ayarları veya yönetim paneli dosyaları içermez.

Tam hosting yedeğinizi saklayın. Yükleme hedefi DirectAdmin'deki `/domains/bilisimservis.com/public_html/` klasörüdür. ZIP kökünde `app/`, `public/` ve `sitemap.php` bulunur. Yalnızca paketteki dosyalar değiştirilmelidir; diğer dosyaları silmeyin. Yükleme sonrasında ana sayfa, hizmet sayfaları, yönetim paneli, iletişim ve teklif akışlarını kontrol edin.

Yerel PHP 8.3 ve örnek SQLite veritabanıyla 29 hizmet bağlantısı (28 yeni içerik ve bir mevcut kayıt örneği), mevcut/pasif kayıt davranışı, SSS ve mobil menü kontrol edildi. Canlı MySQL, e-posta gönderimi ve hosting üzerinde çalıştırma doğrulanmadı.

## Üst menü ve hizmet temizliği

`menu-hizmet-duzenleme.zip` beş dosyalık ek güncellemedir. Üst marka/menü düzenini yeniler, banner üzerindeki dört etiketi bağlantı olmaktan çıkarır ve katalog dışındaki eski hizmetleri sayfalardan, ilgili hizmetlerden ve site haritasından kaldırır. Eski veritabanı kayıtları silinmez; katalogla aynı slug'a sahip aktif kayıtlar önceliğini korur. Yerel kontrollerde 28 katalog bağlantısı, eski kayıtların gizlenmesi ve banner etiketlerinin bağlantı içermemesi doğrulandı. Güncel ana sayfa görüntüsü `menu-onizleme.png` dosyasındadır. ZIP dosyalarının web dosyası izinleri 644, klasör izinleri 755 olarak hazırlanmıştır.

## Logo güncellemesi

`logo-guncelleme.zip` üst bölümdeki simgeyi mavi dişli, lacivert ekran ve şimşek içeren şeffaf logoyla değiştirir. Bilişim Servis yazısı okunur metin olarak korunur. Üç dosya içerir: üst bölüm şablonu, stil dosyası ve logo görseli. `logo-onizleme.png` uygulanmış masaüstü görünümüdür. Görselin yüklenmesi, mobil genişlik ve PHP şablonunun sözdizimi kontrol edildi.

## Hakkımızda ve WhatsApp

`site-son-guncelleme.zip` tüm güncel düzenlemeleri tek pakette toplar: yeni logo/üst menü, eski hizmetlerin gizlenmesi, banner etiketlerinin bağlantılarının kaldırılması, yeni Hakkımızda sayfası ve tüm ortak alt bölümleri kullanan sayfalarda WhatsApp bağlantısı. Admin'deki Hakkımızda metni korunur. WhatsApp bağlantısı mevcut geçerli iletişim telefonuna gider; eksik/geçersiz telefon ayarı varsa sitede yayımlanmış 0554 863 48 70 numarası kullanılır. Bağlantı hazır mesajla WhatsApp'ı açar; ziyaretçi Gönder düğmesine basmalıdır. Otomatik mesaj gönderimi veya üçüncü taraf WhatsApp API'si yoktur. Hakkımızda, ana sayfa, hizmet listesi ve hizmet detayı için hedef numara ve hazır mesaj yerel ortamda kontrol edildi; mesaj gönderilmedi.

`eski-tasarima-don.zip` ilk gönderilen kaynaklardaki değişmiş dosyaları geri getirir. Tam hosting yedeğinin yerine geçmez. Eklenen görsel ve yardımcı dosyalar eski kod tarafından çağrılmaz. Son paketi yükledikten sonra ana sayfa, Hakkımızda, hizmetler ve WhatsApp düğmesini canlı ortamda kontrol edin; yükleme ZIP'ini web klasöründen kaldırın.
