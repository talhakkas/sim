<?php
	$cid = F3::get('PARAMS.cid') ? F3::get('PARAMS.cid'):1;
	F3::set('SESSION.cid', $cid);

	$sid = F3::get('SESSION.user');
	echo "cid=$cid, sid=$sid <br>";
	$sess = get_session_state($cid, $sid);

	print_pre($sess, 'sess');

	if(!$sess['isStarted']) {
		$table = new Axon("ncase");
		$datas = $table->afind("cid='$cid'");
		$cdata = $datas[0];

		$id = $cdata['bdugumu'];

		mt_srand(microtime() * F3::get('SESSION.user'));
		$skey = mt_rand();
	} else {
		$skey = $sess['skey'];	

		$id = $sess['nid'];
	}
	F3::set('SESSION.skey', $skey);
	F3::set('SESSION.id',   $id);
	F3::set('SESSION.stime', microtime(true));

	F3::reroute("/show/$cid/$id/1");	

?>
