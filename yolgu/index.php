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

	if(strcmp($id, "yeni") == 0) 
		F3::reroute("/create/dal/$cid/$id");

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	if(empty($datas)) 
		F3::reroute("/create/dal/$cid/$id");

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
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id = F3::get('PARAMS.id') ? F3::get('PARAMS.id'):1;
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id',  $id);

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	F3::set('SESSION.data', $datas[0]);

	unzip();

	F3::set('SESSION.nonodes', count(F3::get('SESSION.data[nodes]')));
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

	zip();

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

	zip();

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
	$key = F3::get('PARAMS.id');

	$table = new Axon("node");
	$table->load("id='$key'");

	$pid = $table->parent ? $table->parent : 1;

	$table->erase();

	F3::reroute("/show/$pid");
}

function nodeList($cid) {
	$table = new Axon("node");
	$list = $table->afind("id > 0 AND cid='$cid'", "id asc");

	$sz = count($list);
	if($sz == 0) { // $cid icin ilk kayit ise bir tane baslangic dugumu olustur
		$table = new Axon("node");
		$table->nid = NULL;
		$table->cid = $cid;
		$table->id  = 1;
		$table->title = "İlk öykü"; $table->media = "";
		$table->content= "";$table->question = "";
		$table->options = "";$table->type = "oyku";
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

function unzip() {
	$datas = F3::get('SESSION.data');
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
	$cid = F3::get('SESSION.cid');
	$datas = F3::get('SESSION.data');

	switch(F3::get('SESSION.data[type]')) {
		case "oyku":
			$datas = array('link_text' => 'foo', 'next_node' => 1);
			F3::set('SESSION.nonodes', 0);
			break;
		case "dal":
			$datas['nodes'] = array(
				0=>array('link_text'=>'', 'node_link'=>1)
			);
			F3::set('SESSION.nonodes', 1);

			break;
	}

	$datas['id'] = F3::get('SESSION.id');
	$datas['cid'] = F3::get('SESSION.cid');

	F3::set('SESSION.data', $datas);
}

// case: functions
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
		$data[$i]['bdugumu']    = $datas[$i]->bdugumu;
	}

	F3::set('SESSION.cdata', $data);
        render('clist', 'Listele');
}

function cadd() {
	DB::sql('select max(cid) from ncase where cid');
	$res = F3::get("DB->result");
	$cid = $res[0]['max(cid)'] + 1;
	F3::set('SESSION.cid', $cid);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

	//cilkle();
        render('case', 'Yeni Ekle');
}

function csave() {
	$table = new Axon("ncase");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg) {
		$table->$gnl = $blg;
	}
	$table->cid = NULL;
	$table->save();

	DB::sql('select max(cid) from ncase where cid');
	$res = F3::get("DB->result");

	$cid = $res[0]['max(cid)'];

	F3::reroute("/cshow/$cid");
}

function cdelete() {
	$cid = F3::get('PARAMS.cid');

	$table = new Axon("ncase");
	$table->load("cid='$cid'");
	$table->erase();

	F3::reroute("/clist/");
}

function test() {
	print_r(F3::get('FILES'));
}

F3::route("GET /*", 	   'login');
	F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');

F3::route("GET /show/@cid/@id", 'show');
F3::route("GET /edit/@cid/@id", 'edit');
	F3::route("POST /edit/@cid/@id", 'update');

F3::route("GET /create/@type/@cid/@id", "create");
	F3::route("POST /create/@type/@cid/@id", "save");

F3::route("GET /delete/@cid/@id", "delete");
F3::route("POST /delete/@cid/@id", "delete");

// case routings
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
