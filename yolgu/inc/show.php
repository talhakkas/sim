<?php
	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	/* FIXME: data:options a gore yeniden tasarla.
	takip_listesine_ekle();
	F3::set('SESSION.tdata', @takip_listesi2dizi());

	if($node['ntype'] == 'report') {
		F3::reroute('/rapor');
		return 1;
	}
	*/

	if($node['ntype'] == 'dose')
		show_node_dose();

render('show', 'Olgu');


/* Yerel Islevler */
function show_node_dose() 
{
	$drugs = F3::get('SESSION.data.nodes[0][response]');

	foreach($drugs as $i=>$d) {
		$drug = get_drug($d['did']);

		$drugs[$i]['name'] = $drug['name'];
	}

	F3::set('SESSION.data.nodes[0][response]', $drugs);
}
?>
