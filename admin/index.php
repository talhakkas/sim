<?php

require_once '../lib/base.php';
require_once '../asset/lib.php';

function download() {
	render('download', 'Tablo Indirme');
}
function upload() {
	render('upload', 'Tablo Yükleme');
}
function home() {
	render('home', 'Yönetici Paneli');
}
function info() {
	render('info', 'Bilgilendirme Sayfası');
}
function add() {
	render('new', 'Kaydet');
}
function edit() {
	render('edit', 'Düzenle');
}
function find() {
	render('find', 'Bul');
}
function show() {
	render('show', 'İnceleme Sonuçları');
}
function review() {
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
function login() {
	// tablo ve alanlarımız
	include 'config/session_table_field.php';

	if (F3::get('SESSION.admin'))  return F3::call('home'); // f3.php'den fonksiyon çağırımı
	render('login', 'Yönetici Paneli'); // adminlayout sadece login sayfası için
}

F3::route("GET  /*",        'login');        // login page
F3::route("POST /login",    'login.php');    // login action
F3::route('GET  /logout',   'logout');       // logout action
F3::route('POST /table',    'table.php');    // table action

F3::route("GET  /printly",  'printly');
F3::route("GET  /info",     'info');         // info page
F3::route("GET  /review",   'review.php');   // review action
F3::route("GET  /download", 'download');     // csv download page
F3::route("POST /download", 'download.php'); // csv download action
F3::route("GET  /upload",   'upload');       // csv upload page
F3::route("POST /upload",   'upload.php');   // csv upload action
F3::route("GET  /new",      'new.php');      // new page
F3::route("POST /add",      'add.php');      // new action
F3::route("GET  /find",     'find');         // find page
F3::route("POST /find",     'find.php');     // find action
F3::route("GET  /show",     'show');         // show page
F3::route("POST /del",      'del.php');      // del action
F3::route("POST /edit",     'edit.php');     // edit action
F3::route("POST /update",   'update.php');   // update action

F3::run();

?>
