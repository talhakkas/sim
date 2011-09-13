<?php
	$cid = F3::get('POST.cid');

	$table = new Axon("ncase");
	//FIXME: $table->copyFrom('REQUEST');
	foreach(F3::get('POST') as $gnl => $blg) {
		$table->$gnl = $blg;
	}
	$table->save();

	F3::reroute("/cshow/$cid");
?>
