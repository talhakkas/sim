<?php

function dict(){
	return array(
		'Anasayfa' => 'Home',
		'Yönetici Paneli' => 'Admin Panel',
	);
}

function _e($str){
	$_from = 'tr'; //burda tarayıcı dilini al //echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];

	if ($_from == 'tr')
		return $str;

	$_to = 'en'; // burayı da zamanı gelince set edilince alırısın

	$dict = dict();
	if ($dict[$str])
		return $dict[$str];

	return Google::translate($str, $_from, $_to);
}

?>
