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

	function page404() {
		$this->_page('404', 'Sayfa Bulunamadı');
	}

	function beforeroute() {
		//if (! F3::get('SESSION.isLogin'))  return F3::reroute('/');
	}

	function afterroute() {
		// dil blgisi için nerden geldiğimizi set edelim
		F3::set('SESSION.localize', F3::get('PARAMS.0'));
		echo Template::serve('a/layout.htm');
	}
}
