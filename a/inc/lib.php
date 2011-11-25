<?php

include 'init.php';
include 'upload.php';
include 'simple_html_dom.php';

function render($template, $title='') {
	F3::set('page_title', $title);
	F3::set('template', $template);
	echo Template::serve("layout.htm");
}

F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SR', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));

$locale = F3::get('SESSION.lang')? F3::get('SESSION.lang') : F3::get('lang');

T_setlocale(LC_MESSAGES, $locale);
T_bindtextdomain($locale, 'lang');
T_bind_textdomain_codeset($locale, 'UTF-8');
T_textdomain($locale);

function localize() {
	$lang = F3::get("PARAMS.lang");
	$locales = array('en_US', 'tr_TR');

	if (in_array($lang, $locales))
		F3::set('SESSION.lang', $lang);

	F3::reroute('/');
}

function _e($text) {
	return T_($text);
}

function isallows() {
	foreach (func_get_args() as $val)
		if (F3::get("SESSION.is$val"))
			return 1;
}


?>
