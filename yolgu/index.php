<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('clist');
	render('login', 'Yolgu bu Yolgu');
}

function show() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id',  $id);

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	if(empty($datas)) 
		F3::reroute("/create/dal/$cid/$id");

	if($datas[0]['title'] == "yeni")
		F3::reroute("/edit/$cid/$id");

	//F3::set('SESSION.data', unzip($datas[0]));
	$data = unzip($datas[0]);
	F3::set('SESSION.data', $data);

	// takibe ekle +
	$tid = F3::get('SESSION.tid');
	$ttid = new Axon("takip");
	$ttid->load("tid='$tid'");
	if(empty($ttid->nodes))	
		$ttid->nodes = "$id";
	else
		$ttid->nodes = "$ttid->nodes , $id";

	if(empty($_POST['response'])) {
		if(!empty($ttid->response))
			$ttid->response = "$ttid->response ,";
	} else
		$ttid->response = $ttid->response . $_POST['response'] . ",";
	$ttid->save();

	// takip listesini template gonder
	$list = preg_split('/,/', $ttid->nodes);
	$list_response = preg_split('/,/', $ttid->response);

	$nodes = array();
	foreach($list as $k=>$id) {
		$tid = new Axon("node");
		$datas = $table->afind("id='$id' AND cid='$cid'");

		$title = $datas[0]['title'];
		
		$resp = isset($list_response[$k])?$list_response[$k]:"";
		$nodes[$k] = array($id, $title, $resp);
	}
	F3::set('SESSION.tdata', $nodes);
    
	render('show', 'Olgu');
}

function edit() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id',  $id);

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	F3::set('SESSION.data', unzip($datas[0]));

	F3::set('SESSION.nofbs', count(F3::get('SESSION.data[nodes]')));
	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

        render('node', 'Düzenle');
}

function update() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id',  $id);

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");
	
	if($_POST['type'] == 'oyku') 
		$next_node = $_POST['next_node'];

	$_POST = zip($_POST);

	$table = new Axon("node");
	$table->load("id='$id' AND cid='$cid'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;

	if(F3::get('FILES.media.name') != "") {
		$fnm = "_n". sprintf("%05d", $table->nid) . ".jpg";
		$ffnm = F3::get('uploaddir') . $fnm;
		if(yukle($ffnm, "media", true))
			$table->media = $fnm;
		else 
			$table->media = "default.jpg";
	}

	if($_POST['resim_sil'] == 'evet')
		$table->media = NULL;

	$table->save();

	if($_POST['type'] == 'oyku') {
		$table2 = new Axon("node");
		$table2->load("id='$next_node' AND cid='$cid'");
		$table2->parent = $id;
		$table2->save();
	}

	F3::reroute("/show/$cid/$id");
}

function create() {
	$cid = F3::get('PARAMS.cid');
	$id = F3::get('PARAMS.id');

	if(strcmp($id, "yeni") == 0) {
		DB::sql("select max(id) from node where id AND cid='$cid'");
		$res = F3::get("DB->result");
		$id = $res[0]['max(id)'] + 1;
	}

	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id', $id);

	$datas = array();
	$datas['cid'] = $cid;
	$datas['id'] = $id;
	$datas['type']   = F3::get('PARAMS.type');
	$datas['isOnset']= 0;

	F3::set('SESSION.data', $datas);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

	ilkle();
	
        render('node', 'Oluştur');
}

function save() {
	$cid = F3::get('PARAMS.cid');
	$id = F3::get('PARAMS.id');
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id', $id);

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");

	if($id == "yeni") {
		DB::sql("select max(id) from node where id AND cid='$cid'");
		$res = F3::get("DB->result");
		$id = $res[0]['max(id)'] + 1;
	}

	$_POST = zip($_POST);

	DB::sql("select max(nid) from node where nid");
	$res = F3::get("DB->result");
	$nid = $res[0]['max(nid)'];

	$table = new Axon("node");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	
	if(F3::get('FILES.media.name') != "") {
		$fnm = "_n". sprintf("%05d", $nid) . ".jpg";
		$ffnm = F3::get('uploaddir') . $fnm;
		if(yukle($ffnm, "media", true))
			$table->media = $fnm;
		else 
			$table->media = "default.jpg";
	}
	
	$table->nid = NULL;
	$table->save();

	F3::reroute("/show/$cid/$id");
}

