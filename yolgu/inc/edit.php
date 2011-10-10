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
			$dlist = get_selected_drug_list();
			$sz = count($dlist);

			print_pre($dlist, "dlist");
			print_pre(F3::get('SESSION.data'), 'data');
			return;
		}
		else {
			
		}
	}

	render('node', 'Düzenle');
?>
