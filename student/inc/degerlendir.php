<?php

if (F3::get("SESSION.special") != 1)
	return F3::call('login');

F3::set('template', 'degerlendir');
F3::set('title', 'Değerlendirme Ekranı');
F3::call('render');

?>

