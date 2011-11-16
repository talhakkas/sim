<?php

class User extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'user/' . $template);
	}

	function user_list() {
		F3::set('user_list', DB::sql('select * from user'));
		$this->_page('user_list', 'Kullanıcılar Listeleniyor');
	}

	function add() {
		$this->_page('user_add', 'Kullanıcı Ekle');
	}

	function add_post() {

		$id = F3::get('REQUEST.user_id');

		/*
		 * kullanıcı ekleme işlemleri
		 *
		 * id yoksa yeni kullanıcı eklenecek demektir
		 * bu durum için username çakışmasını önlememiz lazım
		 */

		if (!$id) {
			$username = F3::get('REQUEST.username');

			$person = new Axon("user");
			$person->load("username='$username'");

			if (!$person->dry()) {
				F3::set('warning', "Bu Kullanıcı Adına Sahip Bir Kullanıcı Zaten Var");
				return $this->add();
			}
			else {
				if (F3::get('REQUEST.password') != F3::get('REQUEST.password2')) {
					F3::set('user', $person);
					F3::set('warning', 'Kullanıcı Parolası Eşleşmiyor');
					return $this->add();
				}

				$person->username = $username;
				$person->first_name = F3::get('REQUEST.first_name');
				$person->last_name = F3::get('REQUEST.last_name');
				$person->email = F3::get('REQUEST.email');
				$person->tel = F3::get('REQUEST.tel');
				$person->password = F3::get('REQUEST.password');
				$person->save();
			}

			F3::set('success', "Yeni Bir Kullanıcı Eklendi");

			return $this->user_list();
		}

		/*
		 * kullanıcı güncelleme işlemleri
		 */

		else {
			if (F3::get('REQUEST.password') != F3::get('REQUEST.password2')) {
				F3::set('user', $person);
				F3::set('warning', 'Kullanıcı Parolanız Eşlenemiyor');
				return $this->add();
			}

			$person = new Axon("user");
			$person->load("user_id='$id'");

			$person->username = F3::get('REQUEST.username');
			$person->first_name = F3::get('REQUEST.first_name');
			$person->last_name = F3::get('REQUEST.last_name');
			$person->email = F3::get('REQUEST.email');
			$person->tel = F3::get('REQUEST.tel');
			$person->password = F3::get('REQUEST.password');
			$person->save();

			F3::set('success', 'Kullanıcı Bilgileri Güncellendi');

			$this->user_list();
		}
	}

	function edit() {
		// kullanıcı ID
		$id = F3::get('PARAMS.id');
		// sorgula
		$user = DB::sql("select * from user where user_id='$id'");

		if (count($user)) {
			F3::set('user', $user[0]);
			$this->_page('user_add', 'Kullanıcı Düzenle');
		}

		// tekrar kullanıcıları listele
		F3::reroute('/user_list');
	}

	function show() {
		// kullanıcı ID
		$id = F3::get('PARAMS.id');
		// sorgula
		$user = DB::sql("select * from user where user_id='$id'");

		if (count($user)) {
			F3::set('user', $user[0]);
			$this->_page('user_show', 'Kullanıcı Gösteriliyor');
		}

		// tekrar kullanıcıları listele
		F3::reroute('/user_list');
	}

	function delete() {
		// kullanıcı ID
		$id = F3::get('PARAMS.id');

		$user = new Axon('user');
		$user->load("user_id='$id'");
		$user->erase();

		// tekrar kullanıcıları listele
		F3::reroute('/user_list');
	}

	function all_delete() {
		// toplu silinecek kullanıcıların id'leri bir array'de
		$all = F3::get('REQUEST.selected');

		foreach ($all as $key => $val)
			DB::sql("delete from user where user_id=$val");

		// tekrar listelemeye gönder
		F3::reroute("/user_list");
	}

	function beforeroute() {
		if (! F3::get('SESSION.admin'))  return F3::reroute('/');
	}
	function afterroute() {
		echo Template::serve('layout.htm');
	}
}
