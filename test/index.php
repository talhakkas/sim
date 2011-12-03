<?php

require_once  '../a/api/gettext/gettext.inc';
require_once  '../a/lib/base.php';
require_once  '../a/inc/lib.php';

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
// END -- admin#group
// --- admin#group
function admin_userform() {
        render('admin_userform', 'Grup oluşturma');
}
function admin_usersave() {
        $id = F3::get('REQUEST.user_id');
        if (!$id) { // ekleme
                $id = F3::get('REQUEST.id');

                $user = new Axon("users");
                $user->load("id='$id'");

                if (!$user->dry()) {
                        F3::set('warning', "Bu Grup İsmine Sahip Bir Grup Zaten Var");
                        return; // TODO
                }
                else {
                        $user->name = F3::get('REQUEST.name');
                        $user->surname = F3::get('REQUEST.surname');
                        $user->password = F3::get('REQUEST.password');
                        $user->email = F3::get('REQUEST.email');
                        $user->utype = F3::get('REQUEST.utype');
                        $user->save();

                        $user = new Axon("users");// id için tekrardan çekelim
                        $user->load("name='" . F3::get('REQUEST.name') . "'");
                        return F3::reroute('/admin_usershow/' . $user->id);
                }
        } else {
                $user = new Axon("users");
                $user->load("id='$id'");
                $user->name = F3::get('REQUEST.name');
                $user->surname = F3::get('REQUEST.surname');
                $user->password = F3::get('REQUEST.password');
                $user->email = F3::get('REQUEST.email');
                $user->utype = F3::get('REQUEST.utype');
                $user->save();
                $user->save();
                return F3::reroute('/admin_usershow/' . $user->id);
        }
}
function admin_usershow() {
	$user = new Axon("users");
        $datas = $user->afind("id='" . F3::get('PARAMS.id') . "'");
        F3::set('user', $datas[0]);
        render('admin_usershow', 'Grup göster');
}
function admin_useredit() {
	$user = new Axon("users");
        $datas = $user->afind("id='" . F3::get('PARAMS.id') . "'");
        F3::set('user', $datas[0]);
        render('admin_userform', 'Grup düzenle');
}
function admin_userdelete() {
        $id = F3::get('PARAMS.id');

        $user = new Axon('users');
        $user->load("id='$id'");
        $user->erase();

        return F3::reroute('/admin_userlist'); 
}
function admin_userupdate() {
        $user = new Axon("users");
        $user->load("id='" . F3::get('PARAMS.id') . "'");
        $user->name = F3::get('REQUEST.name');
        $user->photo = "default.jpg"; // TODO
        $user->save();
        return F3::reroute('/admin_usershow/' . $user->id);
}
function admin_userlist() {
        F3::set('user_list', DB::sql("select * from users"));
        render('admin_userlist', 'Grup düzenle');
}
// END -- admin#user
// -- admin#member
function admin_memberform() {
        $member_gids = DB::sql("select distinct gid from member");

        $group_ids = array();
        foreach ($member_gids as $member_gid)
                array_push($group_ids, $member_gid['gid']);

        if ($group_ids)
                $groups = DB::sql("select * from groups where not id in(" . implode(',', $group_ids) .")");
        else
                $groups = DB::sql("select * from groups");
        F3::set('unassignment_groups', $groups);

        $users = DB::sql("select * from users where utype = '5'"); // type=5 for student
        F3::set('users', $users);
        render('admin_memberform', 'Üye oluşturma');
}
function admin_membersave() {
		
        if (!F3::get('REQUEST.group_id')) {
                F3::set('warning', "Hiç grup(sınıf) kalmamdı!");
                render('admin_memberform', 'Üye oluşturma');
        }
        if (!F3::get('REQUEST.user_ids')) {
                F3::set('warning', "Atanacak hic öğrenci kalmamdı!");
                render('admin_memberform', 'Üye oluşturma');
        }
        foreach (F3::get('REQUEST.user_ids') as $user_id) {
                $member = new Axon('member');
                $member->uid = $user_id;
                $member->gid = F3::get('REQUEST.group_id');
                $member->save();
        }
        return F3::reroute('/admin_membershow/' . F3::get('REQUEST.group_id'));
}
function admin_membershow() {
		$user = new Axon("member");
        $datas = $user->afind("gid='" . F3::get('PARAMS.gid') . "'");
		
		$group = DB::sql("select * from groups where id='" . F3::get('PARAMS.gid') . "'");
		F3::set('group', $group[0]);

        $user = array();
        foreach ($datas as $data) {
			$b = DB::sql("select * from users where id ='" . $data['uid'] ."'");
			array_push($user, $b[0]);
		}

        F3::set('users', $user);
        render('admin_membershow', 'Üye göster');
}


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
//admin#group
F3::route('GET  /admin_groupform',       'admin_groupform');
F3::route('POST /admin_groupsave',       'admin_groupsave');
F3::route('GET  /admin_groupshow/@id',   'admin_groupshow');
F3::route('GET  /admin_groupedit/@id',   'admin_groupedit');
F3::route('GET  /admin_groupdelete/@id', 'admin_groupdelete');
F3::route('GET  /admin_grouplist',       'admin_grouplist');
F3::route('POST /admin_groupupdate',     'admin_groupsave');
//admin#user
F3::route('GET  /admin_userform',        'admin_userform');
F3::route('POST /admin_usersave',        'admin_usersave');
F3::route('GET  /admin_usershow/@id',    'admin_usershow');
F3::route('GET  /admin_useredit/@id',    'admin_useredit');
F3::route('GET  /admin_userdelete/@id',  'admin_userdelete');
F3::route('GET  /admin_userlist',        'admin_userlist');
F3::route('POST /admin_userupdate',      'admin_usersave');

F3::route('GET  /admin_memberform',      'admin_memberform');
F3::route('POST /admin_membersave',      'admin_membersave');
F3::route('GET  /admin_membershow/@gid', 'admin_membershow');
F3::run();

?>

