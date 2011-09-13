<?php
	$cid = F3::get('PARAMS.cid');
	$id  = F3::get('PARAMS.id');

	$table = new Axon("node");
	$table->load("id='$id' AND cid='$cid'");

	$pid = $table->parent ? $table->parent : 1;

	$table->erase();

	F3::reroute("/show/$cid/$pid");
?>
