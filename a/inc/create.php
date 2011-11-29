<?php
	$cid = F3::get('PARAMS.cid');
	$id = F3::get('PARAMS.id');

	if(strcmp($id, "new") == 0) {
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
?>
