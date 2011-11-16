<?php
function params2session() {
	// url den parametreleri oturuma kopyala
	$params = F3::get('PARAMS');

	unset($params[0]);	// url nin kendisi.

	foreach($params as $k=>$v) {
		F3::set("SESSION.$k", $v);
	}
}

function get_node($cid=NULL, $id=NULL) 
{
	// parametreler NULL ise SESSION dan al
	if($cid == NULL) 	$cid = F3::get('SESSION.cid');
	if($id  == NULL) 	$id  = F3::get('SESSION.id');

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");

	$node = unzip($datas[0]);

	return $node;
}

function set_node()
{
	$cid = F3::get('SESSION.cid');
	$id = F3::get('SESSION.id');

	$_POST = zip($cid, $_POST);

	/*if(get_node_type($cid, $id) == 'result')
		set_exam_dict($cid, $_POST['opts']['response']);
	*/

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

	if(my_get($_POST, 'resim_sil') == 'evet')
		$table->media = NULL;

	$table->save();
}

function get_node_type($cid, $id)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND id='$id'");

	return $tnode->ntype;
}

function get_node_id($cid, $id)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND id='$id'");

	return $tnode->nid;
}

function get_drug($did)
{
	$tdrug = new Axon('drugs');
	$tdrug->load("id='$did'");

	$drug = array();
	$drug['id'] = $tdrug->id;
	$drug['name'] = $tdrug->name;
	$drug['content'] = $tdrug->content;
	$drug['dmn'] = $tdrug->dmn;
	$drug['dmx'] = $tdrug->dmx;
	$drug['dval'] = $tdrug->dval;
	$drug['dayol'] = $tdrug->dayol;

	return $drug;
}

function get_preselected_drugs()
{
	$dict = F3::get('SESSION.data[opts][drugs]');
	$drugs = array_keys($dict);

	$tdrug = new Axon("drugs");

	$ilac_data = array();
	foreach($drugs as $i=>$id) {
		$datas = $tdrug->afind("id='$id'");
		$name  = $datas[0]['name'];

		$ilac_data[$id] = $name;
	}

	return $ilac_data;
}

function get_drug_id($cid)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND ntype='drug'");

	return $tnode->id;
}

function get_dose_id($cid)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND ntype='dose'");

	return $tnode->id;
}

function get_exam_id($cid)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND ntype='exam'");

	return $tnode->id;
}

function get_nid4type($cid, $ntype)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND ntype='$ntype'");
	
	return $tnode->id;
}

function get_node_parent($cid, $id)
{
	$tnode = new Axon("node");
	$tnode->load("cid='$cid' AND id='$id'");

	return $tnode->parent;
}

function get_drug_stamp($cid, $id=NULL)
{
	if($id  == NULL)	$id  = get_drug_id($cid);

	$tdrug = new Axon("node");
	$tdrug->load("cid='$cid' AND id='$id'");

	$td = unserialize($tdrug->options);
 	$drug_stamp = $td[0]['stamp'];

	return $drug_stamp;
}

function get_dose_stamp($cid, $id=NULL)
{
	if($id  == NULL)	$id  = get_dose_id($cid);

	$tdose = new Axon("node");
	$tdose->load("cid='$cid' AND id='$id'");

	$ts = unserialize($tdose->options);
 	$dose_stamp = $ts[0]['stamp'];

	return $dose_stamp;
}

function set_dose_stamp($cid, $id=NULL, $drug_stamp=NULL)
{
	if($id  == NULL)	$id  = get_dose_id($cid);
	if($drug_stamp == NULL) $drug_stamp = get_drug_stamp($cid);

	$tdose = new Axon("node");
	$tdose->load("cid='$cid' AND id='$id'");

	$ts = unserialize($tdose->options);

 	$ts[0]['stamp'] = $drug_stamp;

	$tdose->options = serialize($ts);
	$tdose->save();
}

