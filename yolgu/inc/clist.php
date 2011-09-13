<?php
	$table = new Axon("ncase");
	$datas = $table->find("cid", "cid asc");
	$sz = count($datas);

	$data = array();
	for($i=0; $i < $sz; $i++) {
		$data[$i]['cid']   = $datas[$i]->cid;
		$data[$i]['title'] = $datas[$i]->title;
		$data[$i]['description'] = $datas[$i]->description;
	}

	F3::set('SESSION.cdata', $data);
    
	render('clist', 'Listele');
?>
