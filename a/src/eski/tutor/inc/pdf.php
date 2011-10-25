<?php

$TABLE = F3::get('SESSION.TABLE');

$table = new Axon($TABLE);
$table->afind();

if ($table->dry()) {
	pdf($table);
} else {
	F3::set('error', "$TABLE tablosunda kayıt yok");
}

?>
