<?php
	$skey = intval(F3::get('SESSION.skey'));
	$cid  = intval(F3::get('SESSION.cid'));
	$sid  = intval(F3::get('SESSION.student'));

	$ttet = new Axon('tet');
	$datas = $ttet->afind("skey='$skey' AND cid='$cid' AND sid='$sid'");
	
	$tpuan = 100;
	foreach($datas as $i=>$t) {
		$nid = $t['nid'];

		$tnode = new Axon('node');
		$tnode->load("id=$nid");
		
		$datas[$i]['title'] = $tnode->title;

		$tpuan -= $datas[$i]['puan'];
	}

	F3::set('SESSION.tdata', $datas);
	F3::set('SESSION.tpuan', $tpuan);

	render('rapor', 'Rapor');
?>
