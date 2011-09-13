<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id  = F3::get('PARAMS.id')  ? F3::get('PARAMS.id') :1;
	$opt = F3::get('PARAMS.opt') ? F3::get('PARAMS.opt'):1;
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id' , $id);
	F3::set('SESSION.opt', $opt);

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
		$ttid->nodes = "$id:$opt";
	else
		$ttid->nodes = "$ttid->nodes , $id:$opt";

	$kullanici_yaniti = empty($_POST['response'])?"":$_POST['response'];

	$ttid->response = $ttid->response . $kullanici_yaniti . ",";
	$ttid->save();

	// takip listesini template gonder
	$list = preg_split('/,/', $ttid->nodes);
	$list_response = preg_split('/,/', $ttid->response);


	$nodes = array();
	foreach($list as $k=>$v) {
		$t = preg_split('/:/', $v);
		$id  = $t[0];
		$opt = $t[1];

		$tid = new Axon("node");
		$datas = $table->afind("id='$id' AND cid='$cid'");

		$title = $datas[0]['title'];
		
		$resp = isset($list_response[$k])?$list_response[$k]:"";
		$nodes[$k] = array($id, $title, $resp);
	}
	
	F3::set('SESSION.tdata', $nodes);

	/*echo "<pre>";print_r($data['nodes']);return;
	$beklenen_yanit = $data['nodes'][$opt]['IA'];
	if($beklenen_yanit == $kullanici_yaniti && $beklenen_yanit <> "") {
		echo "DOGRU";return;
	}

	echo "beklenen=$beklenen_yanit, kullanici=$kullanici_yaniti<br>";
*/
	render('show', 'Olgu');
?>
