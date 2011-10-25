<?php

if (!F3::exists('error')) {

	// table & key
	$TABLE = F3::get('SESSION.TABLE');
	$KEY = F3::get('SESSION.KEY');
	$key = F3::get('SESSION.key');

	$table = new Axon($TABLE);

	// oturumdan veriyi yükleyelim
	$table->load("$KEY='$key'");

	foreach($_POST as $gnl => $blg)
		$table->$gnl = $blg;

	$table->save();

	F3::set('correct', $table->$KEY . ' bilgisine sahip kişi başarıyla güncellendi.');
	return F3::call('ok.php');

}
else
	F3::set('error', 'Güncellenemedi: bir hata ile karşılaşıldı.');

F3::call('edit');

?>
