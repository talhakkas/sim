<?php

if (F3::get("SESSION.special") != 1)
	return F3::call('login');


$state = F3::get('SESSION.olgustate');

$cevap = F3::get('SESSION.cevap');

$cevap = F3::get('cevap' . $state);

F3::set('SESSION.cevap', $cevap);
F3::set('SESSION.olgustate', $state+1);
F3::reroute('/olgu');


//page('Değerlendirme Ekranı', 'degerlendir');

?>

