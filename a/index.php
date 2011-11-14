<?php

require_once './lib/base.php';
require_once './app/lib.php';
require_once './inc/mylib.php';
require_once './inc/tetkik.php';

function test2()
{
	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  21);

	$node = get_node();

	print_pre($node, "exam");

	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  21);

	$node = get_node();

	print_pre($node, "result");
}

function test3()
{
	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  37);

	$node = get_node();

	print_pre($node, "bmap");

	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  38);

	$node = get_node();

	print_pre($node, "bmapr");
}

function test4()
{
	$tnode = new Axon('node');
	$tnode->load("cid='1' AND id='38'");

	$tnode->parent = 37;
	$dict = unserialize($tnode->options);

	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

}

function test()
{
	test2();
	echo "<hr>";
	test3();
}

function test_gui()
{
	render('test', 'GUI Test');
}

function clist() {
	if (F3::get("SESSION.kop"))
		return F3::call('clist.php');
	render('a/home', 'Hoşgeldiniz', 'a');
}

function home() {
	render('a/home', 'Hoşgeldiniz', 'a');
}

function page() {
	$pages = array('people', 'work', 'about', 'contact', 'playground');

	$title = array(
	       	'people' => 'Ekibimiz',
		'work' => 'Çalışmalarımız',
		'about' => 'Hakkımızda',
		'contact' => 'İletişim',
		'playground' => 'test'
	);

	$page = F3::get('PARAMS.page');
	if (in_array($page, $pages))
		return render("a/$page", $title[$page], 'a');

	F3::call('home');
}

function show_drug() {
	$did = F3::get('PARAMS.did');
	$drug = get_drug($did);
	echo $drug['content'];
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

F3::route("GET /clist", "clist");
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
