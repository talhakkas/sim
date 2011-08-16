<?php

include 'init.php';
include 'dict.php';


// genel terimlerin çevirisi
function _et($str){
	$dict = dict2();
	if (in_array($str, array_keys($dict)))
		return $dict[$str];
	return Google::translate($str, 'tr', 'en');
}

// ingilizce türkçe çeviri
function _e($str){
	$_lang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
	if ( substr($_lang, 0, 2) == "tr")
		return $str;
	else {
		$dict = dict();
		if (in_array($str, array_keys($dict)))
			return $dict[$str];

		return Google::translate($str, 'tr', 'en');
	}
}

?>
