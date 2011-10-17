<?php
	$skey = intval(F3::get('SESSION.skey'));
	$cid  = intval(F3::get('SESSION.cid'));
	$sid  = intval(F3::get('SESSION.student'));

	$ttet = new Axon('tet');
	$datas = $ttet->afind("skey='$skey' AND cid='$cid' AND sid='$sid'");

	$tpuan = 100;
	foreach($datas as $i=>$t) {
		if($t['zaman'] == 0) {unset($datas[$i]); continue; }

		$nid = $t['nid'];

		$tnode = new Axon('node');
		$tnode->load("id=$nid");
		
		$options = unserialize($tnode->options);

		$oid = $datas[$i]['oid'] - 1;	if($oid < 0) $oid = 0;
		$response = $options[$oid]['response'];
		$datas[$i]['beklenen'] = response2str_bek($response, $tnode->ntype);

		$t2 = unserialize($datas[$i]['soylenen']);
		$response = $t2['response'];
		$datas[$i]['soylenen'] = response2str_soy($response, $tnode->ntype);

		$datas[$i]['title'] = $tnode->title;

		$tpuan += $datas[$i]['puan'];
		$datas[$i]['puan'] = $tpuan;
	}

	F3::set('SESSION.tdata', $datas);
	F3::set('SESSION.tpuan', $tpuan);

	render('report', 'Rapor');
?>