function check_stamp($cid, $did=NULL, $dsid=NULL, $dbg=false)
{
	if($did  == NULL)	$did  = get_drug_id($cid);
	if($dsid == NULL)	$dsid = get_dose_id($cid);

	$drug_stamp = get_drug_stamp($cid, $did);
	$dose_stamp = get_dose_stamp($cid, $dsid);

	if($dbg) echo "stamp: drug=$drug_stamp, dose=$dose_stamp<br>";
	
	return strcmp($drug_stamp, $dose_stamp);
}	

function get_dnid()
{
	/* see also: get_enid4result() */
	$node = get_node();

	$dnid = my_get($node, 'parent');

	if($dnid == "") $dnid = get_drug_id($node['cid']);

	return $dnid;
}

function get_tea_sel_drugs($cid=null, $id=null)
{
	$cid = ($cid == null) ? F3::get('SESSION.cid') : $cid;
	$id  = ($id  == null) ? F3::get('SESSION.id')  : $id;

	$node = get_node($cid, $id);

	return $node['opts']['drugs'];
}

function set_dose_drug_list($cid, $id, $dslist) 
{
	$dnid = get_drug_id($cid);

	$tdose = new Axon("node");
	$tdose->load("cid='$cid' AND id='$id'");

	$dict = unserialize($tdose->options);
	$dict[0]['response'] = $dslist;

	if(isset($dict[0]['dnid']))	$dict[0]['dnid'] = $dnid;
	if(isset($dict[0]['odul']))	$dict[0]['odul'] = "";
	if(isset($dict[0]['ceza']))	$dict[0]['ceza'] = "";

	$tdose->options = serialize($dict);
	$tdose->save();
}

