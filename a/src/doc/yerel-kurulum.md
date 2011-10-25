## servislerin yerel makinalara kurulması

### sunucu kurulması

19/x'i makinaya kurduktan sonra hemen x menüsünden php-sunucu-kur betiğini
çalıştıralım mysql parolası malum

- nginx ayarları

	sudo mv default /etc/nginx/sites-available
	sudo /etc/init.d/nginx/ restart


- her zaman olduğu gibi github ile sunucuya sistemi kurucaz

        cd /var
	sudo rm -rf www
        sudo git clone git://github.com/emineker/sim.git www


- servislerin sahibinin ve grubunun ayarlanması ayarla

        sudo chown www-data:www-data -R <kullanıcı adı>

	// www iznine yerelde 777 verin bize bir sıkıntı çıkarmaz
	sudo chmod 777 www


- özel temp dizinlerinin ayarlanması

	cd /var/www
	# ana root dizini için
	mkdir a/tmp
	chmod 777 a/tmp
	# daha sonra kaldıracağımız test servisi için
	mkdir test/tmp
	chmod 777 test/tmp

http://localhost dediğimiz zaman sistemin çalışıyor olması gerekli


### veri tabanının yapılandırılması

- yine 19/x betiklerinden mkdb bizim işimizi en iyi gören araç

	mkdb sim sim

yani malum parola ve şifre ile ...

- arkasından veritabanını import edelim

	cd /var/www
	mysql -p sim -u sim < db/sim.sql

veritabanını da bu şekilde hazırladık
