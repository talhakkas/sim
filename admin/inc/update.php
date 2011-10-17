<?php

if (!F3::exists('error')) {

	// table & key
	$TABLE = F3::get('SESSION.TABLE');
	$KEY = F3::get('SESSION.KEY');
	$key = F3::get('SESSION.key');
	$request_key = F3::get('REQUEST.'.$KEY);

	$table = new Axon($TABLE);

	// oturumdan veriyi yükleyelim
	$table->load("$KEY='$key'");
	if ($key != $request_key && $table->found("$KEY='$request_key'")) {
		F3::set('error', "$request_key id'li kayıt var, güncelleme gerçekleşmedi");
		return F3::call('show');
	}

	foreach ($_POST as $gnl => $blg)
		if ($gnl != 'photo') // photo'yu kaydetme
			$table->$gnl = $blg;

	F3::set('SESSION.key', $table->$KEY);
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
