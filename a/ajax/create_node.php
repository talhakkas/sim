<?php
echo F3::get('FOO');
return;
	// params to session
	$cid 	= $_GET['cid'];
	$ntype 	= $_GET['ntype'];
	$parent = isset($_GET['parent']) ? $_GET['parent'] : null;
	$id 	= isset($_GET['id']) ? $_GET['id'] : null;

	$nid = create_new_node($cid, $ntype, $parent, $id);

	echo $nid;
?>
