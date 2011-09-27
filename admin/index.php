<?php

require_once '../lib/base.php';
require_once '../asset/lib.php';

function adminsuper() {
	return F3::get('SESSION.adminsuper');
}
function home() {
	render('home', 'Yönetici Paneli');
}
function info() {
	if (! F3::get('SESSION.admin'))
		return F3::call('giris');
	render('info', 'Bilgilendirme Sayfası');
}
function add() {
	if (!adminsuper()) return F3::call('home');
	if (F3::get('SESSION.key')) // bu bir direkt erişim mi?
		return F3::call('giris');
	render('new', 'Kaydet');
}
function edit() {
	if (!adminsuper()) return F3::call('home');
	if (! F3::exists('data')) // bu bir direkt erişim mi?
		return F3::call('giris');
	render('edit', 'Düzenle');
}
function find() {
	if (!adminsuper()) return F3::call('home');
	render('find', 'Bul');
}
function show() {
	if (!adminsuper()) return F3::call('home');
	render('show', 'İnceleme Sonuçları');
}
function review() {
	if (!adminsuper()) return F3::call('home');
	render('review', 'Listelendi');
}

function printly(){
        F3::set('printly', 'printly');
        $template = F3::get('SESSION.template');
	$inc = array('add', 'del', 'edit', 'login', 'new', 'review', 'table', 'update');
	if (in_array($template, $inc))
		return F3::call($template . '.php');
        F3::call($template);
}

function giris() {
	// nerede bizim istediğimiz tablolar ?
	F3::set('SESSION.TABLES', array(
				      'people' => 'tc',
				      'drug' => 'id',
				      'event' => 'event_id',
				      'survey' => 'survey_id',
				      'd_survey' => 'd_survey_id',
				      'patient' => 'patient_id',
				      'story' => 'story_id',
				      'result' => 'result_id',
				      'parent' => 'parent_id',
				      'discipline' => 'discipline_id',
				      'announcement' => 'announcement_id',
				      'node' => 'id',
				      'ncase' => 'cid',
				      'takip' => 'tid',
				      'tet' => 'id',
			      )
	);
       	// login olursa, default olarak admin tablosu seçilsin
	F3::set('SESSION.TABLE_INIT', 'people');

	// tablo incele kısmında buna benzer şeyleri görürsen bizimde görmemize izin ver
	// Ör :
	// talep : _id => true
	// cevap : bilmem_id, bilmem2_id, bilmem3_id
	//
	// talep : name => true
	// cevap : name, surname, first_name, last_name, username
	F3::set('SESSION.FIELDS', array(
					'_id' =>  true,
					'id' =>  true,
					'name' => true,
					'title' => true,
					'content' => true,
					'tc' => false,
					'photo' => false,
					'type' => false,
					'topic' => false,
					'skey' => false,
					'zaman' => true,
				));

	if (F3::get('SESSION.admin'))
		return F3::call('home');
	render('login', 'Yönetici Paneli'); // adminlayout sadece login sayfası için
}


F3::route('GET /test', function() { render('test', 'butonlar');});

F3::route("GET  /*",      'giris');
F3::route("GET /printly",  'printly');
F3::route("POST /login",  'login.php');
F3::route('GET  /logout', 'logout');
F3::route('POST /table',  'table.php');

//F3::route("GET /pdf",    'pdf.php'); TODO halen sorunlu yapılmadı.
F3::route("GET /info*",   'info');
F3::route("GET /review*", 'review.php');
F3::route("GET /csv*",    'csv.php');
F3::route("GET /new*",    'new.php');
F3::route("GET /find*",   'find');
F3::route("GET /add*",    'add');
F3::route("GET /show*",   'show');
F3::route("POST /show",   'show');
F3::route("POST /add",   'add.php');
F3::route("POST /find",  'find.php');
F3::route("POST /del",   'del.php');
/* F3::route("GET  /edit",  'edit'); */
F3::route("POST /edit",  'edit.php');
F3::route("POST /update",'update.php');

F3::run();

?>
