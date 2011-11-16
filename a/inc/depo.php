<?php

// ajax kodlarını kullanması için veritabanı parola ve şifresini üretelim
function ini_config($file) 
{
	if(!file_exists($file))
		error_log("Dosya yok: $file");

	$_file = file($file);
	$_ini = array();
	foreach ($_file as $row) {
		if ($row[0] == ';' || $row == "\n")
			continue;
		$part = preg_split('/[\. | \=]/', $row);
	
		if(count($part) < 2) {	
			// error_log("Format: ozellik=deger olmaliydi. $row");
			continue;
		}

		$_ini[$part[0]] = substr($part[1], 1, strlen($part[1])-3);
	}
	return $_ini;
}

$db = ini_config("../../.f3.ini");
$db_name = $db['dbname'];
$db_user = $db['dbuser'];
$db_pass = $db['dbpass'];

?>
