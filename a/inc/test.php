<?php

$nodes = array( 1=>"dal",
		17=>"drug", 26=>"dose",
	       	35=>"exam", 36=>"result",
	       	37=>"bmap", 38=>"bmapr",
	       	21=>"immap",23=>"immapr");

function test2()
{
	print_pre(get_node(1, 3), "dal");
	print_pre(get_node(1, 38), "bmapr");

	echo "<hr>";

	print_pre(get_node(1, 21), "immap");
	print_pre(get_node(1, 23), "immapr");
}

function test4()
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='3'");

	$dict = unserialize($tnode->options);

	unset($dict[0]['stamp']);
	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

}

function test()
{
	print_pre(F3::get('SESSION'), 'SESSION'); 
	print_pre(get_tet(1), 'TET: 1');
	print_pre(get_tet(2), 'TET: 2');
	print_pre(get_tet(3), 'TET: 3'); return;
	test2();
}

function test_gui()
{
	render('test', 'GUI Test');
}

?>
