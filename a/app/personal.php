<?php

class Personal extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'personal/' . $template);
	}

	function personal() {
		$this->_page('personal', 'Kişisel Bilgileriniz');
	}

	function edit() {
		$username = F3::get('SESSION.user');
		$user = DB::sql("select * from users where id='$username'");
		F3::set('user', $user[0]);

		$this->_page('edit', 'Kişisel Bilgileriniz');
	}

	function update() {
		// oturumdaki kullanıcı adı ile işlem yapalım
		$username = F3::get('SESSION.user');

		$user = new Axon("users");
		$user->load("id='$username'");

		if (F3::get('REQUEST.password') != F3::get('REQUEST.password2')) {
			F3::set('warning', 'Kullanıcı Parolası Eşlenemiyor');
			return $this->personal();
		}

		$user->id = F3::get('REQUEST.id');
		$user->name = F3::get('REQUEST.name');
		$user->surname = F3::get('REQUEST.surname');
		$user->email = F3::get('REQUEST.email');
		$user->password = F3::get('REQUEST.password');
		$user->save();

		F3::set('success', 'Kullanıcı Bilgileri Güncellendi');

		// kullanıcı bilgilerinin güncel halini set edelim
		Account::set_user_info($username);

		$this->edit();
	}

	function beforeroute() {
		if (! F3::get('SESSION.isLogin'))
			return F3::reroute('/');
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}


