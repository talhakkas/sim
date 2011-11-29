<?php

require_once  '../a/gettext/gettext.inc';
require_once  '../a/lib/base.php';
require_once  '../a/inc/lib.php';
require_once  'inc/tetkik.php';
require_once './mark/markdown.php';

// --- admin#group
function admin_groupform() {
        render('admin_groupform', 'Grup oluşturma');
}
function admin_groupsave() {
        $id = F3::get('REQUEST.group_id');
        if (!$id) { // ekleme
                $name = F3::get('REQUEST.name');

                $group = new Axon("groups");
                $group->load("name='$name'");

                if (!$group->dry()) {
                        F3::set('warning', "Bu Grup İsmine Sahip Bir Grup Zaten Var");
                        return; // TODO
                }
                else {
                        $group->name = F3::get('REQUEST.name'); // primary_key olmalı
                        $group->photo = "default.jpg"; // TODO
                        $group->save();

                        $group = new Axon("groups");// id için tekrardan çekelim
                        $group->load("name='" . F3::get('REQUEST.name') . "'");
                        return F3::reroute('/admin_groupshow/' . $group->id);
                }
        } else {
                $group = new Axon("groups");
                $group->load("id='$id'");
                $group->name = F3::get('REQUEST.name'); // primary_key olmalı
                $group->photo = "default.jpg"; // TODO
                $group->save();
                return F3::reroute('/admin_groupshow/' . $group->id);
        }
}
function admin_groupshow() {
	$group = new Axon("groups");
        $datas = $group->afind("id='" . F3::get('PARAMS.id') . "'");
        F3::set('group', $datas[0]);
        render('admin_groupshow', 'Grup göster');
}
function admin_groupedit() {
	$group = new Axon("groups");
        $datas = $group->afind("id='" . F3::get('PARAMS.id') . "'");
        F3::set('group', $datas[0]);
        render('admin_groupform', 'Grup düzenle');
}
function admin_groupdelete() {
        $id = F3::get('PARAMS.id');

        $group = new Axon('groups');
        $group->load("id='$id'");
        $group->erase();

        return F3::reroute('/admin_grouplist'); 
}
function admin_groupupdate() {
        $group = new Axon("groups");
        $group->load("id='" . F3::get('PARAMS.id') . "'");
        $group->name = F3::get('REQUEST.name');
        $group->photo = "default.jpg"; // TODO
        $group->save();
        return F3::reroute('/admin_groupshow/' . $group->id);
}
function admin_grouplist() {
        F3::set('group_list', DB::sql("select * from groups"));
        render('admin_grouplist', 'Grup düzenle');
}

// markdown
function mark() {
        $foo = file('mark/foo.md');

        $array = array('lastname', 'email', 'phone');
        $data = implode("\n", $foo);
        $text = Markdown($data);
        F3::set('markdown', $text);
        render('markdown', 'Markdown denemeler');
}
F3::route('GET /markdown', 'mark');


function ekg() {
	$isEkgResponse = empty($_POST) ? "no" : "yes";
	$yorum = empty($_POST) ? "" : $_POST['yorum'];

	F3::set('SESSION.isEkgResponse', $isEkgResponse);
	F3::set('SESSION.yorum', $yorum);

	render('ekg', 'Ekg Ekranı');
}

function tetkik() {
	$select_all = F3::get('REQUEST');

	$preselected = array();
        foreach ($select_all as $key => $value){
                if (stristr($key, 'response'))
                        foreach ($select_all[$key] as $k => $v)
                                $preselected[] = $v;
        }

	print_r($preselected);
	F3::set('tetkikmerkezi', multi($preselected));

        render('tetkik', 'Sonuçlar');
}

function immapr() {
	print_r($_POST); 
	F3::set('SESSION.secim', array( 'x' => $_POST['x'],  'y' => $_POST['y'],
		                        'x2'=> $_POST['x2'], 'y2'=> $_POST['y2'],
					'w' => $_POST['w'],  'h' => $_POST['h']));
	F3::set('SESSION.yorum', $_POST['yorum']);
	//render('immapr', 'Immap:Result');
}

function ilac_sonuc() {
        if(empty($_POST)) {
                echo "Herhangi bir ilaç seçimi yapılmamış";
                return;
        }

        $tdrug = new Axon("drugs");
        $drug = preg_split('/,/', $_POST['drugs']);
        $ilac_data = array();

        foreach($drug as $i=>$id) {
                $datas = $tdrug->afind("id='$id'");
                $name  = $datas[0]['name'];
                $content  = $datas[0]['content'];
                $ilac_data[$id] = array($name, $content);
        }

        F3::set('SESSION.ilac', $ilac_data);
        render('ilac_secilen', 'Seçilen İlaçlar');
}


F3::route("GET /",      function () { render('home', 'Ana Sayfa'); } );
F3::route("GET /@page",  function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );
F3::route("POST /@page", function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );

// özel postlar
F3::route('POST /tetkik', 'tetkik');
F3::route('POST /ilac', 'ilac_sonuc');

//admin post
F3::route('POST /admin_groupsave',       'admin_groupsave');
F3::route('GET  /admin_groupshow/@id',   'admin_groupshow');
F3::route('GET  /admin_groupedit/@id',   'admin_groupedit');
F3::route('GET  /admin_groupdelete/@id', 'admin_groupdelete');
F3::route('GET  /admin_grouplist',       'admin_grouplist');

F3::route('POST /admin_groupupdate',   'admin_groupsave');

F3::run();

?>