function get_exam_list($cid, $nid, $dbg=false)
{
	if($dbg)	echo "cid=$cid, nid=$nid <br>";

	$node = get_node($cid, $nid);
	$dict = $node['opts'][0]['response'];

	if($dbg)	print_pre($dict, "dict");

	return $dict;
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
	$opt = F3::get('SESSION.opt');

	$ntype = get_node_type($cid, $id);

	if($ntype == 'drug') {
		$t = my_get($_POST, 'drugs');
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
	} elseif($ntype == 'exam') {
		$dict['response'] = get_exams_csv($_POST);
	} else {
		$dict['response'] = my_get($_POST, 'response');
	}
	
	$ttet->soylenen = serialize($dict);
	//$ttet->beklenen = serialize(get_tet_beklenen_yanit($cid, $id, $opt));

	$ttet->zaman = microtime(true) - F3::get('SESSION.stime');

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
			$response = preg_split('/,/', $response);

			foreach($response as $j=>$did) {
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/a/drug/$did>$t[name]</a><br>";
			}
			break;
		case 'dose':
			foreach($response as $j=>$d) {
				$did = $d['id'];

				$ayol = array(1=>"Damar", 2=>"Kas", 3=>"Foo");
	
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/a/drug/$did>$t[name]</a>-$d[dval] ($d[dmn]-$d[dmx])" .$ayol[$d['dayol']]. "<br>";
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
				$str .= strval($j+1) . ": <a href=/a/drug/$did>$t[name]</a><br>";
			}
			break;
		case 'dose':
			foreach($response as $j=>$d) {
				$did = $d['did'];

				$ayol = array(1=>"Damar", 2=>"Kas", 3=>"Foo");
	
				$t = get_drug($did);
				$str .= strval($j+1) . ": <a href=/a/drug/$did>$t[name]</a>-$d[doz] - ". $ayol[$d['ayol']] ." <br>";
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
		create_new_node($cid, "dal", null, 1);
		
		$table = new Axon("node");
		$list = $table->afind("id AND cid='$cid'", "id asc");
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
	$datas['opts'] = unserialize($datas['options']);

	return $datas;
}

function zip($cid, $datas, $dbg=true) 
{
	if($dbg) print_pre($datas, 'datas');
	
	$id = $datas['id'];
	$node = get_node($cid, $id);

	if($dbg) print_pre($node);

	$dict = array();

	if($datas['ntype'] == 'drug') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );
		
		$ndict = array();
		$tdrug = new Axon('drugs');

		$csv = $datas['drugs'];
		$drugs = preg_split('/,/', $csv);
		foreach($drugs as $i=>$did) {
			$tmp = $tdrug->afind("id='$did'");

			$ndict[$did] = array("name" => $tmp[0]['name'],
								 "dmn"  => $tmp[0]['dmn'],
								 "dmx"  => $tmp[0]['dmx'],
								 "dval" => $tmp[0]['dval'],
								 "dayol"=> $tmp[0]['dayol']
								);
		}

		// ndict olup, odict (node['opts']['drugs'])'te olmayanları odict e
		// ekle ndict'te olmayıp, odict'te olanları odict'ten sil
		$dict['drugs'] = liste_senkronla($node['opts']['drugs'], $ndict);

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);
	} elseif($datas['ntype'] == 'dose') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "response"  => "drug:opts:drugs a bakin",
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);

		// dose:parent uzerinden drug:opts:drugs i guncelle
		$dnid = $datas['parent'];
		$tdrug = new Axon('node');
		$tdrug->load("id='$dnid'");
		$opts = unserialize($tdrug->options);

		foreach($opts['drugs'] as $did=>$drug) {
			$ind = array_search($did, $datas['did']);

			$opts['drugs'][$did]['dval']  = $datas['dval'][$ind];
			$opts['drugs'][$did]['dayol'] = $datas['dayol'][$ind];
		}

		$tdrug->options = serialize($opts);
		$tdrug->save();		
	} elseif($datas['ntype'] == 'exam') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );

		$dict['exams'] = liste_senkronla($node['opts']['exams'], get_exams_dict($cid, $datas));

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);
	} elseif($datas['ntype'] == 'result') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "response"  => "exam:opts:exams e bakin",
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);
		
		// once resimleri upload et!
		$emedia = array();

		$sz = count(F3::get('FILES.evalue.name'));
	
		for($i=0; $i<$sz; $i++) {
			$nm = F3::get("FILES.evalue.name[$i]");
			$eid = F3::get("POST.eid[$i]");
	
				if($nm != "") {
					$fnm = "_e_". sprintf("%06d", $eid) . ".jpg";
					$ffnm = F3::get('uploaddir') . $fnm;
					if(yukle2($ffnm, "evalue.tmp_name[$i]", true))
						$emedia[$eid] = $fnm;
					else 
						$emedia[$eid] = "default.jpg";
				}
		}
		// result:parent uzerinden exam:opts:exams i guncelle
		$enid = $datas['parent'];
		$texam = new Axon('node');
		$texam->load("cid='$cid' AND id='$enid'");
		$opts = unserialize($texam->options);

		foreach($opts['exams'] as $eid=>$exam) {
			$ind = array_search($eid, $datas['eid']);

			if(isset($emedia[$eid]))
				$opts['exams'][$eid]['value'] = $emedia[$eid];
		}

		$texam->options = serialize($opts);
		$texam->save();
	} elseif($datas['ntype'] == 'bmap') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );
		$nid = get_node_id(F3::get('SESSION.cid'), F3::get('SESSION.id'));
		$fnm = sprintf("%06d.jpg", $nid);

		if(F3::get("FILES.bmap_img.name") != "") {
			$ffnm = F3::get('uploaddir') . $fnm; 
			if(yukle2($ffnm, "bmap_img.tmp_name", true))
				$img_nm = $fnm;
			else
				$img_nm = "body_map.jpg";
		}
		else 	//node:bmap:opts:bmap:img dekini kullan!
			$img_nm = $fnm;

		$dict['img'] = $img_nm;
		$dict['map'] = htmlspecialchars(trim($datas['bmap_map']));

		$dict['bmap'] = array();
		$tmp = map2dict($dict['map']);
		foreach($tmp as $i=>$m) {
			$dict['bmap'][$i] = array("name"  => $m['name'],
									  "value" => "null");
		}
	 	$datas['opts'] = $dict;
		$datas['options'] = serialize($dict); 
	} elseif($datas['ntype'] == 'bmapr') {
		$dict = array("link_text" => $datas['link_text'],
					  "node_link" => $datas['node_link'],
					  "response"  => "bmap:opts:bmap e bakin",
					  "odul"      => $datas['odul'],
					  "ceza"      => $datas['ceza']
					 );

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);
		
		// once resimleri upload et!
		$bmedia = array();

		$sz = count(F3::get('FILES.bvalue.name'));
	
		for($i=0; $i<$sz; $i++) {
			$nm = F3::get("FILES.bvalue.name[$i]");
			$bid = F3::get("POST.bid[$i]");
	
				if($nm != "") {
					$fnm = "_b_". sprintf("%06d", $bid) . ".jpg";
					$ffnm = F3::get('uploaddir') . $fnm;
					if(yukle2($ffnm, "bvalue.tmp_name[$i]", true))
						$bmedia[$bid] = $fnm;
					else 
						$bmedia[$bid] = "default.jpg";
				}
		}
		// bmapr:parent uzerinden bmap:opts:bmap i guncelle
		$bnid = $datas['parent'];
		$tbmap = new Axon('node');
		$tbmap->load("cid='$cid' AND id='$bnid'");
		$opts = unserialize($tbmap->options);

		foreach($opts['bmap'] as $bid=>$val) {
			$ind = array_search($bid, $datas['bid']);

			if(isset($bmedia[$bid]))
				$opts['bmap'][$bid]['value'] = $bmedia[$bid];
		}

		$tbmap->options = serialize($opts);
		$tbmap->save();
	} elseif($datas['ntype'] == 'immapr') {
		$dict = array();
		$dict['link_text'] = $datas['link_text'];
		$dict['node_link'] = $datas['node_link'];
		$dict['odul'] = $datas['odul'];
		$dict['ceza'] = $datas['ceza'];

		$dict['map'] = array('x' => $datas['x'],  'y' => $datas['y'],
				       'x2'=> $datas['x2'], 'y2'=> $datas['y2'],
				       'w' => $datas['w'],  'h' => $datas['h'],
				       'yorum' => $datas['response']);

		$datas['opts'] = $dict;
		$datas['options'] = serialize($dict);
	} else {
		$sz = sizeof($datas['link_text']);
		
		$chkR = array_pad(array(), $sz, 'no');
		if(isset($datas['chkResponse'])) {
			$sz_chk = sizeof($datas['chkResponse']);
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
	
		$dict[0]['stamp'] = microtime();
		if($dbg) print_pre($dict, 'dict');

		$datas['options'] = serialize($dict);

		$datas = unset_arr($datas, array('link_text', 'node_link', 'response', 'chkResponse',
		  								 'odul', 'ceza'));
	}										

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
			$datas['opts'] = array(
				0=>array('link_text'=>'', 'node_link'=>1, 'odul'=>'', 'ceza'=>'')
			);
			F3::set('SESSION.nofbs', 1);

			break;
	}

	$datas['id'] = F3::get('SESSION.id');
	$datas['cid'] = F3::get('SESSION.cid');

	F3::set('SESSION.data', $datas);
}

