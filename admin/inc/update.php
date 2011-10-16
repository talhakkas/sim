<?php

if (!F3::exists('error')) {

	// table & key
	$TABLE = F3::get('SESSION.TABLE');
	$KEY = F3::get('SESSION.KEY');
	$key = F3::get('SESSION.key');

	$table = new Axon($TABLE);

	// oturumdan veriyi yükleyelim
	$table->load("$KEY='$key'");

	foreach ($_POST as $gnl => $blg)
		if ($gnl != 'photo') // photo'yu kaydetme
			$table->$gnl = $blg;

	$table->save();

	$table = new Axon($TABLE);
	$table->load("$KEY='$key'");

	// önceden bir resim var ise üzerine yaz gitsin
	$up = new Upload();
	if ($response = ($up->load($TABLE, $table->$KEY, F3::get("FILES.photo"), true)))
		if ($response[0]) // istek başarı mı / hata mı ?
			$table->photo = $response[1];
		else
			F3::set('error', $response[1]);

	if (F3::exists('error')) // yükleme sırasında hata var mı?
		return F3::call('edit');

	$table->save();

	F3::set('correct', $table->$KEY . ' bilgisine sahip kişi başarıyla güncellendi.');
	return F3::call('show.php');

} else
	F3::set('error', 'Güncellenemedi: bir hata ile karşılaşıldı.');

F3::call('edit');

?>
