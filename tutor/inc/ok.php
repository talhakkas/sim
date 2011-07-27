<?php

$TABLE = F3::get('SESSION.TABLE');
$KEY = F3::get('SESSION.KEY');

$table = new Axon($TABLE);

$key = F3::get('SESSION.key');
$datas = $table->afind("$KEY='$key'");

F3::set('data', $datas[0]);
return F3::call('ok');

?>
