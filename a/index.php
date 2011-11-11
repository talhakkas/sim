<?php

require_once './lib/base.php';
require_once './app/lib.php';
require_once './inc/mylib.php';
require_once './inc/tetkik.php';

function test2()
{
	F3::set('SESSION.cid', 1);
	F3::set('SESSION.id',  17);

	$node = get_node();

	print_pre($node);
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
	$tnode->load("cid='1' AND id='17'");

	$dict = unserialize($tnode->options);

	$dict = array("link_text" => "Aşağıda ki kutuda seçim yapın",
				  "node_link" => 26,
				  "drugs"  => array(
				  					116 => array("name" => "Alphagan",
												 "dmn"  => 0,
												 "dmx"  => 100,
												 "dval" => 70,
												 "dayol"=> 1),
				  					431 => array("name" => "Devaljin",
												 "dmn"  => 20,
												 "dmx"  => 150,
												 "dval" => 50,
												 "dayol"=> 2)
				  				   ),
				  "odul" => 5,
				  "ceza" => 1
				 );

	print_pre($dict, "dict");

	$tnode->options = serialize($dict);
	$tnode->save();

}

function test()
{
	test2();
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

// ilac durumu
F3::route("GET /drug/@did", "show_drug");

F3::route("GET /exam/@cid/@eid", "show_exam.php");

F3::run();

?>
