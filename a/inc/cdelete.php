<?php
	$cid = F3::get('PARAMS.cid');

	$table = new Axon("ncase");
	$table->load("id='$cid'");
	$table->erase();

	// node lari da sil
	$tnode = new Axon("node");
	$nodes = $tnode->load("cid='$cid'");

	while($nodes->dry()) {
		$nodes->erase();
		$nodes->skip();	
	}

	F3::reroute("/clist/");
?>
