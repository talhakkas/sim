<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once('./inc/mylib.php');
require_once('./inc/tetkik.php');

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('clist.php');
	render('login', 'Yolgu bu Yolgu');
}

function test2() 
{
	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  35);

	$node = get_node();
	
	print_pre($node, "node:exam");

	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  36);

	$node = get_node();
	
	print_pre($node, "<hr>node:result");

	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  17);

	$node = get_node();
	
	print_pre($node, "<hr>node");
}

function test3($dbg=true)
{
	$cid = 1;

	$tnode = new Axon('node');
	$tnode->load("cid='$cid' AND id='26'");
	
	$dict = unserialize($tnode->options);
	print_pre($dict, "GIRDI:dict");

	unset($dict['save_stamp']);

	print_pre($dict, "sonuc:dict");

	$tnode->options = serialize($dict);
	$tnode->save();
	
}
function test()
{
	//test2();

	$str = "0102";
	$pid = substr($str, 0, 2);

	echo "str=$str ve pid=$pid";
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

F3::route("GET /exam/@eid", "show_exam.php");

F3::run();

?>
