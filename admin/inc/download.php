<?php

// table
$TABLE = F3::get('SESSION.TABLE');

if (! $csv_key = F3::get('REQUEST.csv_key'))
	F3::set('error', 'Ayırıcı karakter girmelisiniz');

if (! F3::exists('error'))  {
	$table = new Axon($TABLE);
	$table->afind();

	if ($table->dry())
		Csv::download($TABLE, F3::get('DB->result'), $csv_key);
	else
		F3::set('error', "$TABLE tablosunda kayıt yok");
}
F3::call('download');
?>
