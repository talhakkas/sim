## Admin Paneli Özel Ayarları

- admin servisi tablo yapılandırması :

index.php içindeki `giris()` fonksiyonunda

	F3::set('SESSION.TABLES', array(
			'admin' => 'username',
			));

gerekli `tablo + key` bilgilerinin eklenmesi.


