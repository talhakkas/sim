<?php
	$cid = F3::get('PARAMS.cid');
	$id = F3::get('PARAMS.id');
	F3::set('SESSION.cid', $cid);
	F3::set('SESSION.id', $id);

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");

	$_POST = zip($_POST);

	DB::sql("select max(nid) from node where nid");
	$res = F3::get("DB->result");
	$nid = $res[0]['max(nid)'];

	$table = new Axon("node");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	
	if(F3::get('FILES.media.name') != "") {
		$fnm = "_n". sprintf("%05d", $nid) . ".jpg";
		$ffnm = F3::get('uploaddir') . $fnm;
		if(yukle($ffnm, "media", true))
			$table->media = $fnm;
		else 
			$table->media = "default.jpg";
	}
	
	$table->nid = NULL;
	$table->save();

	F3::reroute("/show/$cid/$id");
?>
