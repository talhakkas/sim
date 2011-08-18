<?php

require_once  '../lib/base.php';
require_once  '../lib2/lib.php';

function login() {
    if (F3::get("SESSION.special") == 1)
       return F3::call('show');
	render('login', 'Öğrenci Girişi');
}

function show() {
	$key = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.key', $key);

	$table = new Axon("node");
	$datas = $table->afind("id='$key'");

	$options = $datas[0]['options'];
	
	if (!empty($options)) {
		$opts = preg_split("/,/", $options);
		
		$options2 = array();
		foreach($opts as $k=>$v) {
			$t = preg_split("/:/", $v);
			$options2[$k][$t[0]] = $t[1];
		}

		$datas[0]['options'] = $options2;
	}
	else
		$datas[0]['options'] = array();

	F3::set('SESSION.data', $datas[0]);
        render('home', 'Ana Sayfa');
	//render('show', 'Gösteri');
}

function test() {
	echo "foo";
}

F3::route("GET /*", 	   'login');
F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');
F3::route("GET /test", 	   'test');

F3::route("GET /show/@id", 'show');
//F3::route("POST /show/@id", 'show');

F3::run();

?>

