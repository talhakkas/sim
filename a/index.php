<?php

require_once './api/gettext/gettext.inc';
require_once './api/markdown/markdown.php';
require_once './lib/base.php';
require_once './inc/lib.php';

// HOME PAGES
F3::route("GET /*", 		'Home->home');
F3::route("GET /people", 	'Home->people');
F3::route("GET /work", 		'Home->work');
F3::route("GET /about", 	'Home->about');
F3::route("GET /contact", 	'Home->contact');

F3::route("GET /localize/@lang",'localize');

// PDF
F3::route("GET /pdf/report", 	'Pdf->student_report');

// ACCOUNT
F3::route("POST /",      	'Account->auth');   // login action
F3::route('GET  /logout',     	'Account->logout'); // logout action
F3::route('POST /forgot',    	'Account->forgot'); // forget password

// PERSONAL
F3::route('GET  /personal',    	  'Personal->personal');
F3::route('GET  /personal/pedit',  'Personal->edit'); // Kişisel bilgiler
F3::route('POST /personal/pedit',  'Personal->update'); // Kişisel bilgileri güncelle

// PAGE
F3::route('GET  /help',    	'Page->help'); // Yardım
F3::route('GET  /news',    	'Page->news'); // Yenilikler
F3::route('GET  /announ',    	'Page->announ'); // Duyurular
F3::route('GET  /examc',    	'Page->examc'); // Sınav Takvimi
F3::route('GET  /exams',    	'Page->exams'); // Sınavlar

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
	F3::route("POST /cstart/@cid", 'cstart.php');

F3::route("GET /cshow/@cid", 'cshow.php');
F3::route("GET /cedit/@cid", "cedit.php");
	F3::route("POST /cedit/@cid", "cupdate.php");

F3::route("GET /clist*", "clist.php");
	F3::route("POST /clist*", "clist.php");
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

F3::route("GET /refresh/@id", "refresh");


F3::run();

?>
