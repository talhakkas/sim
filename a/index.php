<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

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
	page(' ', 'playground', 'nolayout');
}

F3::route("GET /*"      , 'home');
F3::route("GET /people*", 'people');
F3::route("GET /work*"  , 'work');
F3::route("GET /about*"  , 'about');
F3::route("GET /contact*", 'contact');
F3::route("GET /playground*", 'playground');

F3::run();

?>
