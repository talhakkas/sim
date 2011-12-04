<?php

require_once 'init.php';
require_once 'upload.php';
require_once 'simple_html_dom.php';

require_once 'mylib.php';
require_once 'tetkik.php';
require_once 'test.php';


function render($template, $title='') {
	F3::set('page_title', $title);
	F3::set('template', $template);
	echo Template::serve("layout.htm");
}

F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SR', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));


/*
 * tarayıcıdan gelen ses mutlaka kulak ver
 */

$HTTP_LANGUAGE = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 5);
$HTTP_LANGUAGES = array('en-US', 'tr-tr');
$HTTP_LANGS = array('en-US' => 'en_US', 'tr-tr' => 'tr_TR');

// ilk defa sayfaya ulaşıldığını bu durumu tetiklememiz gerektiğini unutma
if (!F3::get('SESSION.lang') && in_array($HTTP_LANGUAGE, $HTTP_LANGUAGES))
	F3::set('SESSION.lang', $HTTP_LANGS[$HTTP_LANGUAGE]);


/*
 * şimdi dil durumuna bakarak sayfayı baştan kodla
 */

$locale = F3::get('SESSION.lang')? F3::get('SESSION.lang') : F3::get('lang');

T_setlocale(LC_MESSAGES, $locale);
T_bindtextdomain($locale, 'lang');
T_bind_textdomain_codeset($locale, 'UTF-8');
T_textdomain($locale);

function localize() {
	// sayfanın nereden geldiğini bulalım
	$localize = F3::get('SESSION.localize');

	$lang = F3::get("PARAMS.lang");
	$locales = array('en_US', 'tr_TR');

	if (in_array($lang, $locales))
		F3::set('SESSION.lang', $lang);

	F3::reroute($localize);
}

function _e($text) {
	$argv = func_get_args();

	$new = array();

	foreach ($argv as $val)
		$new[] = T_($val);

	return implode(' ', $new);
}

function isallowed() {
	foreach (func_get_args() as $val)
		if (F3::get("SESSION.is$val"))
			return 1;
}


?>
