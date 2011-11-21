<?php

class Home extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'a/' . $template);
	}

	function home() {
		$this->_page('home', 'Ana Sayfa');
	}

	function people() {
		$this->_page('people', 'Ekibimiz');
	}

	function work() {
		$this->_page('work', 'Çalışmalarımız');
	}

	function about() {
		$this->_page('about', 'Hakkımızda');
	}

	function contact() {
		$this->_page('contact', 'İletişim');
	}

	function beforeroute() {
		//if (! F3::get('SESSION.admin'))  return F3::reroute('/');
	}
	function afterroute() {
		echo Template::serve('a/a.htm');
	}
}