function create_new_node($cid, $ntype, $parent=null, $id=null)
{
	$id = ($id == null) ? (maxID("id", "node") + 1) : $id;

	/* "ntype" turunde yeni bir dugum olustur */
	$table = new Axon("node");
	$table->nid = NULL;
	$table->cid = $cid;
	$table->id  = $id;
	$table->title = "new"; 
	$table->ntype = $ntype;
	
	$table->media = "";		$table->content= "";	$table->question = "";
	$table->parent = $parent; 	$table->isOnset = null;	$table->isWrong = null;
	
	$dict = array();

	switch($ntype) {
		case "dal":
			$dict = array(0 => array("link_text"  => "Sonraki aşama", 
						 "node_link"  => $id,
					 	 "response"   => "",
						 "chkResponse"=> "no",
						 "odul"       => "", 
						 "ceza"       => "") );
			break;
		case "drug": 
			$dict = array("link_text"  => "Doz Seçimine Geçiniz", 
			 	      "node_link"  => create_new_node($cid, "dose", $id, $id+1),
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "drugs"      => array());
			break;
		case "dose": 
			$dict = array("link_text"  => "Sonraki aşama", 
			 	      "node_link"  => $id, 
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "response"   => "drug:opts:drugs a bakin");
			break;
		case "exam":
			$dict = array("link_text"  => "Tahlil Girmeye Geçiniz", 
			 	      "node_link"  => create_new_node($cid, "result", $id, $id+1),
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "exams"      => array());
			break;
		case "result":
			$dict = array("link_text"  => "Sonraki aşama", 
			 	      "node_link"  => $id, 
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "response"   => "exam:opts:exams e bakin");
			break;
		case "bmap":
			$dict = array("link_text"  => "Vücut Bölgesi Verilerini Girmeye Geçiniz", 
			 	      "node_link"  => create_new_node($cid, "bmapr", $id, $id+1),
			 	      "odul"       => "", 
			 	      "ceza"       => "",
					  "img"		  => "",
					  "map"		  => "",	
				      "bmap"      => array());
			break;
		case "bmapr":
			$dict = array("link_text"  => "Sonraki aşama", 
			 	      "node_link"  => $id, 
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "response"   => "bmap:opts:bmap e bakin");
			break;
		case "immap":
			$dict = array("link_text"  => "Resim Üzeri Bölge Seçimi ve Durum Raporlama Geçiniz", 
			 	      "node_link"  => create_new_node($cid, "immapr", $id, $id+1),
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "immap"      => array()); // FIXME: ilgili düğümü düzelt
			break;
		case "immapr":
			$dict = array("link_text"  => "Sonraki aşama", 
			 	      "node_link"  => $id, 
			 	      "odul"       => "", 
			 	      "ceza"       => "",
				      "response"   => "immap:opts:immap e bakin");
			break;
	}

	$table->options = serialize($dict);
	$table->save();
	
	/* TODO: parent'in (olusturulmussa) node_link ini ayarla
	 * "new-type-nid-opt" <- bu iyi degil!
	 */
	if($parent != null && $id != $parent) {
		$tpar = new Axon("node");
		$tpar->load("cid='$cid' AND id='$parent'");
		
	}

	return $table->id;
}

