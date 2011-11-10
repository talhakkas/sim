<?php
	params2session();

	$node = get_node();
	if($node['title'] == 'new') {
		node_init();
	}

	F3::set('SESSION.data', $node);

	F3::set('SESSION.nofbs', count(F3::get('SESSION.data[nodes]')));

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	if(F3::get('SESSION.data[ntype]') == 'drug')
		F3::set('SESSION.ilac', get_preselected_drugs());

	if(F3::get('SESSION.data[ntype]') == 'dose') {
		if(check_stamp(F3::get('SESSION.cid')) != 0) {
			/* yeni ilac listesini al, stamp i ayarla
			 * edit tarafinda doz bilgilerini alma icin gerekli default degerleri hazirla
			 * 
			 * dose:options:dict 'inde keyi did secersek daha iyi olacak 
			 */
			$dslist = F3::get("SESSION.data['nodes'][0]['response']");
			$drlist = get_selected_drug_list();

			$dslist = liste_esle($dslist, $drlist);

			// if(true) print_pre($drlist, "drlist");
			// if(true) print_pre($dslist, "dslist");
			// if(true) print_pre(F3::get("SESSION.data['nodes'][0]"), "nodes");

			set_dose_drug_list(F3::get('SESSION.cid'), F3::get('SESSION.id'), $dslist);
			set_dose_stamp(F3::get("SESSION.cid"));

			F3::set("SESSION.data['nodes'][0]['response']", $dslist);
			// print_pre(F3::get('SESSION.data[nodes]'), 'nodes'); return;
		}
		else {
			; // FIXME
		}
	}

	if(F3::get('SESSION.data[ntype]') == 'exam') {
		$dict = F3::get('SESSION.data[nodes][0][response]');
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
