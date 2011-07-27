<?php

// table & key
$TABLE = F3::get('SESSION.TABLE');
$KEY = F3::get('SESSION.KEY');
$key = F3::get('SESSION.key');

$table = new Axon($TABLE);

$datas = $table->afind("$KEY='$key'");

F3::set('data', $datas[0]);
return F3::call('edit');

?>
