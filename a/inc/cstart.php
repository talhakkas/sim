<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("cid='$cid'");
	$cdata = $datas[0];

	$id = $cdata['bdugumu'];
	F3::set('SESSION.id', $id);

	// v2- takip 
	F3::set('SESSION.skey', mt_rand());
	F3::set('SESSION.stime', microtime(true));

	F3::reroute("/show/$cid/$id/1");	
?>
