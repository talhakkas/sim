<?php

require_once  '../lib/base.php';

function render() {
 	echo Template::serve('layout.htm');
}

function page($title, $template, $layout="render") {
	F3::set('page_title', $title);
	F3::set('template', $template);
	F3::call($layout);
}

function home() {
        $ann = DB::sql("select * from announcement");
        F3::set('announcement', $ann);
        page('Ana Sayfa', 'home');
}

function ekg() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	page('Ekg Ekranı', 'ekg', 'render');
}

function bulgu() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	page('Bulgu Ekranı', 'bulgu', 'render');
}

function about() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	page('Hakkında', 'about', 'render');
}

function personal() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
        $student = new Axon('people');
        $std = F3::get('SESSION.student');
        $student->load("tc='$std'");
        F3::set("personal", $student);
	page('Kişisel Sayfa', 'personal');
}

function son() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	page('Son Oturum', 'son');
}

function login() {
        if (F3::get("SESSION.special") == 1)
                return F3::call('home');
	page('Öğrenci Girişi', 'login');
}
function logout() {
	if (F3::get('SESSION.special') == 1) {
                F3::clear('error');
                F3::set('SESSION.special', '0');
                F3::set('SESSION.username', '');
                //F3::clear('SESSION.special');
                //F3::clear('SESSION.username');
        }
	F3::reroute('/');
}



F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SR', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));

F3::route("GET /*"      , 'login');
F3::route("POST /login", 'login.php');
F3::route("GET /logout", 'logout');
F3::route("GET /about",  'about');
F3::route("GET /ekg",    'ekg');
F3::route("GET /bulgu",  'bulgu');
F3::route("GET /personal",  'personal');

F3::route("GET /olgu",  'olgu.php');
F3::route("POST /degerlendir", 'degerlendir.php');
F3::route("POST /son", 'son');

F3::run();

?>

