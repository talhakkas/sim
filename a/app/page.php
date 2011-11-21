<?php

class Page extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'page/' . $template);
	}

	function personal() {
		//$username = F3::get('SESSION.user');
		//$user = DB::sql("select * from people where username='$username'");
		//F3::set('bilmemne', $user);

		$this->_page('personal', 'Kişisel Bilgileriniz');
	}

	function help() {
		$this->_page('help', 'Yardım Sayfası');
	}

	function page_reload() {
		$this->_page(F3::get('PARAMS.page'), 'Örnek Sayfa');
	}

	function beforeroute() {
		if (! F3::get('SESSION.admin'))
			return F3::reroute('/');
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}