function node_init($cid=NULL)
{
		if($cid == NULL) $cid = F3::get('SESSION.cid');

		$table = new Axon("node");
		$table->nid = NULL;
		$table->cid = $cid;
		$table->id  = maxID("id", "node") + 1;
		$table->title = "new"; $table->media = "";
		$table->content= "";$table->question = "";
		
		$dict = array( array("link_text"=> "dt1", "node_link"=>1,
							 "response" => "",    "chkResponse"=> "no",
							 "odul"=>"", "ceza"=>"") );

		$table->options = serialize($dict);
		
		$table->ntype = "dal";
		$table->parent = 1; $table->isOnset = 1;
		$table->isWrong = 0;
		$table->save();
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

	$odul = empty($datas['opts'][$opt]['odul']) ? 0 : intval($datas['opts'][$opt]['odul']);
	$ceza = empty($datas['opts'][$opt]['ceza']) ? 0 : intval($datas['opts'][$opt]['ceza']);

	$puan = $odul - $ceza;

	return $puan;
}

function print_pre($code, $msj="array") 
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

function get_exams_csv($arr)
{
	$dict = array();

	foreach($arr as $k=>$v) {
		if(preg_match('/response/', $k)) {
			foreach($v as $i=>$id)
				$dict[$id] = true;
		}
	}

	$t = array_keys($dict);
	$csv = implode(",", $t);

	return $csv;
}

function get_exams($arr) // !SIL
{
	$dict = array();

	foreach($arr as $k=>$v) {
		if(preg_match('/response/', $k)) {
			foreach($v as $i=>$id)
				$dict[$id] = true;
		}
	}

	//print_pre($arr, "post");
	//print_pre($dict, "dict"); return;
	return $dict;
}

