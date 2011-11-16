<?php
	$dbg = !true;

	$skey = intval(F3::get('SESSION.skey'));
	$cid  = intval(F3::get('SESSION.cid'));
	$sid  = intval(F3::get('SESSION.student'));

	$ttet = new Axon('tet');
	$datas = $ttet->afind("skey='$skey' AND cid='$cid' AND sid='$sid'");

	$tpuan = 100;
	foreach($datas as $i=>$t) {
		$tet = get_tet($datas[$i]['id']);
		if($dbg)	print_pre($tet, 'tet');

		if($tet['zaman'] == 0) {unset($datas[$i]); continue;}

		$nid = $tet['nid'];

		$node = get_node($cid, $nid);
		//if($dbg)	print_pre($node, 'node');

		$ntype = $tet['beklenen']['ntype'];

		if(in_array($ntype, array('result', 'bmapr', 'immapr'))) {unset($datas[$i]); continue;}

		$datas[$i]['beklenen'] = response2str_bek($tet['beklenen']['response'], $ntype);
		$datas[$i]['soylenen'] = response2str_bek($tet['soylenen']['response'], $ntype);
		if($dbg)	echo "<h3>Beklenen:</h3> " . $datas[$i]['beklenen'];
		if($dbg)	echo "<h3>Soylenen: </h3>" . $datas[$i]['soylenen'];

		$datas[$i]['title'] = $node['title'];

		$tpuan += $datas[$i]['puan'];
		$datas[$i]['puan'] = $tpuan;
	}
	F3::set('SESSION.tdata', $datas);
	F3::set('SESSION.tpuan', $tpuan);

	render('report', 'Rapor');
?>
