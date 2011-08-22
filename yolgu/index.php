<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('cshow');
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

	unzip();

	$all_nodes = nodeList();
	F3::set('SESSION.all_nodes', $all_nodes);

        render('node', 'Düzenle');
}

function update() {
	$key = F3::get('PARAMS.id');

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$key");
	
	if($_POST['type'] == 'oyku') 
		$next_node = $_POST['next_node'];

	zip();

	$table = new Axon("node");
	$table->load("id='$key'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	
	$fnm = "$key.jpg";
	$uploaddir = "/public/upload/";
	$ffnm = $uploaddir . $fnm;
	if(yukle($ffnm, "media", false))
		$table->media = $fnm;
	else
		$table->media = "default.jpg";
	$table->save();

	if($_POST['type'] == 'oyku') {
		$table2 = new Axon("node");
		$table2->load("id='$next_node'");
		$table2->parent = $key;
		$table2->save();
	}

	F3::reroute("/show/$key");
}

function create() {
	$key = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;

	$datas = array();
	$datas['parent'] = F3::get('PARAMS.id');
	$datas['type']   = F3::get('PARAMS.type');
	$datas['isOnset']= 0;

	F3::set('SESSION.data', $datas);

	$all_nodes = nodeList();
	F3::set('SESSION.all_nodes', $all_nodes);

	ilkle();
        render('node', 'Oluştur');
}

function save() {
	$key = F3::get('PARAMS.id');

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$key");

	zip();

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

function nodeList() {
	$table = new Axon("node");
	$list = $table->afind('id > 0', "id asc");

	$nodes = array();
	foreach($list as $k=>$node) {
		$nodes[$k] = array($node['id'], $node['title']);
	}

	return $nodes;
}

function unzip() {
	$datas = F3::get('SESSION.data');

	switch($datas['type']) {
		case "oyku":
			$opts = $datas['options'];
			$t = preg_split("/::/", $opts);
			$datas['link_text'] = $t[0];
			$datas['next_node'] = $t[1];
			unset($datas['options']);
			break;
		case "dal":
			$opts = preg_split("/,,/", $datas['options']);

			foreach($opts as $k=>$v) {
				$t = preg_split("/::/", $v);
				// bu tasarim daha kullanisli
				$datas['nodes'][$k]['link_text'] = $t[0];
				$datas['nodes'][$k]['node_link'] = $t[1];
			}
			unset($datas['options']);
			break;
	}
	F3::set('SESSION.data', $datas);
}

function zip() {
	// $_POST: type a gore or. oyku, link_text+next_node => options
	$datas = $_POST;
	switch($datas['type']) {
		case "oyku":
			$datas["options"] = $datas['link_text'] . "::" . $datas['next_node'];
			unset($datas['link_text']);
			unset($datas['next_node']);
			break;
		case "dal":
			$tmp = "";
			$size = sizeof($datas['link_text']);
			for($i=0; $i < $size; $i++) {
				$tmp = $tmp . $datas['link_text'][$i] ."::". $datas['node_link'][$i];

				if ($i < ($size - 1))
					$tmp = $tmp .",,";
			}
			$datas['options'] = $tmp;
			unset($datas['link_text']);
			unset($datas['node_link']);
			break;
	}
	$_POST = $datas;

}

function ilkle() {
	$datas = F3::get('SESSION.data');
	switch(F3::get('SESSION.data[type]')) {
		case "oyku":
			$datas = array('link_text' => 'foo', 'next_node' => 1);
			break;
		case "dal":
			$datas['nodes'] = array(
				0=>array('link_text'=>'buraya yaz', 'node_link'=>1)
			);

			break;
	}
	F3::set('SESSION.data', $datas);
}

// case: functions
function cshow() {
	$key = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.ckey', $key);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$key'");

	F3::set('SESSION.cdata', $datas[0]);
        render('cshow', 'Case Details');
}

function cedit() {
	$key = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.ckey', $key);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$key'");

	F3::set('SESSION.cdata', $datas[0]);
        render('case', 'Düzenle');
}

function cupdate() {
	$key = F3::get('PARAMS.cid');

	if (!empty($_REQUEST['delete']))
		F3::reroute("/cdelete/$key");
	
	$table = new Axon("ncase");
	$table->load("cid='$key'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	$table->save();

	F3::reroute("/cshow/$key");
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

F3::route("GET /case/@cid", 'cshow');
F3::route("GET /cedit/@cid", 'cedit');
	F3::route("POST /cedit/@cid", 'cupdate');

F3::route("GET /test", "test");

F3::run();

?>
