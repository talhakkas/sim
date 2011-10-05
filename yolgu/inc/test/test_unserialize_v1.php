<?php
function test_unserialize($dbg=true) 
{
	$tnode = new Axon("node");
	$tnode->load("cid='1' AND id='1'");

	$opts = $tnode->options;
	if($dbg) 	print_pre($opts, "opts");

	$dict = unserialize($opts);
	if($dbg) 	print_pre($dict, "dict");
}
?>
