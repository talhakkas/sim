<?php

class Page extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'page/' . $template);
	}

	function personal() {
		$username = F3::get('SESSION.user');
		$user = DB::sql("select * from users where tc='$username'");
		F3::set('user', $user[0]);

		$this->_page('personal', 'Kişisel Bilgileriniz');
	}

	function update() {
		// oturumdaki kullanıcı adı ile işlem yapalım
		$username = F3::get('SESSION.user');

		$user = new Axon("users");
		$user->load("tc='$username'");

		if (F3::get('REQUEST.password') != F3::get('REQUEST.password2')) {
			F3::set('warning', 'Kullanıcı Parolası Eşlenemiyor');
			return $this->personal();
		}

		$user->tc = F3::get('REQUEST.tc');
		$user->name = F3::get('REQUEST.name');
		$user->surname = F3::get('REQUEST.surname');
		$user->email = F3::get('REQUEST.email');
		$user->password = F3::get('REQUEST.password');
		$user->save();

		F3::set('success', 'Kullanıcı Bilgileri Güncellendi');

		$this->personal();
	}

	function help() {
		// burada yardım için neler gerekebilir?
		$this->_page('help', 'Yardım Sayfası');
	}

	function page_reload() {
		$this->_page(F3::get('PARAMS.page'), 'Örnek Sayfa');
	}

	function beforeroute() {
		if (! F3::get('SESSION.isLogin'))
			return F3::reroute('/');
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}


