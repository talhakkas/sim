<?php
	F3::set('SESSION.error', 'NULL');

	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	if($node['title'] == 'new') {
		$cid = F3::get('SESSION.cid');
		$id  = F3::get('SESSION.id');

		F3::reroute("/edit/$cid/$id");
		return 1;
	}

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
		F3::set('SESSION.exams', get_exams_dict(F3::get('SESSION.cid'), $_POST));
	}

	if($node['ntype'] == 'immapr') {
		F3::set('SESSION.ogrenci', get_immapr4ogrenci($_POST));
		
		F3::set('SESSION.hoca', get_immapr4hoca(F3::get('SESSION.cid')));
	}

	if($node['ntype'] == 'bmapr') {
		$BOLGE = array('NUL', 'neck', 'chest', 'l_shoulder', 'r_shoulder', 'l_arm', 'r_arm', 'l_hand', 'r_hand',
				'l_leg', 'r_leg', 'l_knee', 'r_knee', 'l_ankle', 'r_ankle', 'l_foot', 'r_foot');
		$tmp = $_POST['selected'];
		$sec = preg_split('/,/', $tmp);

		$dict = array();
		foreach($sec as $i=>$b)
			$dict[$i] = $BOLGE[$b];

		F3::set('SESSION.smap', $dict);
	}

render('show', 'Olgu');

