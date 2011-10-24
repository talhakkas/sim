<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once  'inc/tetkik.php';

function home() {
        render('home', 'Ana Sayfa');
}

function student_home() {
        $duyuru = DB::sql("select * from announcement");
        rsort($duyuru); // son eklenen duyuru en üstte görünsün
        F3::set('announcement', $duyuru);
        F3::set('olgu', DB::sql("select * from event"));
        if (! F3::get("SESSION.olgu")) // default olgu
                F3::set("SESSION.olgu", 2); // default olgu
        render('student-home', 'Eski Student Ana Sayfa');
}

function ekg() {
	$isEkgResponse = empty($_POST) ? "no" : "yes";
	$yorum = empty($_POST) ? "" : $_POST['yorum'];

	F3::set('SESSION.isEkgResponse', $isEkgResponse);
	F3::set('SESSION.yorum', $yorum);

	render('ekg', 'Ekg Ekranı');
}

function page() {
        $page = F3::get("PARAMS.page");
        render($page, 'Ana Sayfa');
}


function tetkik() {
	$select_all = F3::get('REQUEST');

	$preselected = array();
        foreach ($select_all as $key => $value){
                if (stristr($key, 'response'))
                        foreach ($select_all[$key] as $k => $v)
                                $preselected[] = $v;
        }

	print_r($preselected);
	F3::set('tetkikmerkezi', multi($preselected));

    render('tetkik', 'Sonuçlar');
}

function immapr() {
	F3::set('SESSION.secim', array('x' => $_POST['x'],  'y' => $_POST['y'],
								   'x2'=> $_POST['x2'], 'y2'=> $_POST['y2'],
								   'w' => $_POST['w'],  'h' => $_POST['h']));
	F3::set('SESSION.yorum', $_POST['yorum']);

	render('immapr', 'Immap:Result');
}

//F3::set('tetkikmerkezi', multi());

F3::route('GET /buton', function() { render('buton', 'butonlar');});
F3::route('GET /f', function() {render('f', 'video player');});
F3::route('GET /ilac', function() {render('ilac', 'ilaç ekranı');});
F3::route('POST /ilac', 'ilac_sonuc.php');

F3::route('GET /test',
        function() {
                F3::set('tetkikmerkezi', multi());
                render('test', 'yeni olgu ekranı');
        }
);

F3::route("GET /*"      , 'home');
F3::route("GET /student-home"      , 'student_home');
F3::route("GET /ekg*",    'ekg');
	F3::route("POST /ekg*",    'ekg');

F3::route("GET /@page", 'page');

F3::route('POST /ilac', 'ilac_sonuc.php');

F3::route('GET /tetkik',  'tetkik');
F3::route('POST /tetkik', 'tetkik');

F3::route('POST /immapr', 'immapr');

F3::run();

?>