function delete() {
	$cid = F3::get('PARAMS.cid');
	$id  = F3::get('PARAMS.id');

	$table = new Axon("node");
	$table->load("id='$id' AND cid='$cid'");

	$pid = $table->parent ? $table->parent : 1;

	$table->erase();

	F3::reroute("/show/$cid/$pid");
}

function nodeList($cid) {
	$table = new Axon("node");
	$list = $table->afind("id AND cid='$cid'", "id asc");

	$sz = count($list);
	if($sz == 0) { // $cid icin ilk kayit ise bir tane baslangic dugumu olustur
		$table = new Axon("node");
		$table->nid = NULL;
		$table->cid = $cid;
		$table->id  = 1;
		$table->title = "yeni"; $table->media = "";
		$table->content= "";$table->question = "";
		$table->options = "";$table->type = "dal";
		$table->parent = 1; $table->isOnset = 1;
		$table->isWrong = 0;
		$table->save();
	
		$table = new Axon("node");
		$list = $table->afind("id > 0 AND cid='$cid'", "id asc");
	}

	$nodes = array();
	foreach($list as $k=>$node) {
		$nodes[$k] = array($node['id'], $node['title']);
	}

	return $nodes;
}

function unzip($datas) {
	if(empty($datas['content'])) $datas['content'] = "::";
	$content = preg_split("/,,/", $datas['content']);
	
	foreach($content as $k=>$v) {
		$t = preg_split("/::/", $v);
		
		$datas['content_acc'][$k]['header'] = $t[0];
		$datas['content_acc'][$k]['content'] = empty($t[1]) ? "NULL" : $t[1];
	}
	//unset($datas['content']);

	if(empty($datas['options'])) $datas['options'] = "::";

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
				$t1 = preg_split("/::/", $v);
				// kullanici girdis var mi?
				// format: 'text;;response::link'
				$t2 = preg_split('/;;/', $t1[0]);

				$datas['nodes'][$k]['link_text'] = $t2[0];
				$datas['nodes'][$k]['chkIA']  	 = empty($t2[1]) ? 'no' : 'yes';
				$datas['nodes'][$k]['IA'] 		 = empty($t2[1]) ? '' : $t2[1];
				$datas['nodes'][$k]['node_link'] = $t1[1];
			}
			unset($datas['options']);
			break;
	}

	return $datas;
}

function zip($datas) {
	// $_POST: type a gore or. oyku, link_text+next_node => options
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
				$response = (in_array(($i+1), $datas['chkIA'])) ? (";;" . $datas['IA'][$i]) : "";
				$tmp = $tmp . $datas['link_text'][$i] . $response ."::". $datas['node_link'][$i];

				if ($i < ($size - 1))
					$tmp = $tmp .",,";
			}
			$datas['options'] = $tmp;
			unset($datas['link_text']);
			unset($datas['chkIA']);
			unset($datas['IA']);
			unset($datas['node_link']);
			break;
	}

	return $datas;
}

function ilkle() {
	$cid = F4::get('SESSION.cid');
	$datas = F3::get('SESSION.data');

	switch(F3::get('SESSION.data[type]')) {
		case "oyku":
			$datas = array('link_text' => 'foo', 'next_node' => 1);
			F3::set('SESSION.nofbs', 0);
			break;
		case "dal":
			$datas['nodes'] = array(
				0=>array('link_text'=>'', 'node_link'=>1)
			);
			F3::set('SESSION.nofbs', 1);

			break;
	}

	$datas['id'] = F3::get('SESSION.id');
	$datas['cid'] = F3::get('SESSION.cid');

	F3::set('SESSION.data', $datas);
}

