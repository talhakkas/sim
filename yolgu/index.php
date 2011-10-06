<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once('./inc/mylib.php');

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('clist.php');
	render('login', 'Yolgu bu Yolgu');
}

function test() 
{
	/*$t = new Axon("node");	$t->load("id='3'");
	print_pre(unserialize($t->options), 'normal');
	echo "<hr>";
	$t = new Axon("node");	$t->load("id='17'");
	print_pre(unserialize($t->options), 'drug');
	echo "<hr>";
	$t = new Axon("node");	$t->load("id='26'");
	print_pre(unserialize($t->options), 'dose');
	*/
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='26'");
	
	$dict = unserialize($tnode->options);
	print_pre($dict, 'node');

	foreach($dict[0]['response'] as $i=>$d) {
		$dict[0]['response'][$i]['ayol'] = $i+1;
	}
	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

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
