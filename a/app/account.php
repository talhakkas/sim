<?php

class Account extends F3instance {

	// Display our home page
	function login() {
		if (F3::get('SESSION.admin'))
			return F3::call('Home->home');
		F3::call('Home->login');
	}

	// User authentication
	function auth() {

		$this->_checkinput();

		$username = F3::get('REQUEST.username' );
		$password = F3::get('REQUEST.password' );

		$student = new Axon('people');
		$student->load("tc='$username'");

		if ($username && $password && !$student->dry() && ($student->password == $password)) {
			F3::set('SESSION.student', $username);
			F3::set('SESSION.stdno',   $student->no);
			F3::set('SESSION.special', 1);
			F3::set('SESSION.isstudent', TRUE);
			F3::set('SESSION.kop', TRUE);
			//return F3::reroute('/clist');
			return F3::reroute('/');
		}
		F3::set('error', "Yanlış kullanıcı adı veya parola");

		F3::call('Account->login');
	}

	// End the session
	function logout() {
		F3::clear('SESSION');
		F3::clear('REQUEST');
		F3::reroute('/');
	}

	// Validate username, password
	// bunu js ile kontrol ediyoruz
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

		$user = new Axon('user');
		$user->load("email='$email'");

		if (!$user->dry()) {
			/*
			 * sen unuttun da parolanı biz nası gönderecez?
			 */

			F3::set('success', 'Parolanız E-Mail Adresinize Gönderildi');
		}
		else
			F3::set('warning', 'Bu E-Mail Adresine Ait Bir Kullanıcı Hesabı Yoktur');

		// tekrar anasayfaya dönelim
		$this->login();
	}

	function page_reload() {
		$this->_page(F3::get('PARAMS.page'), 'Örnek Sayfa');
	}

	function beforeroute() {
		//require_once 'cfg/db.php';
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}