function get_st_sel_exams($dbg=false)
{
	/* ogrencinin sectigi tahlilleri goster 
	 * - secilen tahlil hoca tarafindan da secildiyse onu
	 *    + node:exam'den sorgulanacak
	 * - degilse ontanimli veriyi yukle
	 *    + sql:sim:survey tablosundan sorgulanacak 
	 *
	 * $_POST üzerinden secimler soylenecek.
	 */
	$cid = F3::get('SESSION.cid');
	$id  = F3::get('SESSION.id');		// result node id
	$enid = get_node_parent($cid, $id); // exam   node id

	$csv = get_exams_csv($_POST);

	if($csv == "") {
		F3::set('SESSION.error', 'Herhangi bir tahlil seçilmemiş');
		return;
	}
	
	$ss_exams = preg_split('/,/', $csv);
	if($dbg)	print_pre($ss_exams, "ogr: sectigi tahliller");
	
	$ts_exams = get_tea_sel_exams($cid, $enid);
	if($dbg)	print_pre($ts_exams, "hoca: sectigi tahliller");

	$results = array();

	foreach($ss_exams as $i=>$eid) {
		if(array_key_exists($eid, $ts_exams))
			$results[$eid] = $ts_exams[$eid];
		else {
			$results[$eid] = get_exam_info($cid, $eid);
		}
	}
	if($dbg) 	print_pre($results, "results");

	return $results;
}

function get_exams_dict($cid, $arr) 
{
	// FIXME:node:exam de varsa o resmi, yoksa default resmi goster
	$dict = array();

	$csv = get_exams_csv($arr);
	$list = preg_split('/,/', $csv);

	if($csv == "") {
		F3::set('SESSION.error', 'Herhangi bir tahlil seçilmemiş');
		return $arr;
	}

	foreach($list as $i=>$eid) {
		$dict[$eid] = get_exam_info($cid, $eid);
	}

	return $dict;
}

function get_tea_sel_exams($cid, $enid) 
{
	$node = get_node($cid, $enid);

	$dict = $node['opts']['exams'];
	
	return $dict;
}

function get_tea_sel_bmap($cid, $bnid) 
{
	/* deger yuklenmemis (null) olanlari filtrele */
	$node = get_node($cid, $bnid);

	$dict = $node['opts']['bmap'];
	
	foreach($dict as $i=>$d) {
		if($d['value'] == 'null')
			unset($dict[$i]);
	}
	
	return $dict;
}

function get_tea_sel_dal($cid, $id, $opt)
{
	/* hocanin secilen dal icin bekledigi yanit */
	$node = get_node($cid, $id);
	$t = $node['opts'][$opt];

	$dict = $t['chkResponse'] == 'yes' ? $t['response'] : "Boş";

	return $dict;
}

function get_stu_sel_dose($arr)
{
	/* did - doz - ayol */
	$dict = array();

	foreach($arr['did'] as $i=>$did) {
		$dict[$did] = array("doz"=>$arr['doz'][$i], "ayol"=>$arr['ayol'][$i]);
	}

	return $dict;
}

function get_stu_sel_bmap($cid, $bnid, $sbind)
{
	/* secilen bolgelerin (sbind: indis) degerlerini dondurur. 
	 * - bolgeleri cek
	 * - sbind olanlari filtrele 
	 */
	$node = get_node($cid, $bnid);

	$dict = $node['opts']['bmap'];

	$rdict = array();
	foreach($sbind as $i=>$si) {
		$rdict[$si] = $dict[$si];
	}

	return $rdict;
}

