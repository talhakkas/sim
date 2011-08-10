## Ondokuz Mayıs Üniversitesi Web Tabanlı Simülasyon Merkezi

### f3-version: 2.0

- veritabanı yapılandırması :

    $ mysql -u sim -p sim < db/db.sql

.f3.ini içinde gerekli yerlerin düzenlenmesi

- yerelde çalışılan veritabanını sisteme aktarma

    $ mysqldump -u sim -p sim > db/sim.sql
    $ mysql -u sim -p sim < db/sim.sql

- admin servisi tablo yapılandırması :

index.php içindeki `giris()` fonksiyonunda

	F3::set('SESSION.TABLES', array(
			'admin' => 'username',
			));

gerekli `tablo + key` bilgilerinin eklenmesi.

- img dizini `sudo chmod 777 img` diyerek izinlerinin değiştirilmesi

not : tabloda photo, content isimlerinin özellikleri var


- (yerelde) temp dizinlerinin iznini ayarla

    	sudo chmod 777 a/temp student/temp tutor/temp admin/temp

- (sunucuda) servislerin sahibini ve grubunu `www-data` ayarla

        cd /opt
        sudo chown www-data -R sim
        sudo chgrp www-data -R sim

- test.omu.edu.tr altına sembolik gönder

        cd /srv/www/test.omu.edu.tr
        sudo ln -s /opt/sim site


### Veritabanı taşıma işlemleri

- yereldeki db'yi sunucuya taşıyalım

        mysqldump -u sim -p sim > sim.sql (yerelde)

- sql dosyasını sunucuya taşıyalım

        mysql -u sim -p sim < sim.sql (sunucuda)


## Dizin Yapısı

    /
        a/
            gui/
            inc/
            index.php
            temp/
        admin/
            gui/
            inc/
            index.php
            temp/
        asset/
            css/
            img/
            js/
            upload/
        db/
        .f3.ini
        fonts/
        .gitignore
        github/
        lib/
        README.md
        student/
            gui/
            inc/
            index.php
            temp/
        tutor/
            gui/
            inc/
            index.php
            temp/


