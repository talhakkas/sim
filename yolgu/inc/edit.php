<?php
	params2session();

	F3::set('SESSION.data', get_node());

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

			foreach($drlist as $did=>$drug) {
				/* dslist te varsa dokunma
				 * yoksa ekle
				 */
				if(array_key_exists($did, $dslist))
					continue;
				else
					$dslist[$did] = $drug;
			}

			/* dslist ten drlist'te olmayanlari ciakrt */
			foreach($dslist as $did=>$drug) {
				if(!array_key_exists($did, $drlist))
					unset($dslist[$did]);
			}

			// if(true) print_pre($drlist, "drlist");
			// if(true) print_pre($dslist, "dslist");
			// if(true) print_pre(F3::get("SESSION.data['nodes'][0]"), "nodes");

			set_dose_drug_list(F3::get('SESSION.cid'), F3::get('SESSION.id'), $dslist);
			set_dose_stamp(F3::get("SESSION.cid"));

			F3::set("SESSION.data['nodes'][0]['response']", $dslist);
			// print_pre(F3::get('SESSION.data[nodes]'), 'nodes'); return;
		}
		else {
			;	
		}
	}

	// FIXME: db den preselected olanlari cek.
	if(F3::get('SESSION.data[ntype]') == 'exam')
		F3::set('tetkikmerkezi', multi());

	render('node', 'Düzenle');
?>
