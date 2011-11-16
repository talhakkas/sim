<?php

include 'init.php';
include 'upload.php';
include 'simple_html_dom.php';

function render($template, $title='') {
	F3::set('page_title', $title);
	F3::set('template', $template);
	echo Template::serve("layout/layout.htm");
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

?>
