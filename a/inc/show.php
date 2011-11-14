<?php
	$dbg = false;
	F3::set('SESSION.error', 'NULL');

	params2session();

	if(preg_match("/new-/", F3::get('SESSION.id'))) {
		$tmp = preg_split("/-/", F3::get('SESSION.id'));
		$stype = $tmp[1];
		$parent = $tmp[2];

		/* yeni bir dugum olustur/ilkle ve duzenlemeye yonlendir */
		$id = create_new_node($cid, $stype, $parent);
		$cid = F3::get('SESSION.cid');

		F3::reroute("/edit/$cid/$id");
		return 1;
	}

	$node = get_node();
	F3::set('SESSION.data', $node);

	if($node['ntype'] == 'report') {
		F3::reroute('/report');
		return 1;
	}

	// takip_listesine_ekle();

	if($node['ntype'] == 'dose') {
		$drugs = get_selected_drugs();
		F3::set('SESSION.drugs', $drugs);

		F3::set('SESSION.AYOL', array("Damar", "Kas"));
	}

	if($node['ntype'] == 'exam')
		F3::set('tetkikmerkezi', multi());
	if($node['ntype'] == 'result') {
		F3::set('SESSION.results', get_st_sel_exams());
	}

	if($node['ntype'] == 'bmap') {
		$dict = map2dict($node['opts']['map']);
		
		if($dbg)	print_pre($dict);

		F3::set('SESSION.map', $dict);
		F3::set('SESSION.img', $node['opts']['img']);
	}

	if($node['ntype'] == 'bmapr') {
		$cid = F3::get('SESSION.cid');
		$bnid = $node['parent'];
		
		if(!isset($_POST['selected']))
			F3::set('SESSION.error', 'Herhangi bir bölge seçilmemiş');
		else {
			$sbind = preg_split('/,/', my_get($_POST, 'selected'));
			$dict = get_stu_sel_bmap($cid, $bnid, $sbind);
			if($dbg)	print_pre($dict);

			F3::set('SESSION.smap', $dict);
		}
	}

	if($node['ntype'] == 'immapr') {
		F3::set('SESSION.ogrenci', get_immapr4ogrenci($_POST));
		
		F3::set('SESSION.hoca', get_immapr4hoca(F3::get('SESSION.cid')));
	}

render('show', 'Olgu');

