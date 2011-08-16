## servisleri sunucuya kuralım

- servislerin sahibini ve grubunu `www-data` ayarla

        cd /opt
        sudo git pull git://github.com/emineker/sim.git
        sudo chown www-data -R sim
        sudo chgrp www-data -R sim

- test.omu.edu.tr altına sembolik gönder

        cd /srv/www/test.omu.edu.tr
        sudo ln -s /opt/sim site