function maxID($idnm, $tablenm) {
	DB::sql("select max($idnm) from $tablenm where $idnm");
        $res = F3::get("DB->result");
        $mid = $res[0]["max($idnm)"];

	return intval($mid);
}

// case: functions
function cstart() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$cid'");
	$cdata = $datas[0];

	$id = $cdata['bdugumu'];
	F3::set('SESSION.id', $id);

	// takibi başlat
	$table2 = new Axon("takip");
	$table2->tid = NULL;
	$table2->nodes = "";
	$table2->response = "";
	$table2->save();
	
	F3::set("SESSION.tid", maxID("tid", "takip"));

	F3::reroute("/show/$cid/$id");	
}

function cshow() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$cid'");
	$cdata = $datas[0];

	$id = $cdata['bdugumu'];
	$table2 = new Axon("node");
	$datas2 = $table2->afind("id='$id' AND cid='$cid'");

	$cdata['node_title'] = $datas2[0]['title'];

	F3::set('SESSION.cdata', $cdata);
        render('cshow', 'Case Details');
}

function cedit() {
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$cid'");

	F3::set('SESSION.cdata', $datas[0]);
	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

        render('case', 'Düzenle');
}

function cupdate() {
	$cid = F3::get('PARAMS.cid');

	if (!empty($_REQUEST['delete']))
		F3::reroute("/cdelete/$cid");
	
	$table = new Axon("ncase");
	$table->load("cid='$cid'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	$table->save();

	F3::reroute("/cshow/$cid");
}

function clist() {
	$table = new Axon("ncase");
	$datas = $table->find("cid", "cid asc");
	$sz = count($datas);

	$data = array();
	for($i=0; $i < $sz; $i++) {
		$data[$i]['cid']   = $datas[$i]->cid;
		$data[$i]['title'] = $datas[$i]->title;
		$data[$i]['description'] = $datas[$i]->description;
	}

	F3::set('SESSION.cdata', $data);
        render('clist', 'Listele');
}

function cadd() {
	$cid = maxID("cid", "ncase") + 1;
	F3::set('SESSION.cid', $cid);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);
	//cilkle();
	render('case', 'Yeni Ekle');
}

function csave() {
	$cid = F3::get('POST.cid');

	$table = new Axon("ncase");
	//FIXME: $table->copyFrom('REQUEST');
	foreach(F3::get('POST') as $gnl => $blg) {
		$table->$gnl = $blg;
	}
	$table->save();

	F3::reroute("/cshow/$cid");
}

function cdelete() {
	$cid = F3::get('PARAMS.cid');

	$table = new Axon("ncase");
	$table->load("cid='$cid'");
	$table->erase();

	// node lari da sil
	$tnode = new Axon("node");
	$nodes = $tnode->load("cid='$cid'");

	while(!$nodes->dry()) {
		$nodes->erase();
		$nodes->skip();	
	}

	F3::reroute("/clist/");
}

function test() {
	print_r(F3::get('FILES'));
}

F3::set('uploaddir', 'upload/');

F3::route("GET /*", 	   'login');
	F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');

F3::route("GET /show/@cid/@id", 'show');
	F3::route("POST /show/@cid/@id", 'show');
F3::route("GET /edit/@cid/@id", 'edit');
	F3::route("POST /edit/@cid/@id", 'update');

F3::route("GET /create/@type/@cid/@id", "create");
	F3::route("POST /create/@type/@cid/@id", "save");

F3::route("GET /delete/@cid/@id", "delete");
F3::route("POST /delete/@cid/@id", "delete");

// case routings
F3::route("GET /cstart/@cid", 'cstart');

F3::route("GET /cshow/@cid", 'cshow');
F3::route("GET /cedit/@cid", "cedit");
	F3::route("POST /cedit/@cid", "cupdate");

F3::route("GET /clist", "clist");
F3::route("GET /cadd", "cadd");
	F3::route("POST /cadd", "csave");

F3::route("GET /cdelete/@cid", "cdelete");
	F3::route("POST /cdelete/@cid", "cdelete");

F3::route("GET /test", "test");
	F3::route("POST /test", "test");

F3::run();

?>
