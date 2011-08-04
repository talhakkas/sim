<?php

include 'init.php';

// table
$TABLE = F3::get('SESSION.TABLE');

F3::get('DB')->schema($TABLE, 0);// 0 nolu kayıt gibi Field alanlarını al.
F3::set('SESSION.DB', F3::get('DB'));// 0 nolu kayıt gibi Field alanlarını al.

$fields = array();
foreach (F3::get('DB->result') as $gnl => $blg){
	echo $blg['Field'];
	array_push($fields, $blg['Field']);
}

F3::set('SESSION.fields', $fields);

$table = new Axon($TABLE);
$table->afind();

if ($table->dry())
	F3::call('review');
else
	F3::set('error', "$TABLE tablosunda kayıt yok");

?>
