<?php
	$dbg = false;
	params2session();

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");

	if($dbg)	{print_pre($_POST, 'POST'); 	return;}

	set_node();

	if($dbg)	{print_pre($_POST, 'POST'); 	return;}

	F3::reroute("/show/" . F3::get('SESSION.cid')  . "/" . F3::get('SESSION.id') . "/0");
?>
