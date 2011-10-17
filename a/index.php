<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function home() {
	render('a/home', 'Hoşgeldiniz');
}

function page() {
	$pages = array('people', 'work', 'about', 'contact', 'playground');

	$page = F3::get('PARAMS.page');
	if (in_array($page, $pages))
		return render("a/$page");

	render("a/home");
}

F3::route("GET /*"      , 'home');
F3::route("GET /@page", 'page');

F3::run();

?>
