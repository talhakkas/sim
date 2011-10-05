<?php
function test_unserialize()
{
	$tnode = new Axon("node");
	$tnode->load("cid='1' AND id='26'");

	while(!$tnode->dry()) {
			print_pre( unserialize($tnode->options), 'opts');
			echo "<hr>";
			$tnode->skip();
	}
}
?>
