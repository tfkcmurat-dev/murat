Yerel model kontrolü (yalnızca örnek SQLite verisi kullanır):

```sh
docker run --rm -v "$PWD/servis-kayit-modulu":/site:ro -v "$PWD/servis-kayit-testleri":/tests:ro php:8.3-cli php /tests/model-check.php
```

MariaDB 11.4 üzerinde aynı durum/işlem senaryoları ayrıca doğrulandı.
HTTP doğrulamaları: giriş zorunluluğu, CSRF, etkinleştirme, cihaz kaydı, özel fotoğraf yükleme/okuma, XSS kaçışı, durum değişimi, tutar, bildirim tekrarının engellenmesi, sahte fotoğraf reddi, kayıt arama.
Tarayıcı: masaüstü ve 390 px mobil form, yatay taşma kontrolü, durum kaydı.
Gerçek hosting kurulumu ve gerçek WhatsApp gönderimi test edilmedi.