function get_exam_info($cid, $eid, $dbg=false)
{
	$dict = get_dps_id_helper($eid);
	$did = $dict['did'];		$edid = $did;
	$pid = $dict['pid'];		$epid = $did . $pid;
	$sid = $dict['sid'];		$esid = $did . $pid . $sid;

	if($dbg)	echo "DEBUG: eid=$eid,  did=$did,  pid=$pid,  sid=$sid <br>";
	if($dbg)	echo "DEBUG: eid=$eid, edid=$edid,epid=$epid,esid=$esid<br>";

    $discs = DB::sql("select * from discipline WHERE id='$edid'");
    $parnt = DB::sql("select * from parent     WHERE id='$epid'");
    $survs = DB::sql("select * from survey     WHERE id='$esid'");

	if($dbg)	print_pre($discs, "DEBUG: discs");
	if($dbg)	print_pre($parnt, "DEBUG: parnt");
	if($dbg)	print_pre($survs, "DEBUG: survs");

	$dnm = $discs[0]['name'];
	$pnm = $parnt[0]['name'];
	$snm = $survs[0]['name'];
	$fnm = "$dnm:$pnm:$snm";

	$stype = $survs[0]['stype'];

	if($dbg)	echo "<h2>$dnm=>$pnm=>$snm</h2>";

    $exam = DB::sql("select * from exam     WHERE cid='$cid' AND sid='$esid'");

	if(count($exam) == 0) { // ontanimli degeri kullan.
		$exam = $survs;
	}
	
	if($dbg)	print_pre($exam, "DEBUG: exam");

	$value = isset($exam[0]['value']) ? $exam[0]['value'] : 'default.jpg';

	if($value == 'null') $value = 'default.jpg';

	if($dbg)	echo "<img src=/a/upload/$value>";

	$info = array('eid' => $eid, 'cid' => $cid, 
				  'did' => $did, 'pid' => $pid, 'sid' => $sid,
				  'dnm' => $dnm, 'pnm' => $pnm, 'snm' => $snm,
				  'stype' => $stype, 	
				  'value' => $value);

	return $info;
}

function tamamla($id, $len){
    return str_pad((string)$id, $len, "0", STR_PAD_LEFT);
}

function get_dps_id_helper($str)
{
	/* dps (discipline, parent, survey) id degerlerini "dict" olarak döndürür.
	 * $str boyutu 2-4-6 (veya 1-3-5 dir tamamlanir) olabilir. 
	 * len($str)==2 ise sadece $dict['did'] vardır.
     * len($str)==6 ise $dict['did'], $dict['pid'] ve $dict['sid'] vardır.
	 */
	$str = strval($str);
													
	$dict = array();
	
	$sz = strlen($str);

	if($sz < 1) 		{echo "ERROR: bos string geldi.";	return -1;}

	if($sz < 3) 		$str = tamamla($str, 2);
	elseif($sz < 5)		$str = tamamla($str, 4);
	elseif($sz < 7)		$str = tamamla($str, 6);
	else				{echo "ERROR: gecersiz string girdisi. strlen($str) in [1,6] olmaliydi";	return -1;}

	$sz = strlen($str);
	switch($sz) {
		case 2:
			$dict['did'] = substr($str, 0, 2);		// $dict['did'] = $str;
			break;
		case 4:
			$dict['did'] = substr($str, 0, 2);
			$dict['pid'] = substr($str, 2, 2);
			break;
		case 6:
			$dict['did'] = substr($str, 0, 2);
			$dict['pid'] = substr($str, 2, 2);
			$dict['sid'] = substr($str, 4, 2);
			break;
	}

	return $dict;
}

function get_dps_id($str, $idnm)
{
	/* get_dps_id_helper i kullanarak idnm de istenen id yi geri dondurur.
     * Or. get_dps_id("010203", "pid") -> "02" dondurur.
	 *
	 * idnm: did, pid, sid degerlerini alabilir.
	 */

	$dict = get_dps_id_helper($str);
	
	return $dict[$idnm];
}

function liste_senkronla($old, $new)
{
	/* $old listesinde, $new'de olanlar korunur veya $new'den eklenir ve
	 * $new'de olmayanlar ise silinir.
	 * `key` e bakilarak karar verilir.
	 */
	foreach($new as $id=>$val)
		if(!array_key_exists($id, $old))
			$old[$id] = $val;
	
	foreach($old as $id=>$val)
		if(!array_key_exists($id, $new))
			unset($old[$id]);
	
	return $old;
}

function set_exam_dict($cid, $dict)
{
	$id = get_exam_id($cid);

	$tnode = new Axon('node');
	$tnode->load("cid='$cid' AND id='$id'");

	$tmp = unserialize($tnode->options);

	$resp = $tmp[0]['response'];

	foreach($dict as $eid=>$v) {
		$resp[$eid]['value'] = $v['value'];
	}

	$tmp[0]['response'] = $resp;

	$tnode->options = serialize($tmp);

	$tnode->save();
}

