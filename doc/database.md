### Veritabanı Yapılandırılması

- servis adında bir veri tabanı oluşturalım

	mkdb sim sim

- veritabanı yapılandırması :

    $ mysql -u sim -p sim < db/db.sql


#### yerelde çalışılan db'yi sunucuda güncelleme

- mysqldump ile db yedeğini alalım

        mysqldump -u sim -p sim > sim.sql

- sql dosyasını sunucuya taşıyalım ve db'yi oluşturalım

        mysql -u sim -p sim < sim.sql

