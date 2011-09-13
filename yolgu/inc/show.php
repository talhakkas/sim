<?php
	$onceki_cid = F3::get('SESSION.cid');
	$onceki_id  = F3::get('SESSION.id');

	params2session();

	F3::set('SESSION.data', get_node());

	takip_listesine_ekle($onceki_cid, $onceki_id);

	F3::set('SESSION.tdata', takip_listesi2dizi());

	render('show', 'Olgu');
?>
