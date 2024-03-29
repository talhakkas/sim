<?php

class Account extends F3instance {

	// User authentication
	function auth() {

		F3::set('SESSION.allow', array(1 => 'Yönetici', 3 => 'Hoca', 5 => 'Öğrenci'));

		$this->_checkinput();

		$username = F3::get('REQUEST.username' );
		$password = F3::get('REQUEST.password' );

		$user = new Axon('users');
		$user->load("id='$username'");

		if ($username && $password && !$user->dry() && ($user->password == $password)) {
			F3::set('SESSION.user', $username);
			F3::set('SESSION.isLogin', TRUE);

			// kullanıcı bilgilerinin güncel halini set edelim
			$this->set_user_info($username);

			switch ($user->utype) {
			case 1:
				F3::set('SESSION.isAdmin', TRUE);
				break;
			case 3:
				F3::set('SESSION.isAuthor', TRUE);
				break;
			case 5:
				F3::set('SESSION.isStudent', TRUE);
				break;
			}

			return F3::reroute('/');
		}

		F3::set('error', "Yanlış kullanıcı adı veya parola");

		F3::call('Home->home');
	}

	static function set_user_info($username) {
			$info = DB::sql("select * from users where id='$username'");
			$info[0]['fullname'] = $info[0]['name'] . ' ' . $info[0]['surname'];
			F3::set('SESSION.userinfo', $info[0]);
	}

	// End the session
	function logout() {
		F3::clear('SESSION');
		F3::clear('REQUEST');
		unset($_POST);
		unset($_GET);
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

		$user = new Axon('users');
		$user->load("email='$email'");

		if (!$user->dry()) {
			$to = $user->email;
			$from = "From:noreply@sim.omu.edu.tr";
			$subject = "sim parolası";
			$message = "parolanız: " . $user->password;

			// prolasını mailine gönderelim
			mail($to, $subject, $message, $from);

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
		echo Template::serve('a/layout.htm');
	}
}
