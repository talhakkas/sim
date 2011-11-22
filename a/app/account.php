<?php

class Account extends F3instance {

	// User authentication
	function auth() {

		$this->_checkinput();

		$username = F3::get('REQUEST.username' );
		$password = F3::get('REQUEST.password' );

		$user = new Axon('people');
		$user->load("tc='$username'");

		if ($username && $password && !$user->dry() && ($user->password == $password)) {
			F3::set('SESSION.user', $username);
			F3::set('SESSION.special', 1);
			F3::set('SESSION.admin', TRUE);
			F3::set('SESSION.user_menu', TRUE);
			return F3::reroute('/');
		}

		F3::set('error', "Yanlış kullanıcı adı veya parola");

		F3::call('Home->home');
	}

	// End the session
	function logout() {
		F3::clear('SESSION');
		F3::clear('REQUEST');
		F3::reroute('/');
	}

	// Validate username, password
	// bunu js ile kontrol edebiliriz
	function _checkinput() {
		foreach (array('username', 'password') as $alan) {
			F3::input($alan,
				function($value) use($alan) {
					$ne = $alan;
					if ($hata = denetle($value, array(
						'dolu'    => array(true, "$ne boş bırakılamaz"),
						'enaz'    => array(2,    "$ne çok kısa"),
						'enfazla' => array(127,  "$ne çok uzun"),
					))) { F3::set('SESSION.error', $hata); return; }
					F3::set("REQUEST.$alan", $value);
				}
			);
		}
	}

	function forgot() {
		$email = F3::get('REQUEST.email');

		$user = new Axon('people');
		$user->load("email='$email'");

		if (!$user->dry()) {
			// prolasını mailine gönderelim
			mail("$email", "sim parolanız", $email->password, "From:noreply");

			F3::set('error', 'Parolanız E-Mail Adresinize Gönderildi');
		}
		else
			F3::set('error', 'Bu E-Mail Adresine Sahip Bir Hesap Yoktur');

		// tekrar anasayfaya dönelim
		F3::call('Home->home');
	}

	function beforeroute() {
		//require_once 'cfg/db.php';
	}

	function afterroute() {
		echo Template::serve('a/a.htm');
	}
}
