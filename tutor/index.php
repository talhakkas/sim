<?php

require_once  '../lib/base.php';
require_once  '../lib2/lib.php';

function page($title, $template, $layout='render') {
	F3::set('title', $title);
	F3::set('template', $template);
	F3::call($layout);
}

function render() {
	echo Template::serve('layout.htm');
}
function home() {
	page('Yönetici Paneli', 'home');
}
function info() {
	if (! F3::get('SESSION.tutor'))
		return F3::call('giris');
	page('Bilgilendirme Sayfası', 'info');
}
function add() {
	if (F3::exists('SESSION.key')) // bu bir direkt erişim mi?
		return F3::call('giris');
	page('Kaydet', 'new');
}
function edit() {
	if (! F3::exists('data')) // bu bir direkt erişim mi?
		return F3::call('giris');
	page('Düzenle', 'edit');
}
function find() {
	page('Bul', 'find');
}
function ok() {
	page('İnceleme Sonuçları', 'ok');
}
function review() {
	page('Listelendi', 'review');
}
function giris() {
	// nerede bizim istediğimiz tablolar ?
	F3::set('SESSION.TABLES', array(
				      'discipline' => 'discipline_id',
				      'parent' => 'parent_id',
				      'd_survey' => 'd_survey_id',
				      'story' => 'story_id',
				      'patient' => 'patient_id',
				      'survey' => 'survey_id',
				      'event' => 'event_id',
				      'result' => 'result_id',
				      'announcement' => 'announcement_id'
			      ));
	F3::set('SESSION.TABLE_INIT', 'discipline'); // login olursa, default olarak admin tablosu seçilsin

	if (F3::get('SESSION.tutor'))
		return F3::call('home');
	page('Yönetici Paneli', 'login'); // adminlayout sadece login sayfası için
}

function logout() {
	if (F3::get('SESSION.tutor')) {
		F3::clear('SESSION.tutorusername'); // admin özelliği sil
		F3::clear('SESSION.tutorpassword'); // ek admin özellikleri sil
		F3::clear('SESSION.tutor');         // admin özelliği sil
		F3::clear('SESSION.tutorsuper');    // ek admin özellikleri sil // TODO bu özelliğin silinmesi mantıklı
		F3::clear("SESSION.TABLE_INIT");    // ilk_tablo bilgisini sil
		F3::clear("SESSION.TABLE");         // tablo bilgisini sil
		F3::clear("SESSION.KEY");           // tablo uniq key'i sil
	}
	F3::reroute('/');
}

F3::config("../.f3.ini");
F3::set('DB', new DB('mysql:host=localhost;port=3306;dbname=' . F3::get('dbname'), F3::get('dbuser'), F3::get('dbpass')));
F3::set('SR', '/' . strtok($_SERVER["SCRIPT_NAME"], '/'));

F3::route("GET  /*",      'giris');
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
F3::route("POST /ok",    'ok');
F3::route("POST /add",   'add.php');
F3::route("POST /find",  'find.php');
F3::route("POST /del",   'del.php');
F3::route("GET  /edit*",  'edit');
F3::route("POST /edit",  'edit.php');
F3::route("POST /update",'update.php');

F3::run();

?>

