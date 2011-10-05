<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once('./inc/mylib.php');

function login() {
	if (F3::get("SESSION.special") == 1)
		return F3::call('clist.php');
	render('login', 'Yolgu bu Yolgu');
}

function print_pre($code, $msj) {
	echo "$msj = ";
	echo "<pre>";
	print_r($code);
	echo "</pre>";
}

function my_get($arr, $key) {
	return array_key_exists($key, $arr) ? $arr[$key] : "";
}

function test($dbg=true, $type="drug") {
	$options1 = ";;117--50--250--150--1..2248--50--250--50--2..54--50--250--200--3,,Dozaj ve alım yolu tercihlerini gönder.::18";
	$options2 = "aşağıda ki kutuda seçim yapın;;117..2248::26::5::1";
	$options3 = "Hastalara ilk acil müdahalenin, 112 acil ambulans merkezi tarafından yapılmasının gerektiğini, bu nedenle aile hekimliği kliniğini terk edemeyeceğimi belirtirim. Bu belirtilen hususu ilgili klinik muayene defterine kayıt ederim.::2::::5,,Hastanın durumunu görmek ve gerekirse tıbbi müdahale etmek için, varsa yardımcı sağlık personeli eşliğinde, yoksa bizzat kendim acil hastaya müdahale etmek için çiçek serasına giderim. ::3::6::,,Aile hekimliği merkezi sorumlusunun resmi iznini beklerim. Gerekli izin alınınca olay yerine giderim. ::4::::5";

	$dict = array();
	
	$opts = $options2;
	if($dbg) 	print_pre($opts, "options");

	// once dallari ayir
	$dallar = preg_split('/,,/', $opts);
	if($dbg) 	print_pre($dallar, "dallar");

	foreach($dallar as $i=>$d) {
		$td = preg_split('/::/', $d);
		if($dbg) print_pre($td, "td");

		$text_resp = my_get($td, 0);

		$tr = preg_split('/;;/', $text_resp);
		$link_text = my_get($tr, 0);
		$response  = my_get($tr, 1);

		if($type == 'drug') {
			$tdrug = preg_split('/\.\./', $response);
			if($dbg);	print_pre($tdrug, "tdrug");

			$response = $tdrug;
		} elseif($type == 'dose') {
			$tdose = preg_split('/\.\./', $response);
			if($dbg);	print_pre($tdose, "tdose");

			$response = array();
			foreach($tdose as $i=>$d) {
				$tds = preg_split('/--/', $d);
				if($dbg);	print_pre($tds, "tdose-dose");

				$response[$i]['did']  = my_get($tds, 0);
				$response[$i]['dmn']  = my_get($tds, 1);
				$response[$i]['dmx']  = my_get($tds, 2);
				$response[$i]['dval'] = my_get($tds, 3);
			}			
		}

		$node_link = my_get($td, 1);
		$odul      = my_get($td, 2);
		$ceza      = my_get($td, 3);
		
		$dict[$i]['link_text'] = $link_text;
		$dict[$i]['node_link'] = $node_link;
		$dict[$i]['response']  = $response;
		$dict[$i]['odul'] 	   = $odul;
		$dict[$i]['ceza'] 	   = $ceza;
	}

	print_pre($dict, "dict");
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

F3::route("GET /rapor", "rapor.php");

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
F3::route("GET /ilac/show", "ilac_sec.php");
	F3::route("POST /ilac/show", "ilac_goster.php");

F3::run();

?>
