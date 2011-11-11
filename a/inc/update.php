<?php
	params2session();

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");

	set_node();

	F3::reroute("/show/" . F3::get('SESSION.cid')  . "/" . F3::get('SESSION.id') . "/0");
?>
