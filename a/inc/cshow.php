<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("id='$cid'");
	$cdata = $datas[0];

	$id = $cdata['bdugumu'];
	$table2 = new Axon("node");
	$datas2 = $table2->afind("cid='$cid' AND id='$id'");

	$cdata['node_title'] = $datas2[0]['title'];

	F3::set('SESSION.cdata', $cdata);
    
	render('cshow', 'Olgu Ayrıntıları');
?>
