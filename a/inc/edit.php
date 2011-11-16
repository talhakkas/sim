<?php
	$dbg = !true;

	params2session();
	
	$cid = F3::get('SESSION.cid');
	$id  = F3::get('SESSION.id');

	$node = get_node();
	if($dbg)	print_pre($node, 'node');

	F3::set('SESSION.data', $node);

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	switch(F3::get('SESSION.data[ntype]')) {
		case 'drug':
			$drugs = get_preselected_drugs();
			F3::set('SESSION.drugs', $drugs);
			if($dbg)	print_pre($drugs, 'drugs');
			break;
		case 'dose':
			$drugs = get_tea_sel_drugs($cid, get_node_parent($cid, $id));
			F3::set('SESSION.drugs', $drugs);
			if($dbg)	print_pre($drugs, 'drugs');

			F3::set('SESSION.AYOL', array("Damar", "Kas"));
			break;
		case 'exam':
			$exams = F3::get('SESSION.data[opts][exams]');
			F3::set('tetkikmerkezi', multi($exams));
			if($dbg)	print_pre($exams, 'exams');
			break;
		case 'result':
			$exams = get_tea_sel_exams($cid, get_node_parent($cid, $id));
			F3::set('SESSION.exams', $exams);
			if($dbg)	print_pre($exams, 'exams');
			break;
		case 'bmapr':
			$bmap = get_tea_sel_bmap($cid, get_node_parent($cid, $id), true);
			F3::set('SESSION.bmap', $bmap);
			if($dbg)	print_pre($bmap, 'bmap');
		case 'immapr':
			F3::set('SESSION.medya', get_immap_imgnm($cid));
			break;
	}

	render('node', 'Düzenle');
?>
