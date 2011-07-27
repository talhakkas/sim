<?php

if (F3::exists('REQUEST.table'))
	$TABLE = F3::get('REQUEST.table');
else
	$TABLE = F3::get('SESSION.TABLE_INIT');

//tablolarımız : giris() fonskiyonundan set edilmişti alıyoruz
$TABLES = F3::get('SESSION.TABLES');

// tablomuzu ve tablomuzda kullanacağımız uniq key'imizi seçiyoruz.
F3::set('SESSION.TABLE', $TABLE);
F3::set('SESSION.KEY', $TABLES[$TABLE]);

$table = new Axon($TABLE);

// tablo kayıt sayısını kaydedelim
F3::set('SESSION.SAVE', count($table->find()));

F3::set('correct', "'$TABLE' tablosu başarıyla seçildi.");

// hata var, dön başa ve tekrar sorgu al.
// error alanı dolu ve layout.htm'de görüntülenecek
F3::call('home'); // f3.php'den fonksiyon çağırımı
?>
