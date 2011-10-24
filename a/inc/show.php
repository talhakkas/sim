<?php
	F3::set('SESSION.error', 'NULL');

	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	takip_listesine_ekle();

	if($node['ntype'] == 'report') {
		F3::reroute('/report');
		return 1;
	}

	if($node['ntype'] == 'dose')
		show_node_dose();
	if($node['ntype'] == 'exam')
		F3::set('tetkikmerkezi', multi());
	if($node['ntype'] == 'result') {
		F3::set('SESSION.exams', get_exams_dict(F3::get('SESSION.cid'), $_POST));
	}

	if($node['ntype'] == 'immapr') {
		F3::set('SESSION.ogrenci', get_immapr4ogrenci($_POST));
		
		F3::set('SESSION.hoca', get_immapr4hoca(F3::get('SESSION.cid')));
	}

render('show', 'Olgu');


/* Yerel Islevler */
function show_node_dose() 
{
	$drugs = F3::get('SESSION.data.nodes[0][response]');

	foreach($drugs as $did=>$d) {
		$drug = get_drug($did);

		$drugs[$did]['name'] = $drug['name'];
	}

	F3::set('SESSION.data.nodes[0][response]', $drugs);
}
?>
