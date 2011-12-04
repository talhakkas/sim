<?php
function admin_groupform() {
        render('admin_groupform', 'Grup oluşturma');
}
function admin_grouplist() {
        F3::set('group_list', DB::sql("select * from groups"));
        render('admin_grouplist', 'Grup düzenle');
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
function admin_groupupdate() {
        $group = new Axon("groups");
        $group->load("id='" . F3::get('PARAMS.id') . "'");
        $group->name = F3::get('REQUEST.name');
        $group->photo = "default.jpg"; // TODO
        $group->save();
        return F3::reroute('/admin_groupshow/' . $group->id);
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
function admin_groupdelete() {
        $id = F3::get('PARAMS.id');

        $group = new Axon('groups');
        $group->load("id='$id'");
        $group->erase();

        return F3::reroute('/admin_grouplist'); 
}

// USER
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
                return F3::reroute('/admin_usershow/' . $user->id);
        }
}
function admin_usershow() {
        $user = DB::sql("select * from users where id='" . F3::get('PARAMS.id') . "'");
        F3::set('user', $user[0]);
        render('admin_usershow', 'Grup göster');
}
function admin_useredit() {
        $user = DB::sql("select * from users where id='" . F3::get('PARAMS.id') . "'");
        F3::set('user', $user[0]);
        render('admin_userform', 'Grup düzenle');
}
function admin_userdelete() {
        $id = F3::get('PARAMS.id');

        $user = new Axon('users');
        $user->load("id='$id'");
        $user->erase();

        return F3::reroute('/admin_userlist');
}
function admin_userlist() {
        F3::set('user_list', DB::sql("select * from users"));
        render('admin_userlist', 'Grup düzenle');
}

// -- admin#member
function admin_memberform() {
        $groups = DB::sql("select * from groups");
        $member = new Axon("member");

        $unassignment_groups = array();
        foreach ($groups as $group)
                if (!$member->found("gid='".$group['id']."'"))
                        array_push($unassignment_groups, $group);

        F3::set('unassignment_groups', $unassignment_groups);
        F3::set('unselect_users', DB::sql("select * from users where utype = '5'")); // type=5 for student
        render('admin_memberform', 'Üye oluşturma');
}
function admin_membersave() {
        if (!F3::get('REQUEST.select_group_id')) {
                F3::set('warning', "Hiç grup(sınıf) kalmadı!");
                render('admin_memberform', 'Üye oluşturma');
        }
        if (!F3::get('REQUEST.user_ids')) {
                F3::set('warning', "Atanacak hic öğrenci kalmadı!");
                render('admin_memberform', 'Üye oluşturma');
        }
        foreach (F3::get('REQUEST.user_ids') as $user_id) {
                $member = new Axon('member');
                $member->uid = $user_id;
                $member->gid = F3::get('REQUEST.select_group_id');
                $member->save();
        }
        return F3::reroute('/admin_membershow/' . F3::get('REQUEST.select_group_id'));
}
function admin_membershow() {
        $group = DB::sql("select * from groups where id='" . F3::get('PARAMS.gid') . "'");
        F3::set('group', $group[0]);

        $users = DB::sql("select * from users where utype = '5'"); // type=5 for student
        $member = new Axon("member");

        $select_users = array();
        foreach ($users as $user)
                if ($member->found("uid ='".$user['id']."' and gid='".F3::get('PARAMS.gid')."'"))
                        array_push($select_users, $user);

        F3::set('select_users',   $select_users);
        render('admin_membershow', 'Üye göster');
}
function admin_memberedit() {
        $groups = DB::sql("select * from groups");
        $member = new Axon("member");

        $unassignment_groups = array();
        foreach ($groups as $group)
                if (!$member->found("gid='".$group['id']."'") && $group['id'] != F3::get('PARAMS.gid'))
                        array_push($unassignment_groups, $group);

        $select_group = DB::sql("select * from groups where id='" . F3::get('PARAMS.gid') . "'");
        F3::set('select_group',   $select_group[0]);
        F3::set('unassignment_groups',   $unassignment_groups);

        $users = DB::sql("select * from users where utype = '5'"); // type=5 for student
        $member = new Axon("member");

        $select_users = array();
        $unselect_users = array();
        foreach ($users as $user)
                if ($member->found("uid ='".$user['id']."' and gid='".F3::get('PARAMS.gid')."'"))
                        array_push($select_users, $user);
                else
                        array_push($unselect_users, $user);

        F3::set('select_users',   $select_users);
        F3::set('unselect_users', $unselect_users);

        render('admin_memberform', 'Üye göster');
}
function admin_memberdelete() {
        $id = F3::get('PARAMS.gid');

        $member = new Axon('member');
        $member->load("gid='$id'");
        $member->erase();

        return F3::reroute('/admin_grouplist'); 
}
?>