function get_immap_imgnm($cid, $nid=NULL)
{
	if($nid == NULL) $nid = get_nid4type($cid, 'immap');

	$node = get_node($cid, $nid);

	return $node['media'];
}

function get_immapr4hoca($cid, $nid=NULL) 
{
	if($nid == NULL) $nid = get_nid4type($cid, 'immapr');

	$node = get_node($cid, $nid);

	$dict = $node['opts']['map'];
	
	$dict['imgnm'] = get_immap_imgnm($cid);

	return $dict;
}

function get_immapr4ogrenci($arr)
{
	$dict = array('x' => my_get($arr, 'x'),  'y' => my_get($arr, 'y'),
		      'x2'=> my_get($arr, 'x2'), 'y2'=> my_get($arr, 'y2'),
		      'w' => my_get($arr, 'w'),  'h' => my_get($arr, 'h'),
		      'yorum' => my_get($arr, 'response'));

	return $dict;
}

function map2dict($map, $dbg=false) 
{
	/* http://www.maschek.hu/imagemap/imgmap adresinde olusturulan kodu ('map')
	 * alan ve $dict[id] = {name, coords,...} sozlugunu olusturur */
	$dict = array();

	if($map == "")	return $dict;

	$html = str_get_html(htmlspecialchars_decode($map));

	foreach($html->find('area') as $i => $element) {
		$dict[$i] = array("name" 	=> $element->alt,
						  "coords" 	=> $element->coords,
						  "shape" 	=> $element->shape,
						  "href" 	=> ($element->href == "") ? "#":$element->href ,
						  "target"	=> $element->target);
	}

	if($dbg)	print_pre($dict);
	
	return $dict;
}

function get_tet_beklenen_yanit($cid, $id, $opt=null, $dbg=true)
{
	/* cid,id,opt yardimiyla dugum turu de dikkate alinarak hocanin
	 * girdigi/beklenen degeri sozluk yardimiyla dondur.
	 */
	$dict = array();

	if($dbg) {
		$node = get_node($cid, $id);
		print_pre($node, 'NODE');
	}
	
	$ntype = get_node_type($cid, $id);
	$dict['ntype'] = $ntype;

	switch($ntype) {
		case 'dal':
			$dict['dal']   = get_tea_sel_dal($cid, $id, $opt);
			break;
		case 'drug':
			$dict['drugs'] = get_tea_sel_drugs($cid, $id);
			break;
		case 'dose':
			$dict['drugs'] = get_tea_sel_drugs($cid, get_node_parent($cid, $id));
			break;
		case 'exam':
			$dict['exams'] = get_tea_sel_exams($cid, $id);
			break;
		case 'result':
			$dict['exams'] = get_tea_sel_exams($cid, get_node_parent($cid, $id));
			break;
		case 'bmap':
			$dict['bmap']  = get_tea_sel_bmap($cid, $id);
			break;
		case 'bmapr':
			$dict['bmap']  = get_tea_sel_bmap($cid, get_node_parent($cid, $id));
			break;
		case 'immap':
			break;
		case 'immapr':
			break;
	}

	return $dict;
}

function get_tet_soylenen_yanit($arr, $dbg=true)
{
	/* arr(=POST) ile ogrencinin verdigi yanit dict olarak dondurulur
	 */
	$ntype = $arr['ntype'];

	$dict = array();

	switch($ntype) {
		case 'dal':
			$dict['dal']   = $arr['response'];
			break;
		case 'drug':
			$dict['drugs'] = $arr['drugs'];
			break;
		case 'dose':
			$dict['drugs'] = get_stu_sel_dose($arr);
			break;
		case 'exam':
			$dict['exams'] = get_tea_sel_exams($cid, $id);
			break;
		case 'result':
			$dict['exams'] = get_tea_sel_exams($cid, get_node_parent($cid, $id));
			break;
		case 'bmap':
			$dict['bmap']  = get_tea_sel_bmap($cid, $id);
			break;
		case 'bmapr':
			$dict['bmap']  = get_tea_sel_bmap($cid, get_node_parent($cid, $id));
			break;
		case 'immap':
			break;
		case 'immapr':
			break;
	}

	return $dict;
}
?>
