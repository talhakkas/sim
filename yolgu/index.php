<?php

require_once  '../lib/base.php';
require_once  '../lib2/lib.php';
require_once  '../lib2/F3.php';

function home() {
	F3::set('SESSION.key', 2);
	$key = F3::get('SESSION.key');

	$table = new Axon("node");
	$datas = $table->afind("id='$key'");

	$options = $datas[0]['options'];
	$opts = preg_split("/,/", $options);
	
	$options2 = array();
	foreach($opts as $k=>$v) {
		$t = preg_split("/:/", $v);
		$options2[$k][$t[0]] = $t[1];
	}

	$datas[0]['options'] = $options2;
	F3::set('SESSION.data', $datas[0]);
        render('home', 'Ana Sayfa');
}

function login() {
        if (F3::get("SESSION.special") == 1)
                return F3::call('home');
	render('login', 'Öğrenci Girişi');
}

function show() {
	render('show', 'Gösteri');
}

function test() {
	echo "foo";
}

F3::route("GET /*", 	   'login');
F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');
F3::route("GET /test", 	   'test');

F3::route("GET /show*",   'show');
F3::route("POST /show",   'show');

F3::run();

?>

