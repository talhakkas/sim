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


$save = $table->find(); // değişkene atayalım ki, hız kazanalım.
// tablo kayıt sayısını kaydedelim
F3::set('SESSION.SAVE', ($save) ? count($save) : "0");

F3::set('correct', "'".e($TABLE)."' tablosu başarıyla seçildi.");

F3::call('home');

?>
