<?php

require_once  '../lib/base.php';
require_once  '../lib2/lib.php';

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('show');
	render('login', 'Yolgu bu Yolgu');
}

function show() {
	$key = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.key', $key);

	$table = new Axon("node");
	$datas = $table->afind("id='$key'");

	$options = trim($datas[0]['options']);

	if (!empty($options)) {
		$opts = preg_split("/,,/", $options);

		$options2 = array();
		foreach($opts as $k=>$v) {
			$t = preg_split("/::/", $v);
			// bu tasarim daha kullanisli
			$options2[$k]['text'] = $t[0];
			$options2[$k]['link'] = $t[1];
		}
		$datas[0]['options'] = $options2;
	}
	else
		$datas[0]['options'] = array();

	F3::set('SESSION.data', $datas[0]);
        render('show', 'Olgu');
}

function edit() {
	$key = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.key', $key);

	$table = new Axon("node");
	$datas = $table->afind("id='$key'");

	F3::set('SESSION.data', $datas[0]);
        render('edit', 'Düzenle');
}

function update() {
	$key = F3::get('PARAMS.id');

	$table = new Axon("node");
	$table->load("id='$key'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg) {
		$table->$gnl = $blg;
	}

	$table->save();

	F3::reroute("/show/$key");
}

F3::route("GET /*", 	   'login');
F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');

F3::route("GET /show/@id", 'show');
F3::route("GET /edit/@id", 'edit');
F3::route("POST /edit/@id", 'update');

F3::run();

?>

