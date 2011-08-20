<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function home() {
	render('home', 'Hoşgeldiniz');
}
function people() {
	render('people', 'Ekibimiz');
}
function work() {
	render('work', 'Çalışmalarımız');
}
function about() {
	render('about', 'Hakkında');
}
function contact() {
	render('contact', 'Bize Ulaşın');
}
function playground() {
	render('playground');
}

F3::route("GET /*"      , 'home');
F3::route("GET /people*", 'people');
F3::route("GET /work*"  , 'work');
F3::route("GET /about*"  , 'about');
F3::route("GET /contact*", 'contact');
F3::route("GET /playground*", 'playground');

F3::run();

?>
