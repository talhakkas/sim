## Ondokuz Mayıs Üniversitesi Web Tabanlı Simülasyon Eğitimi Merkezi

### f3-version: 2.0

### Veritabanı Yapılandırılması

- veritabanı yapılandırması :

    $ mysql -u sim -p sim < db/db.sql

#### yerelde çalışılan db'yi sunucuda güncelleme

- mysqldump ile db yedeğini alalım

        mysqldump -u sim -p sim > sim.sql

- sql dosyasını sunucuya taşıyalım ve db'yi oluşturalım

        mysql -u sim -p sim < sim.sql

#### .f3.ini içinde gerekli yerlerin düzenlenmesi

- admin servisi tablo yapılandırması :

index.php içindeki `giris()` fonksiyonunda

	F3::set('SESSION.TABLES', array(
			'admin' => 'username',
			));

gerekli `tablo + key` bilgilerinin eklenmesi.

- upload dizini `sudo chmod 777 upload` diyerek izinlerinin değiştirilmesi

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

- nginx yapılandırılması (yerelde çalışılıyorsa)

            rewrite ^/*$ /a/ redirect;

	    set $service "";
            if ($request_uri ~* ^(/[^/]+)/.*$) {
	    	    set $service $1;
	    }

	    location / {
		try_files $uri $uri/ $service/index.php;
	    }

	    location ~ \.php$ {
		fastcgi_pass 127.0.0.1:9000;
		fastcgi_index index.php;
		fastcgi_param SCRIPT_FILENAME $request_filename;
		include fastcgi_params;
	    }



## Dizin Yapısı

    /
        a/
            gui/
            inc/
            index.php
        student/
            gui/
            inc/
            index.php
        tutor/
            gui/
            inc/
            index.php
        admin/
            gui/
            inc/
            index.php
        asset/
            css/
            img/
            js/
            upload/
        db/
        tmp/
        fonts/
        github/
        lib/
        .f3.ini
        .gitignore
        README.md

