<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	$id  = F3::get('PARAMS.id')  ? F3::get('PARAMS.id') :1;
	$opt = F3::get('PARAMS.opt') ? F3::get('PARAMS.opt'):1; 
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id',  $id);
	F3::set('SESSION.opt', $opt);

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");
	
	if($_POST['type'] == 'oyku') 
		$next_node = $_POST['next_node'];

	$_POST = zip($_POST);

	$table = new Axon("node");
	$table->load("id='$id' AND cid='$cid'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;

	if(F3::get('FILES.media.name') != "") {
		$fnm = "_n". sprintf("%05d", $table->nid) . ".jpg";
		$ffnm = F3::get('uploaddir') . $fnm;
		if(yukle($ffnm, "media", true))
			$table->media = $fnm;
		else 
			$table->media = "default.jpg";
	}
	if($_POST['resim_sil'] == 'evet')
		$table->media = NULL;

	$table->save();

	if($_POST['type'] == 'oyku') {
		$table2 = new Axon("node");
		$table2->load("id='$next_node' AND cid='$cid'");
		$table2->parent = $id;
		$table2->save();
	}

	F3::reroute("/show/$cid/$id/$opt");
?>
