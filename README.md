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

## İstanbul odaklı Google / SEO çalışması

`google-seo-guncelleme.zip` tüm son düzenlemeleri ve SEO çalışmasını birlikte içerir. Sayfa başlığı/açıklaması varsayılanları İstanbul odağıyla hazırlanmıştır. Önceki Ataşehir/Kadıköy/Maltepe/Üsküdar kampanyasına ait SEO metinleri yerine güncel varsayılanlar kullanılır; diğer özel admin SEO metinleri korunur. Her sayfada izleme parametrelerinden arındırılmış canonical adresi ve tutarlı paylaşım adresi vardır. Hizmet sayfalarında Service ve BreadcrumbList yapılandırılmış verileri bulunur. İşletme bilgileri mevcut ayarlardan alınır; adres, yorum, puan veya yetkili servis iddiası eklenmemiştir. Hizmet bölgesi İstanbul, telefon mevcut yayımlanmış numaradır.

Site haritası 4 genel sayfa ve 28 hizmet içerir; uygulanmamış blog ve eski hizmet URL'leri çıkarılmıştır. Olmayan/pasif hizmetler ve uygulanmamış sayfalar gerçek HTTP 404 ve noindex döndürür. robots.txt erişilebilir sayfaları taramaya açar, yönetim ve özel teklif yollarını engeller. Yerel SQLite örneğiyle 32 sayfanın metadata/canonical adresleri, 28 hizmetin Service/Breadcrumb verileri, geçersiz sayfaların 404/noindex davranışı ve önceki ilçe kampanyası metinlerinin temizlenmesi doğrulanmıştır. Canlı kurulum sonrası tekrar kontrol gerekir.

Google Search Console henüz bağlanmamıştır. Yüklemeden sonra https://search.google.com/search-console adresinde `https://www.bilisimservis.com/` URL öneki mülkünü ekleyin. HTML etiketi doğrulamasındaki yalnızca content kodunu admin SEO ayarlarındaki Google Search Console alanına ekleyebilirsiniz; şifre veya API anahtarı paylaşmayın. Doğrulamadan sonra `https://www.bilisimservis.com/sitemap.xml` adresini gönderin. Google İşletme Profili/Haritalar hesabında doğrulanmış işletme adı, doğru telefon, gerçek adres/hizmet alanı ve çalışma saatleri ayrıca düzenlenmelidir. Hesap işlemleri veya sıralama sonuçları bu paketle yapılmış sayılmaz.

## Hizmet kategorileri

`kategorili-site-guncelleme.zip` son düzenlemelerin tamamını ve kategori düzenini içerir. Hizmetler sayfasındaki 28 hizmet altı açılır kategoriye ayrılmıştır: Bilgisayar & Mac, Elektrik & Elektronik, TV–Uydu–Kamera, Küçük Ev Aletleri, Hizmet Verdiğimiz Alanlar ve Satış–Bakım–Destek. Ana sayfadaki uzun hizmet listesi altı kategori kartıyla değiştirilmiştir. Kartlar ilgili kategoriyi açar; hizmet detay adresleri korunur. Altı kategori, 28 benzersiz hizmet, açılma/kapanma, kategori bağlantıları ve mobil genişlik yerel tarayıcıda kontrol edildi.

## Genişletilmiş küçük ev aletleri

`ev-aletleri-guncelleme.zip` son site düzenlemeleriyle birlikte dört küçük ev aleti alt grubunu içerir: Kişisel Bakım (5 cihaz), Mutfak Aletleri (13 cihaz), Temizlik Cihazları (4 cihaz), Ütü & Ev Konforu (5 cihaz). Toplam 27 cihaz için ayrı detay içerikleri vardır. Yeni başlıklar arasında fön/saç kurutma makinesi, saç maşası, saç düzleştirici, tıraş makinesi, epilatör, çay makinesi, airfryer, fritöz, mutfak robotu, rondo, ekmek kızartma makinesi, meyve sıkacağı, ekmek yapma makinesi, robot/dikey süpürge, buharlı temizleyici, ütü/kazanlı ütü, vantilatör, elektrikli ısıtıcı ve hava nemlendirici bulunur. Marka/model ve parça durumuna göre değerlendirme açıklanır; her cihaz için koşulsuz onarım sözü verilmez.

Yeni fotoğraflar temsili cihaz grubu görselleridir. Hizmet sayısı 49, site haritası URL sayısı 53 olmuştur. Dört alt grup, 27 benzersiz cihaz, fön/saç maşası bağlantıları, yeni detay sayfaları, WhatsApp ve mobil görünüm kontrol edilmiştir. SEO kontrolü 53 sayfada çalıştırılmıştır. Yükleme hedefi public_html; ZIP'in dosya izinleri 644 ve klasör izinleri 755'tir.

## Tam proje kaynak arşivi

`bilisimservis-tum-proje.zip` yaklaşık 28 MB'lık tam kaynak dağıtımıdır; içinde `bilisimservis/` klasörü bulunur. Güncel ön yüz, yönetim paneli, sağlanan görseller, stiller, JavaScript ve Composer kilit dosyasındaki altı bağımlılık dahil edilmiştir. Bağımlılık sürümleri/manifest/lock değiştirilmemiştir. PHP 8.3 ile örnek PDF ve yerel MIME içeriği oluşturulmuştur; e-posta gönderilmemiştir.

Üretim `app/config/config.php` ve veritabanı dökümü dahil değildir. `config.example.php` yalnızca yer tutucular içerir; gerçek bağlantı bilgileri arşive konmamıştır. Gerçek veritabanını önceki tam hosting yedeğinizden alın. Kaynakta yeni veritabanı oluşturma şeması bulunmadığından sıfırdan veri kurulumu doğrulanmış değildir. ZIP güncelleme paketi veya tam hosting yedeği yerine geçmez; içindeki `KURULUM.txt` kapsamı ve yeni kurulum adımlarını açıklar. Canlı site yapılandırmasını silmeyin veya örnek yapılandırmayla değiştirmeyin.
