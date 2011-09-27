<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once  'inc/multiselect.php';

function home() {
        $duyuru = DB::sql("select * from announcement");
        rsort($duyuru); // son eklenen duyuru en üstte görünsün
        F3::set('announcement', $duyuru);
        F3::set('olgu', DB::sql("select * from event"));
        if (! F3::get("SESSION.olgu")) // default olgu
                F3::set("SESSION.olgu", 2); // default olgu
        render('home', 'Ana Sayfa');
}

function ekg() {
	$isEkgResponse = empty($_POST) ? "no" : "yes";
	$yorum = empty($_POST) ? "" : $_POST['yorum'];

	F3::set('SESSION.isEkgResponse', $isEkgResponse);
	F3::set('SESSION.yorum', $yorum);

	render('ekg', 'Ekg Ekranı');
}

function bulgu() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('bulgu', 'Bulgu Ekranı');
}

function about() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('about', 'Hakkında');
}

function personal() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
        $student = new Axon('people');
        $std = F3::get('SESSION.student');
        $student->load("tc='$std'");
        F3::set("personal", $student);
	render('personal', 'Kişisel Sayfa');
}

function son() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('son', 'Son Oturum');
}

function printly() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('home');
        F3::set('printly', 'printly');
        $template = F3::get('SESSION.template');
        $inc = array('olgu', 'degerlendir');
        if (in_array($template, $inc))
                return F3::call($template . '.php');
        F3::call($template);
}

function login() {
        if (F3::get("SESSION.special") == 1)
                return F3::call('home');
	render('login', 'Öğrenci Girişi');
}

function cases() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('home');
        F3::set("SESSION.olgu", $_POST['OLGU']);
        render('home', 'Ana Sayfa');
        F3::reroute('/');
}


F3::route('GET /f', function() { render('f', 'video player');});
F3::route('GET /ilac', function() {render('ilac', 'ilaç ekranı');});
F3::route('POST /ilac', function() {
	echo "Secilen ilaclar: ";
	echo $_POST['drugs'];
});

F3::route('GET /test',
        function() {
                if (F3::get("SESSION.special") != 1)
                        return F3::call('login');
                F3::set('tetkikmerkezi', multi());
                render('test', 'yeni olgu ekranı');
        }
);


F3::route("GET /*"      , 'login');
F3::route("GET /printly*"      , 'printly');
F3::route("POST /login", 'login.php');
F3::route("GET /logout*", 'logout');
F3::route("GET /about*",  'about');
F3::route("GET /ekg*",    'ekg');
	F3::route("POST /ekg*",    'ekg');
F3::route("GET /bulgu*",  'bulgu');
F3::route("GET /personal*",  'personal');

F3::route("GET /olgu*",  'olgu.php');
F3::route("POST /degerlendir", 'degerlendir.php');
F3::route("POST /son", 'son');

F3::route("POST /cases", 'cases');

F3::run();

?>

