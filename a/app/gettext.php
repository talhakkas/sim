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


		function _e($text) {
			return T_($text);
			//return sprintf( T_($text), 7 );
		}

		echo _e("This is how the story goes.\n\n");
		echo _e("foo");

		//$this->_page('personal', 'Kişisel Bilgileriniz');
	}

	function lang() {
		$lang = F3::get("PARAMS.lang");
		echo $lang;
		echo "burası bar";
	}

	function beforeroute() {
		if (! F3::get('SESSION.isLogin'))
			return F3::reroute('/');
	}

	function afterroute() {
		//echo Template::serve('layout.htm');
	}
}


