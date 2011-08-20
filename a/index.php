<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function home() {
	render('Hoşgeldiniz', 'home');
}

function people() {
	render('Ekibimiz', 'people');
}
function work() {
	render('Çalışmalarımız', 'work');
}
function about() {
	render('Hakkında', 'about');
}
function contact() {
	render('Bize Ulaşın', 'contact');
}
function playground() {
	render(' ', 'playground', 'nolayout');
}

F3::route("GET /*"      , 'home');
F3::route("GET /people*", 'people');
F3::route("GET /work*"  , 'work');
F3::route("GET /about*"  , 'about');
F3::route("GET /contact*", 'contact');
F3::route("GET /playground*", 'playground');

F3::run();

?>
