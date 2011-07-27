<?php

include 'init.php';

// table & key
$TABLE = F3::get('SESSION.TABLE');
$KEY = F3::get('SESSION.KEY');
$key = F3::get('REQUEST.' . $KEY);

$table = new Axon($TABLE);

// oturumdan veriyi kontrol edelim
if (!$table->found("$KEY='$key'")) {

	foreach($_POST as $gnl => $blg)
		$table->$gnl = $blg;

	$table->save();
	F3::set('SESSION.SAVE', count($table->find())); // yeni kayıt ekler eklemez toplam kayıtı bir artırsın

	F3::set('SESSION.key', $table->$KEY);

	//yukle ( F3::get('uploaddir') . 'emineker.jpg' ); // fotoyu da yükleyelim

	// oturumu öldürelim
	F3::clear('error');
	F3::clear('correct');
	F3::set('correct', $table->$KEY . " bilgisine sahip kişi '$TABLE' tablosuna başarıyla eklendi.");
	return F3::call('ok.php');
}
else
	F3::set('error', "'$TABLE' tablosunda '$key' isminde bir kayıt zaten var.");

F3::call('home'); // index.php'den fonksiyon çağırımı

?>
