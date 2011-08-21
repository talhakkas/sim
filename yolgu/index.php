<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

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
        render('node', 'Düzenle');
}

function update() {
	$key = F3::get('PARAMS.id');
	
	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$key");

	$table = new Axon("node");
	$table->load("id='$key'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg) {
		$table->$gnl = $blg;
	}

	$table->save();

	F3::reroute("/show/$key");
}

function create() {
	$key = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;

	$datas = array();
	$datas['parent'] = F3::get('PARAMS.id');
	$datas['type']   = F3::get('PARAMS.type');
	$datas['isOnset']= 0;

	F3::set('SESSION.data', $datas);
        render('node', 'Oluştur');
}

function save() {
	$key = F3::get('PARAMS.id');
	
	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$key");

	$table = new Axon("node");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg) {
		$table->$gnl = $blg;
	}

	$table->save();

	DB::sql('select max(id) from node where id');
	$res = F3::get("DB->result");

	$key = $res[0]['max(id)'];
	F3::reroute("/show/$key");
}

function delete() {
	$key = F3::get('PARAMS.id');

	$table = new Axon("node");
	$table->load("id='$key'");
	
	$pid = $table->parent ? $table->parent : 1;
	
	$table->erase();

	F3::reroute("/show/$pid");
}

function test() {
	DB::sql('select max(id) from node where id');
	$res = F3::get("DB->result");

	$mxid = $res[0]['max(id)'];
	echo $mxid;
}

F3::route("GET /*", 	   'login');
	F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');

F3::route("GET /show/@id", 'show');
F3::route("GET /edit/@id", 'edit');
	F3::route("POST /edit/@id", 'update');

F3::route("GET /create/@type/@id", "create");
	F3::route("POST /create/@type/@id", "save");

F3::route("GET /delete/@id", "delete");
F3::route("POST /delete/@id", "delete");

F3::route("GET /test", "test");

F3::run();

?>

