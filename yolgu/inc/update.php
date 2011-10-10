<?php
	params2session();

	if (!empty($_REQUEST['delete']))
		F3::reroute("/delete/$cid/$id");
	
	set_node();
return;
	F3::reroute("/show/" . F3::get('SESSION.cid')  . "/" . F3::get('SESSION.id') . "/" . F3::get('SESSION.opt'));
?>
