<?php

class Page extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'page/' . $template);
	}

	function help() {

		$text  = '';
		$text .= "# Dal\n"   . implode("\n", file('../sim.wiki/dal.md'));
		$text .= "# Düğüm\n" . implode("\n", file('../sim.wiki/dugum.md'));
		$text .= "# Olgu\n"  . implode("\n", file('../sim.wiki/olgu.md'));

		$text = Markdown($text);
		$text = str_replace('img/', '../sim.wiki/img/', $text);

		F3::set('helped', $text);

		// burada yardım için neler gerekebilir?
		$this->_page('help', 'Yardım Sayfası');
	}

	function news() {
		$this->_page('news', 'Yenilikler');
	}

	function announ() {
		$this->_page('announ', 'Duyurular');
	}

	function examc() {
		$this->_page('examc', 'Sınav Takvimi');
	}

	function exams() {
		$this->_page('exams', 'Sınavlar');
	}

	function beforeroute() {
		if (! F3::get('SESSION.isLogin'))
			return F3::reroute('/');
	}

	function afterroute() {
		echo Template::serve('layout.htm');
	}
}
