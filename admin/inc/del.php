<?php

// table
$TABLE = F3::get('SESSION.TABLE');
$KEY = F3::get('SESSION.KEY');
$key = F3::get('REQUEST.key') ? F3::get('REQUEST.key') : F3::get('SESSION.key');

if (!adminsuper()) return F3::call('home');

$table = new Axon($TABLE);

$table->load("$KEY='$key'");

// resmi bu olsa gerek.
Image::delete($TABLE, $table->$KEY);

$table->erase();
F3::set('SESSION.SAVE', F3::get('SESSION.SAVE') - 1);

F3::clear('error');
F3::clear('SESSION.key');
F3::set('correct', "'$key'ye ait bilgiler başarıyla silindi");
return F3::call('find'); // f3.php'den fonksiyon çağırımı

?>
