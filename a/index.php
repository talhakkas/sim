<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once('./inc/mylib.php');
require_once('./inc/tetkik.php');

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
function test4()
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='35'");

	$dict = unserialize($tnode->options);

	$dict[0]['response'] = array('010104'=>array('id'=>010104, 'value'=>'foo'),
				     '010106'=>array('id'=>010106, 'value'=>'bar'));

	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

}

function test()
{
	test2();
}


function home() {
	if (F3::get("SESSION.kop"))
		return F3::call('clist.php');
	render('a/home', 'Hoşgeldiniz', 'a');
}

function page() {
	$pages = array('people', 'work', 'about', 'contact', 'playground');

	$page = F3::get('PARAMS.page');
	if (in_array($page, $pages))
		return render("a/$page", 'Title', 'a');

	F3::call('home');
}

F3::set('uploaddir', 'upload/');

F3::route("GET /"      , 'home');
F3::route("POST /login",   'login.php');

F3::route("GET /@page", 'page');


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

F3::route("GET /exam/@cid/@eid", "show_exam.php");

F3::run();

?>
