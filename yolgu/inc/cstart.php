<?php
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

	F3::reroute("/show/$cid/$id/0");	
?>
