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

function set_node()
{
	$cid = F3::get('SESSION.cid');
	$id = F3::get('SESSION.id');

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
}

function get_node_type($cid, $id)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND id='$id'");

	return $tnode->ntype;
}

function get_drug($did)
{
	$tdrug = new Axon('drugs');
	$tdrug->load("id='$did'");
	
	$drug = array();
	$drug['id'] = $tdrug->id;
	$drug['name'] = $tdrug->name;
	$drug['content'] = $tdrug->content;

	return $drug;
}

function get_preselected_drugs()
{
	$drugs = F3::get('SESSION.data[nodes][0][response]');
	$drug = preg_split('/,/', $drugs);

	$tdrug = new Axon("drugs");

	$ilac_data = array();
	foreach($drug as $i=>$id) {
		$datas = $tdrug->afind("id='$id'");
		$name  = $datas[0]['name'];

		$ilac_data[$id] = $name;
	}

	return $ilac_data;
}

function takip_listesine_ekle() {
	// a) su anki dugum icin 'tet' girdisi olustur. "beklenen" ve "soylenen" bos, simdilik
	$ttet = new Axon("tet");
	$ttet->id = NULL;
	$ttet->skey = intval(F3::get('SESSION.skey'));
	$ttet->sid = intval(F3::get('SESSION.student'));
	$ttet->cid = F3::get('SESSION.cid');
	$ttet->nid = F3::get('SESSION.id');
	$ttet->oid = "";
	$ttet->beklenen = "";
	$ttet->soylenen = "";
	$ttet->zaman = 0;
	$ttet->puan = 0;
	$ttet->save();

	// b) '$_POST' tan gelen veriyle onceki dugumun "beklenen" ve "soylenen" kisimlarini guncelle
	$dict = array();
	// bir onceki dugum id sini bul
	$mid = maxID_v2("id", "tet", "skey=$ttet->skey AND sid=$ttet->sid");
	$mid--;

	if($mid == 0)	// ilk dugum!
		return;

	$ttet = new Axon("tet");
	$ttet->load("id=$mid");
	$cid = $ttet->cid;
	$id  = $ttet->nid;

	//$dict['beklenen_yanit'] = my_get($_POST, 'beklenen_yanit');

	$ntype = get_node_type($cid, $id);

	if($ntype == 'drug') {
		$t = my_get($_POST, 'response');
		$dlist = preg_split('/,/', $t);

		foreach($dlist as $i=>$did) {
			$dict['response'][$i] = $did;
		}
	} elseif($ntype == 'dose') {
		foreach(my_get($_POST, 'doz') as $i=>$d) {
			$dict['response'][$i]['did']  = $_POST['did'][$i];
			$dict['response'][$i]['doz']  = $_POST['doz'][$i];
			$dict['response'][$i]['ayol'] = $_POST['ayol'][$i];
		}
	} else {
		$dict['response'] = my_get($_POST, 'response');
	}
	
	$ttet->soylenen = serialize($dict);
	$ttet->zaman = microtime(true) - F3::get('SESSION.stime');

	$opt = F3::get('SESSION.opt');
	$ttet->oid = $opt;

	$ttet->puan = get_puan($cid, $id, $opt);
	$ttet->save();
	return;

	$kullanici_yaniti  = empty($_POST['response']) ? "" : "resp::".$_POST['response'].",,";
	$kullanici_yaniti .= empty($_POST['doz'])  ? "" : "doz::". myserialize($_POST['doz']) . ",,";
	$kullanici_yaniti .= empty($_POST['ayol']) ? "" : "ayol::".myserialize($_POST['ayol']);

	$ttet->beklenen = ""; //$beklenen_yanit;
	$ttet->soylenen = $kullanici_yaniti;
	$ttet->zaman = microtime(true) - F3::get('SESSION.stime');

	$opt = F3::get('SESSION.opt');
	$ttet->puan = get_puan($cid, $id, $opt);
	$ttet->save();

	return;
}

function response2str_bek($response, $ntype)
{
	$str = '';
	switch($ntype) {
		case 'drug':
			foreach($response as $j=>$did) {
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/yolgu/drug/$did>$t[name]</a><br>";
			}
			break;
		case 'dose':
			foreach($response as $j=>$d) {
				$did = $d['did'];

				$ayol = array(1=>"Damar", 2=>"Kas", 3=>"Foo");
	
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/yolgu/drug/$did>$t[name]</a>-$d[dval] ($d[dmn]-$d[dmx])" .$ayol[$d['ayol']]. "<br>";
			}
			break;
		default:
			$str = $response;
	}

	return $str;
}

