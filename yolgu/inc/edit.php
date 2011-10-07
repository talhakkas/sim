<?php
	params2session();

	F3::set('SESSION.data', get_node());

	F3::set('SESSION.nofbs', count(F3::get('SESSION.data[nodes]')));

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	render('node', 'Düzenle');
?>
