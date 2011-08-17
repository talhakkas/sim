## servislerin sunucuya kurulması

- her zaman olduğu gibi github ile sunucuya sistemi kurucaz

        cd /opt
        sudo git pull git://github.com/emineker/sim.git

- servislerin sahibini ve grubunu `www-data` ayarla

        sudo chown www-data:www-data -R sim

- test.omu.edu.tr altına sembolik gönder

        cd /srv/www/test.omu.edu.tr
        sudo ln -s /opt/sim site

