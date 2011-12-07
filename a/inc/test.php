<?php

function test()
{
	// migration_node2connector();
	print_pre(get_node(1, 1));
	// test2();
}

function test4()
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='21'");

	$dict = unserialize($tnode->options);
	
	$nm = 'immap';
	$dict['response'] = $dict[$nm];		unset($dict[$nm]);
	print_pre($dict);

	$tnode->options = serialize($dict);
	$tnode->save();
}

function test2()
{
	$nodes = array( 1=>"dal",
       	37=>"bmap", 38=>"bmapr",
       	35=>"exam", 36=>"result",
		17=>"drug", 26=>"dose",
       	21=>"immap",23=>"immapr");

	foreach($nodes as $id=>$name)
		print_pre(get_node(1, $id), "<hr>$name");
}

function test_gui()
{
	render('test', 'GUI Test');
}

?>
