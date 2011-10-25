<?php

if (F3::get("SESSION.special") != 1)
	return F3::call('login');

render('degerlendir', 'Değerlendirme Ekranı');

?>

