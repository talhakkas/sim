<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid') : 1;

	$students = DB::sql("select distinct sid from tet where cid='$cid'");

	$_students = array();
	foreach ($students as $student) {
		$_puan = DB::sql("select sum(puan) as puan from tet where cid='$cid' and sid='".$student['sid']."'");
		$_students[$student['sid']] = $_puan[0]['puan'];
	}

	F3::set('case_report', $_students);

	$case = DB::sql("select * from ncase where id='$cid'");
	F3::set('case_title', $case[0]['title']);

	render('case_report', 'Olgu Puan Listesi');
?>
