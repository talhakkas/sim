<?php

require_once './lib/base.php';
require_once './inc/lib.php';
require_once './inc/mylib.php';
require_once './inc/tetkik.php';

$nodes = array( 1=>"dal",  
		   17=>"drug", 26=>"dose",
	       35=>"exam", 36=>"result",
	       37=>"bmap", 38=>"bmapr",
	       21=>"immap",23=>"immapr");

function test2()
{
	print_pre(get_node(1, 17), "drug");
	print_pre(get_node(1, 26), "dose");

	echo "<hr>";

	print_pre(get_node(1, 37), "bmap");
	print_pre(get_node(1, 38), "bmapr");
}

function test4()
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='23'");

	$dict = unserialize($tnode->options);

	$dict['node_link'] = 19;
	$dict['link_text'] = "Başka tetkik için tıklayınız";
	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

}

function test()
{
	print_pre(get_tet(12), "tet");
	test2();
}

function test_gui()
{
	render('test', 'GUI Test');
}

function show_drug() {
	$did = F3::get('PARAMS.did');
	$drug = get_drug($did);
	echo $drug['content'];
}


// HOME PAGES
F3::route("GET /", 		'Home->home');
F3::route("GET /people", 	'Home->people');
F3::route("GET /work", 		'Home->work');
F3::route("GET /about", 	'Home->about');
F3::route("GET /contact", 	'Home->contact');

// ACCOUNT
F3::route("POST /login",      	'Account->auth');   // login action
F3::route('GET  /logout',     	'Account->logout'); // logout action
F3::route('POST /forgot',    	'Account->forgot'); // forget password
F3::route("GET  /@page", 	'Account->page_reload'); 	// Geçici Sistem Açıldığında Silinecek



F3::route("GET /show/@cid/@id/@opt", 'show.php');
	F3::route("POST /show/@cid/@id/@opt", 'show.php');
F3::route("GET /edit/@cid/@id", 'edit.php');
	F3::route("POST /edit/@cid/@id", 'update.php');

F3::route("GET /create/@type/@cid/@id", "create.php");
	F3::route("POST /create/@type/@cid/@id", "save.php");

F3::route("GET /delete/@cid/@id", "delete.php");
F3::route("POST /delete/@cid/@id", "delete.php");

F3::route("GET /report", "report.php");

// case routings
F3::route("GET /cstart/@cid", 'cstart.php');

F3::route("GET /cshow/@cid", 'cshow.php');
F3::route("GET /cedit/@cid", "cedit.php");
	F3::route("POST /cedit/@cid", "cupdate.php");

F3::route("GET /clist*", "clist.php");
F3::route("GET /cadd", "cadd.php");
	F3::route("POST /cadd", "csave.php");

F3::route("GET /cdelete/@cid", "cdelete.php");
	F3::route("POST /cdelete/@cid", "cdelete.php");

F3::route("GET /test", "test");
	F3::route("POST /test", "test");

F3::route("GET /test_gui", "test_gui");

// ilac durumu
F3::route("GET /drug/@did", "show_drug");

F3::route("GET /exam/@cid/@eid", "show_exam.php");

F3::run();

?>
