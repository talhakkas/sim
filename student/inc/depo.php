<?php

/*
function olc($kes){
	return substr($kes, 1, strlen($kes)-2);
}

function config($file) {
	$_file = file($file);
	$_ini = array(
		'dbname' => '',
		'dbuser' => '',
		'dbpass' => '',
	);
	foreach ($_file as $row) {
		if ($row[0] == ';' || $row == "\n")
			continue;
		$part = preg_split('/[\. | \=]/', $row);
		if (array_key_exists($part[0], $_ini)){
			if (count($part) == 3) {
				$part[2] = trim($part[2]);
				$_ini[$part[0]][$part[1]] = olc($part[2]);
			}
			elseif (count($part) == 2) {
				$part[1] = trim($part[1]);
				$_ini[$part[0]] = olc($part[1]);
			}
		}
	}
	return $_ini;
}
 */

function config($file) {
	$_file = file($file);
	$_ini = array();
	foreach ($_file as $row) {
		if ($row[0] == ';' || $row == "\n")
			continue;
		$part = preg_split('/[\. | \=]/', $row);
		$_ini[$part[0]] = substr($part[1], 1, strlen($part[1])-3);
	}
	return $_ini;
}

$db = config("../../.f3.ini");
$db_name = $db['dbname'];
$db_user = $db['dbuser'];
$db_pass = $db['dbpass'];

?>
