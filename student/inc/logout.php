<?php

if (F3::get("SESSION.special") != 1)
	return F3::call('login');

F3::clear('error');
F3::set('SESSION.special', '0');
F3::set('SESSION.username', '');
F3::clear('SESSION.special');
F3::clear('SESSION.username');
F3::reroute("/");

?>

