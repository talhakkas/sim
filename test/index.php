<?php

require_once  '../a/api/gettext/gettext.inc';
require_once  '../a/lib/base.php';
require_once  '../a/inc/lib.php';
require_once  'inc/admin.php';
require_once  'inc/author.php';

F3::route("GET /",      function () { render('home', 'Ana Sayfa'); } );
F3::route("GET /@page",  function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );
	F3::route("POST /@page", function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );
F3::route("GET /view/@page",  function () { render(F3::get("PARAMS.page"), F3::get("PARAMS.page")); } );

// özel postlar
F3::route('POST /tetkik', 'tetkik');
F3::route('POST /ilac', 'ilac_sonuc');

F3::route('GET /form-request', 'form-request.php');
	F3::route('POST /form-request', 'form-request.php');

//admin post
//admin#group
F3::route('GET  /admin_groupform',        'admin_groupform');
F3::route('POST /admin_groupsave',        'admin_groupsave');
F3::route('GET  /admin_groupshow/@id',    'admin_groupshow');
F3::route('GET  /admin_groupedit/@id',    'admin_groupedit');
F3::route('GET  /admin_groupdelete/@id',  'admin_groupdelete');
F3::route('GET  /admin_grouplist',        'admin_grouplist');
F3::route('POST /admin_groupupdate',      'admin_groupsave');
//admin#user
F3::route('GET  /admin_userform',         'admin_userform'); //TODO id->no olsun, otomatik id eklensin
F3::route('POST /admin_usersave',         'admin_usersave');
F3::route('GET  /admin_usershow/@id',     'admin_usershow');
F3::route('GET  /admin_useredit/@id',     'admin_useredit');
F3::route('GET  /admin_userdelete/@id',   'admin_userdelete');
F3::route('GET  /admin_userlist',         'admin_userlist');
F3::route('POST /admin_userupdate',       'admin_usersave');
//admin#member
F3::route('GET  /admin_memberform',       'admin_memberform');
F3::route('POST /admin_membersave',       'admin_membersave');
F3::route('GET  /admin_membershow/@gid',  'admin_membershow');
F3::route('POST /admin_memberedit/@gid',  'admin_memberedit');
F3::route('POST /admin_memberdelete/@gid','admin_memberdelete');
F3::route('POST /admin_memberupdate',     'admin_membersave'); //TODO
//author#case
F3::route('GET  /author_caseform',        'author_caseform');
F3::route('POST /author_caseform',        'author_caseform');
F3::run();

?>

