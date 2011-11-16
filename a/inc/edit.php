<?php
	$dbg = false;

	params2session();

	$node = get_node();
	if($node['title'] == 'new') {
		node_init();
	}

	F3::set('SESSION.data', $node);

	if($dbg)	print_pre($node);

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	if(F3::get('SESSION.data[ntype]') == 'drug')
		F3::set('SESSION.ilac', get_preselected_drugs());

	if(F3::get('SESSION.data[ntype]') == 'dose') {
		if($dbg)	print_pre($node, "node");

		$cid = F3::get('SESSION.cid');
		$id  = F3::get('SESSION.id');

		$drugs = get_tea_sel_drugs($cid, get_node_parent($cid, $id));
		F3::set('SESSION.drugs', $drugs);
		if($dbg)	print_pre($drugs);

		F3::set('SESSION.AYOL', array("Damar", "Kas"));
	}

	if(F3::get('SESSION.data[ntype]') == 'exam') {
		$dict = F3::get('SESSION.data[opts][exams]');
		F3::set('tetkikmerkezi', multi($dict));
	}

	if(F3::get('SESSION.data[ntype]') == 'result') {
		$cid = F3::get('SESSION.cid');
		$id  = F3::get('SESSION.id');
		$enid = get_node_parent($cid, $id);

		F3::set('SESSION.exams', get_tea_sel_exams($cid, $enid));
	}

	if(F3::get('SESSION.data[ntype]') == 'bmapr') {
		$cid = F3::get('SESSION.cid');
		$id  = F3::get('SESSION.id');
		$bnid = get_node_parent($cid, $id);

		F3::set('SESSION.bmap', get_tea_sel_bmap($cid, $bnid));
	}

	if(F3::get('SESSION.data[ntype]') == 'immapr') {
		F3::set('SESSION.medya', get_immap_imgnm(F3::get('SESSION.cid')));
	}

	//F3::set('SESSION.nofbs', count(F3::get('SESSION.data[opts]')));

	render('node', 'Düzenle');
?>
