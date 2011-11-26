<?php

if (!F3::get("SESSION.isLogin"))
	return F3::reroute('/');

$table = new Axon("ncase");
$datas = $table->find("cid", "cid asc");
$sz = count($datas);

$data = array();
for($i=0; $i < $sz; $i++) {
	$data[$i]['cid']   = $datas[$i]->cid;
	$data[$i]['title'] = $datas[$i]->title;
	$data[$i]['description'] = $datas[$i]->description;

	// örnek bir resim gönder sonra değişecek
	$data[$i]['image'] = "kucuk_n00016.jpg";
}

F3::set('SESSION.cdata', $data);

render('clist', 'Olgu Listesi');

?>
