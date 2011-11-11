<?php
	params2session();

	$node = get_node();
	if($node['title'] == 'new') {
		node_init();
	}

	F3::set('SESSION.data', $node);

	F3::set('SESSION.nofbs', count(F3::get('SESSION.data[opts]')));

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	if(F3::get('SESSION.data[ntype]') == 'drug')
		F3::set('SESSION.ilac', get_preselected_drugs());

	if(F3::get('SESSION.data[ntype]') == 'dose') {
		print_pre($node, "node");

		$drugs = get_selected_drugs();
		F3::set('SESSION.drugs', $drugs);
		print_pre($drugs);

		F3::set('SESSION.AYOL', array("Damar", "Kas"));
	}

	if(F3::get('SESSION.data[ntype]') == 'exam') {
		$dict = F3::get('SESSION.data[opts][0][response]');
		F3::set('tetkikmerkezi', multi($dict));
	}

	if(F3::get('SESSION.data[ntype]') == 'result') {
		$cid = F3::get('SESSION.cid');
		$eid = 35; // FIXME

		F3::set('SESSION.exams', get_exams_dict_v2($cid, $eid));
	}

	if(F3::get('SESSION.data[ntype]') == 'immapr') {
		F3::set('SESSION.medya', get_immap_imgnm(F3::get('SESSION.cid')));
	}

	render('node', 'Düzenle');
?>
