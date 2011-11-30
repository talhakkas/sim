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

	takip_listesine_ekle();

	if($node['ntype'] == 'report') {
		F3::reroute('/report');
		return 1;
	}

	if($node['ntype'] == 'dose') {
		$cid = F3::get('SESSION.cid');
		$id  = F3::get('SESSION.id');

		$drugs = get_tea_sel_drugs($cid, get_node_parent($cid, $id));
		F3::set('SESSION.drugs', $drugs);

		F3::set('SESSION.AYOL', array("Damar", "Kas"));
	}

	if($node['ntype'] == 'exam')
		F3::set('tetkikmerkezi', multi());
	if($node['ntype'] == 'result') {
		F3::set('SESSION.results', get_stu_sel_exams($_POST));
	}

	if($node['ntype'] == 'bmap') {
		$dict = map2dict($node['opts']['map']);

		if($dbg)	print_pre($dict);

		F3::set('SESSION.map', $dict);
		F3::set('SESSION.img', $node['opts']['img']);
	}

	if($node['ntype'] == 'bmapr') {
		$cid = F3::get('SESSION.cid');
		$pid = $node['parent'];

		$dict = get_stu_sel_bmap($_POST);
		if($dbg)	print_pre($dict);

		F3::set('SESSION.bmap', $dict);
	}

	if($node['ntype'] == 'immapr') {
		$cid = F3::get('SESSION.cid');
		$pid = $node['parent'];


		$rect_stu = get_stu_sel_immap($_POST);
		$rect_tea = get_tea_sel_immap($cid, $pid);

		$iminfo = getimagesize( getcwd() . "/upload/kucuk" . $rect_tea['imgnm'] );
		F3::set("SESSION.imwidth",  $iminfo[0]);
		F3::set("SESSION.imheight", $iminfo[1]);

		F3::set("SESSION.imname",  $rect_tea['imgnm']);

		F3::set('SESSION.ogrenci', array("left" => $rect_stu['x'], "right"  => ($iminfo[0] - ($rect_stu['x'] + $rect_stu['w'])),
						  				 "top"  => $rect_stu['y'], "bottom" => ($iminfo[1] - ($rect_stu['y'] + $rect_stu['h'])),
										 "yorum"=> $rect_stu['yorum']) );
		F3::set('SESSION.hoca',    array("left" => $rect_tea['x'], "right"  => ($iminfo[0] - ($rect_tea['x'] + $rect_tea['w'])),
						  				 "top"  => $rect_tea['y'], "bottom" => ($iminfo[1] - ($rect_tea['y'] + $rect_tea['h'])),
										 "yorum"=> $rect_tea['yorum']) );
	}

render('show', 'Olgu');
?>
