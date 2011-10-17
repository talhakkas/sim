<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';

function home() {
	render('home', 'Öğretim Üyesi Paneli');
}
function info() {
	if (! F3::get('SESSION.tutor'))
		return F3::call('giris');
	render('info', 'Bilgilendirme Sayfası');
}
function add() {
	if (F3::exists('SESSION.key')) // bu bir direkt erişim mi?
		return F3::call('giris');
	render('new', 'Kaydet');
}
function edit() {
	if (! F3::exists('data')) // bu bir direkt erişim mi?
		return F3::call('giris');
	render('edit', 'Düzenle');
}
function find() {
	render('find', 'Bul');
}
function ok() {
	render('ok', 'İnceleme Sonuçları');
}
function review() {
	render('review', 'Listelendi');
}
function giris() {
	return render('bakim', 'Öğretim Üyesi Paneli'); // servisi bakıma gönder

	// nerede bizim istediğimiz tablolar ?
	F3::set('SESSION.TABLES', array(
				      'discipline' => 'discipline_id',
				      'parent' => 'parent_id',
				      'd_survey' => 'd_survey_id',
				      'story' => 'story_id',
				      'patient' => 'patient_id',
				      'survey' => 'survey_id',
				      'event' => 'event_id',
				      'node' => 'id',
				      'result' => 'result_id',
				      'announcement' => 'announcement_id'
			      ));
	F3::set('SESSION.TABLE_INIT', 'discipline'); // login olursa, default olarak admin tablosu seçilsin

	if (F3::get('SESSION.tutor'))
		return F3::call('home');
	render('login', 'Öğretim Üyesi Paneli'); // adminlayout sadece login sayfası için
}

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

