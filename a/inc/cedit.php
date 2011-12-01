<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$table = new Axon("ncase");
	$datas = $table->afind("id='$cid'");

	F3::set('SESSION.cdata', $datas[0]);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

    render('case', 'Düzenle');
?>
