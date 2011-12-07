<?php
	$dbg = false;
	params2session();

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/" . F3::get('SESSION.cid') . "/" . F3::get('SESSION.id'));

	if($dbg)	{print_pre($_POST, 'POST: set_node oncesi'); 	return;}

	set_node();

	if($dbg)	{print_pre($_POST, 'POST: set_node sonrasi'); 	return;}

	F3::reroute("/show/" . F3::get('SESSION.cid')  . "/" . F3::get('SESSION.id') . "/0");
?>
