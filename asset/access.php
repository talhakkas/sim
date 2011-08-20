<?php
function part() {
	return preg_split(
		'/\//', $_SERVER['SCRIPT_NAME']
		);
}
function root() {
	$split = part();
	return (count($split) > 1) ? $split[1] : '';
}
function base() {
	$split = part();
	return (count($split) > 2) ? $split[count($split) - 2] : '';
}
?>
