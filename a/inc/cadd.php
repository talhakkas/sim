<?php
	$cid = maxID("cid", "ncase") + 1;
	F3::set('SESSION.cid', $cid);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);
	//cilkle();
	render('case', 'Yeni Ekle');
?>
