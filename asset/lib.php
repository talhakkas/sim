<?php

include 'access.php';
include 'init.php';
include 'dict.php';

// look
// https://github.com/emineker/sim/blob/master/.f3.ini.example

function render($template, $title) {
	F3::set('page_title', $title);
	F3::set('SESSION.template', $template); // printly için
	F3::set('template', $template);
        if (F3::get('printly')) { // printly modu için ufak bir değişkencik
		echo Template::serve('printly.htm');
	} else {
		$layout = F3::get('LAYOUTS') . base() . '.layout.htm';
		echo file_exists($layout) ? Template::serve("../" . $layout) : Template::serve("../" . F3::get('LAYOUTS') . 'layout.htm');
	}
}

function logout() {
	foreach(array('SESSION', 'REQUEST') as $alan) {
		foreach(F3::get("$alan") as $key => $value) {
			F3::clear("$alan.$key");
		}
	}
	F3::reroute('/');
}


F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SR', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));


// tüm termilerin çevirisi
function e($str){
	//$_lang = $_SERVER["HTTP_ACCEPT_LANGUAGE"];
	//if ( substr($_lang, 0, 2) == "tr")
	//	return $str;
	//return Google::translate($str, 'tr', 'en');

	$dict = dict();
	if (in_array($str, array_keys($dict)))
		return $dict[$str];
	return $str;
}

function in($item, $fields) {
	foreach ($fields as $field => $type)
		if ($type)
			if (preg_match('/'.$field.'/',$item)) return true;
		else
			if ($field == $item) return true;
	return false;
}
?>
