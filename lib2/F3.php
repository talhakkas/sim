<?php

function render($template, $title, $layout='layout') {
	F3::set('page_title', $title);
	F3::set('SESSION.template', $template); // printly için
	F3::set('template', $template);
        if (F3::get('printly')) // printly modu için ufak bir değişkencik
                $layout = "printly";
	echo Template::serve($layout . '.htm');
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
