<?php

class Gtext extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'page/' . $template);
	}

	function foo() {

		$supported_locales = array('en_US', 'tr_TR');

		$locale = (isset($_GET['lang']))? $_GET['lang'] : 'en_US';

		// gettext setup
		T_setlocale(LC_MESSAGES, $locale);

		// Set the text domain as 'en_US'
		$domain = $locale;

		T_bindtextdomain($domain, 'lang');
		T_bind_textdomain_codeset($domain, 'UTF-8');
		T_textdomain($domain);

		header("Content-type: text/html; charset=UTF-8");


		print "<p>";
		foreach($supported_locales as $l)
			print "[<a href=\"?lang=$l\">$l</a>] ";
		print "</p>\n";

		// using PHP-gettext


		function _e($text) {
			return T_($text);
			//return sprintf( T_($text), 7 );
		}

		echo _e("This is how the story goes.\n\n");
		echo _e("foo");

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
		require_once('gettext/gettext.inc');

		//if (! F3::get('SESSION.isLogin'))
		//	return F3::reroute('/');
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}


