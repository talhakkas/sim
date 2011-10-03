<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once  'inc/multiselect.php';

function home() {
        render('home', 'Ana Sayfa');
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
	//render(F3::get('PARAMS.page'));
}

F3::set('tetkikmerkezi', multi());

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
F3::route("GET /ekg*",    'ekg');
	F3::route("POST /ekg*",    'ekg');

F3::route("GET /@page", 'page');

F3::route('POST /ilac', 'ilac_sonuc.php');
F3::run();

?>

