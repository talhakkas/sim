<?php

// table & key
$TABLE = F3::get('SESSION.TABLE');
$KEY = F3::get('SESSION.KEY');
$csv_key = F3::get('REQUEST.csv_key');
$csv_file = F3::get('FILES.csv_file');

$csv_file_name = date("Y-m-d_h:i:s");
$up = new Upload(array('csv'));

if ($response = ($up->load($TABLE, $csv_file_name, $csv_file, true)))
	if (! $response[0])
		F3::set('error', $response[1]);

if (F3::exists('error')) // yükleme sırasında hata var mı?
	return F3::call('upload'); // csv upload page

F3::get('DB')->schema($TABLE, 0);// 0 nolu kayıt gibi Field alanlarını al.
$fields = F3::get('DB->result'); // gerçek alanlar

$csv_path = '../public/upload/' . $TABLE . '/' . $csv_file_name . '.csv';

$_rows = Csv::read($csv_path, $csv_key);
$_fields = array_shift($_rows);

foreach ($_rows as $row) {
	$table = new Axon($TABLE);

	foreach ($fields as $field_info)
		$table->$field_info['Field'] = "";

	$table->photo = F3::get('default_image'); // default resim
	foreach ($_fields as $field)
		$table->$field = array_shift($row);
	$table->save();
}


F3::reroute('/review');

?>
