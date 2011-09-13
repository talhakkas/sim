<?php
function params2session() {
	// url den parametreleri oturuma kopyala
	$params = F3::get('PARAMS');

	unset($params[0]);	// url nin kendisi.

	foreach($params as $k=>$v) {
		F3::set("SESSION.$k", $v);
	}
}

function get_node() {
	$id  = F3::get('SESSION.id');
	$cid = F3::get('SESSION.cid');

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	if($datas[0]['title'] == "yeni")
		F3::reroute("/edit/$cid/$id");

	$node = unzip($datas[0]);

	return $node;
}

function takip_listesine_ekle($cid, $id) {
	/* Bir onceki formda girilen yanit ve hangi secenekten bu yeni sayfaya gelindiyse
	 * takip listesine eklenir
	 */
	$beklenen_yanit = empty($_POST['beklenen_yanit']) ? "" : $_POST['beklenen_yanit'];
	$opt = F3::get('SESSION.opt');
	$tid = F3::get('SESSION.tid');

	$ttid = new Axon("takip");
	$ttid->load("tid='$tid'");

	if(empty($ttid->nodes))	
		$ttid->nodes = "$id:$opt";
	else
		$ttid->nodes = "$ttid->nodes , $id:$opt";

	$kullanici_yaniti = empty($_POST['response']) ? "" : $_POST['response'];

	$ttid->response = $ttid->response . "$beklenen_yanit:$kullanici_yaniti" . ",";
	$ttid->save();
}

function takip_listesi2dizi() {
	$id  = F3::get('SESSION.id');
	$cid = F3::get('SESSION.cid');
	$tid = F3::get('SESSION.tid');

	$ttid = new Axon("takip");
	$ttid->load("tid='$tid'");

	$list = preg_split('/,/', $ttid->nodes);
	$list_response = preg_split('/,/', $ttid->response);

	$nodes = array();
	foreach($list as $k=>$v) {
		$t = preg_split('/:/', $v);
		$id  = $t[0];
		$opt = $t[1];

		$ntable = new Axon("node");
		$datas = $ntable->afind("id='$id' AND cid='$cid'");
		$title = $datas[0]['title'];
		
		$resp = isset($list_response[$k]) ? $list_response[$k] : "";
		$nodes[$k] = array($id, $title, $resp);
	}

	return $nodes;
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
	$cid = F3::get('SESSION.cid');
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
?>
