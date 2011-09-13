<?php
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
?>
