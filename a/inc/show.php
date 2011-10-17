<?php
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
		F3::set('SESSION.exams', get_exams($_POST));
		//return;
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
