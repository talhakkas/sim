<?php
	$dbg = !true;
	F3::set('SESSION.error', 'NULL');

	params2session();
	
	$cid = F3::get('SESSION.cid');

	if(preg_match("/new-/", F3::get('SESSION.id'))) {
		$tmp = preg_split("/-/", F3::get('SESSION.id'));
		$stype = $tmp[1];
		$parent = $tmp[2];

		/* yeni bir dugum olustur/ilkle ve duzenlemeye yonlendir */
		$id = create_new_node($cid, $stype, $parent);

		F3::reroute("/edit/$cid/$id");
		return 1;
	}

	$node = get_node();
	F3::set('SESSION.data', $node);

	if($node['ntype'] == 'report') {
		F3::reroute('/report');
		return 1;
	}

	takip_listesine_ekle();

	switch($node['ntype']) {
		case 'dose':
			F3::set('SESSION.drugs', get_tea_sel_drugs($_POST['cid'], $_POST['id']));
			F3::set('SESSION.AYOL', array("Damar", "Kas"));
			break;
		case 'exam':
			F3::set('tetkikmerkezi', multi());
			break;
		case 'result':
			F3::set('SESSION.results', get_stu_sel_exams($_POST));
			break;
		case 'bmap':
			$dict = map2dict($node['opts']['map']);
			if($dbg)	print_pre($dict);

			F3::set('SESSION.map', $dict);
			F3::set('SESSION.img', $node['opts']['img']);
			break;
		case 'bmapr':
			$dict = get_stu_sel_bmap($_POST);
			if($dbg)	print_pre($dict);

			F3::set('SESSION.bmap', $dict);
			break;
		case 'immapr':
			F3::set('SESSION.ogrenci', get_stu_sel_immap($_POST));
			//F3::set('SESSION.hoca',    get_tea_sel_immap($_POST['cid'], $_POST['id']));
			F3::set('SESSION.hoca',    get_tea_sel_immap(F3::get('SESSION.cid'), F3::get('SESSION.id')));
			break;
	}

render('show', 'Olgu');

