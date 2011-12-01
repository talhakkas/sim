<?php
	$cid = F3::get('PARAMS.cid');

	if (!empty($_REQUEST['delete']))
		F3::reroute("/cdelete/$cid");
	
	$table = new Axon("ncase");
	$table->load("id='$cid'");
	//FIXME: $table->copyFrom('REQUEST');
	foreach($_POST as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;
	$table->save();

	F3::reroute("/cshow/$cid");
?>
