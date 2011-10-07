<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once('./inc/mylib.php');

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('clist.php');
	render('login', 'Yolgu bu Yolgu');
}

function test2() 
{
	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  5);

	$node = get_node();
	
	print_pre($node, "node");
}

function test3($dbg=true)
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='26'");
	
	$dict = unserialize($tnode->options);

	$i = 1;
	$dict[$i]['chkIA'] = 'yes';
	$dict[$i]['IA'] = 'doğru yanıt';

	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();
	
}

function test()
{
	test2();
}

F3::set('uploaddir', 'upload/');

F3::route("GET /*", 	   'login');
	F3::route("POST /login",   'login.php');
F3::route("GET /logout*",  'logout');

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

F3::route("GET /clist", "clist.php");
F3::route("GET /cadd", "cadd.php");
	F3::route("POST /cadd", "csave.php");

F3::route("GET /cdelete/@cid", "cdelete.php");
	F3::route("POST /cdelete/@cid", "cdelete.php");

F3::route("GET /test", "test");
	F3::route("POST /test", "test");

// ilac durumu
F3::route("GET /drug/@did", "show_drug.php");

F3::run();

?>