function response2str_soy($response, $ntype)
{
	$str = '';
	switch($ntype) {
		case 'drug':
			foreach($response as $j=>$did) {
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/yolgu/drug/$did>$t[name]</a><br>";
			}
			break;
		case 'dose':
			foreach($response as $j=>$d) {
				$did = $d['did'];

				$ayol = array(1=>"Damar", 2=>"Kas", 3=>"Foo");
	
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/yolgu/drug/$did>$t[name]</a>-$d[doz] - ". $ayol[$d['ayol']] ." <br>";
			}
			break;
		default:
			$str = $response;
	}

	return $str;
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

function unzip($datas)
{
	/* 'content' kisminda accordion koymak icin format turetildi.
	 * 	accordion = header + content
     */
	if(empty($datas['content'])) $datas['content'] = "::";
	$content = preg_split("/,,/", $datas['content']);

	foreach($content as $k=>$v) {
		$t = preg_split("/::/", $v);

		$datas['content_acc'][$k]['header'] = $t[0];
		$datas['content_acc'][$k]['content'] = empty($t[1]) ? "NULL" : $t[1];
	}
	//unset($datas['content']);

	/* 'options' kisminda **onceden** stringler ile kendi serilestirmemi
	 * uretmistim. Simdi dictionary turunde tutulacak ve serialize/unserialize
	 * ile serileştirilecek.
	 */
	$datas['nodes'] = unserialize($datas['options']);

	return $datas;
}

function zip($datas, $dbg=false) 
{
	if($dbg) print_pre($datas, 'datas');

	$dict = array();

	$sz = sizeof($datas['link_text']);
	
	$chkR = array_pad(array(), $sz, 'no');
	$sz_chk = sizeof($datas['chkResponse']);
	if($sz_chk > 0) {
		$arr = $datas['chkResponse'];

		for($i=0; $i < $sz_chk; $i++) {
			$j = $arr[$i] - 1;
			$chkR[$j] = 'yes';
		}
	}
	$datas['chkResponse'] = $chkR;

	for($i=0; $i < $sz; $i++) {
		$dict[$i] = array(
						'link_text' => my_get2($datas, 'link_text', $i),
						'node_link' => my_get2($datas, 'node_link', $i),
						'response'  => my_get2($datas, 'response',  $i),
						'chkResponse'=>my_get2($datas, 'chkResponse',$i),
						'odul'      => my_get2($datas, 'odul',      $i),
						'ceza'      => my_get2($datas, 'ceza',      $i)
						 );	

		if($dict[$i]['chkResponse'] == 'no') {
				$dict[$i]['response'] = '';
		}
	}
	
	$datas['options'] = serialize($dict);

	$datas = unset_arr($datas, array('link_text', 'node_link', 'response', 'chkResponse',
									 'odul', 'ceza'));

	if($dbg) print_pre($datas, 'datas');

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
				0=>array('link_text'=>'', 'node_link'=>1, 'odul'=>'', 'ceza'=>'')
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

function maxID_v2($idnm, $tablenm, $kisitlama) {
	DB::sql("select max($idnm) from $tablenm where $kisitlama");
        $res = F3::get("DB->result");
        $mid = $res[0]["max($idnm)"];

	return intval($mid);
}

function myserialize($arr) {
	$str = "";

	foreach($arr as $i=>$v) {
		$str .= "$v--";
	}

	return $str;
}

function get_puan($cid, $id, $opt) {
	$opt--;

	$tnode = new Axon('node');
	$datas = $tnode->afind("cid='$cid' AND id='$id'");

	$datas = unzip($datas[0]);

	$odul = empty($datas['nodes'][$opt]['odul']) ? 0 : intval($datas['nodes'][$opt]['odul']);
	$ceza = empty($datas['nodes'][$opt]['ceza']) ? 0 : intval($datas['nodes'][$opt]['ceza']);

	$puan = $odul - $ceza;

	return $puan;
}

function print_pre($code, $msj) 
{
	echo "$msj = ";
	echo "<pre>";
	print_r($code);
	echo "</pre>";
}

function my_get($arr, $key) 
{
	return array_key_exists($key, $arr) ? $arr[$key] : "";
}

function my_get2($arr, $key, $i) 
{
	return array_key_exists($key, $arr) ? (array_key_exists($i, $arr[$key]) ? $arr[$key][$i] : "") : "";
}

function unset_arr($arr, $keys)
{
	/* $arr1 icinde $keys de ki her bir keyi unset et */
	foreach($keys as $i=>$k) {
		unset($arr[$k]);
	}

	return $arr;
}
?>
