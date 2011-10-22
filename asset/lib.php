<?php

include 'init.php';
include 'upload.php';
include 'dict.php';
include 'csv.php';


function part() {
	return preg_split(
		'/\//', $_SERVER['SCRIPT_NAME']
		);
}
function root() {
	$split = part();
	return (count($split) > 1) ? $split[1] : '';
}
function base() {
	$split = part();
	return (count($split) > 2) ? $split[count($split) - 2] : '';
}

function render($template, $title='', $layout='layout') {
	F3::set('page_title', $title);
	F3::set('template', $template);
	if (F3::get('SR') == '/a')
		echo Template::serve("layout/$layout.htm");
	else
		echo Template::serve("$layout.htm");
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


// tüm terimlerin çevirisi
function e($str){

	$dict = dict();
	if (in_array($str, array_keys($dict)))
		return $dict[$str];
	return $str;
}

function in($item, $fields) {
	foreach ($fields as $field => $type) {
		if ($type) {
			if (preg_match('/'.$field.'/',$item)) return true;
		} else {
			if ($field == $item) return true;
		}
	}
	return false;
}

?>
