<?php
	$cid = maxID("id", "ncase") + 1;
	F3::set('SESSION.cid', $cid);

	$all_nodes = nodeList($cid);
	F3::set('SESSION.all_nodes', $all_nodes);

	render('case', 'Yeni Ekle');
?>
