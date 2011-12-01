<?php

class Page extends F3instance {

	function _page($template, $title, $notice = NULL) {
		F3::set('page_title', $title);
		F3::set('template', 'page/' . $template);
	}

	function help() {
		$file = file('https://raw.github.com/wiki/19/sim/olgu.md');

		$text = implode("\n", $file);
		$text = Markdown($text);
		$text = str_replace('img/', 'https://raw.github.com/wiki/19/sim/img/', $text);

		F3::set('helped', $text);

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
