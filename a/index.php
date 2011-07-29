<?php

require_once  '../lib/base.php';

function render() {
 	echo Template::serve('layout.htm');
}

function render2() {
 	echo Template::serve('nolayout.htm');
}

function page($title, $template, $layout="render") {
	F3::set('page_title', $title);
	F3::set('template', $template);
	F3::call($layout);
}

function home() {
	page('Hoşgeldiniz', 'home');
}

function people() {
	page('Ekibimiz', 'people');
}
function work() {
	page('Çalışmalarımız', 'work');
}
function about() {
	page('Hakkında', 'about');
}
function contact() {
	page('Bize Ulaşın', 'contact');
}
function playground() {
	page(' ', 'playground', 'render2');
}

F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SERVICEROOT', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));

F3::route("GET /"      , 'home');
F3::route("GET /people", 'people');
F3::route("GET /work"  , 'work');
F3::route("GET /about"  , 'about');
F3::route("GET /contact", 'contact');
F3::route("GET /playground", 'playground');

F3::run();

?>
