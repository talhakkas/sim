<?php
	$dbg = true;

	$cid = F3::get('PARAMS.cid');
	$eid = F3::get('PARAMS.eid');

	$dict = get_dps_id_helper($eid);
	$did = $dict['did'];		$edid = $did;
	$pid = $dict['pid'];		$epid = $did . $pid;
	$sid = $dict['sid'];		$esid = $did . $pid . $sid;

	if($dbg)	echo "DEBUG: eid=$eid, did=$did,pid=$pid,sid=$sid<br>";
	if($dbg)	echo "DEBUG: eid=$eid, edid=$edid,epid=$epid,esid=$esid<br>";

    $discs = DB::sql("select * from discipline WHERE id='$edid'");
    $parnt = DB::sql("select * from parent     WHERE id='$epid'");
    $survs = DB::sql("select * from survey     WHERE id='$esid'");

	if($dbg)	print_pre($discs, "DEBUG: discs");
	if($dbg)	print_pre($parnt, "DEBUG: parnt");
	if($dbg)	print_pre($survs, "DEBUG: survs");

	$d_nm = $discs[0]['name'];
	$p_nm = $parnt[0]['name'];
	$s_nm = $survs[0]['name'];

	echo "<h2>$d_nm=>$p_nm=>$s_nm</h2>";

    $exam = DB::sql("select * from exam     WHERE cid='$cid' AND sid='$esid'");
	if(count($exam) == 0) { // ontanimli degeri kullan.
		$exam = $survs;
	} else {
		if($dbg)	print_pre($exam, "DEBUG: exam");
	}

	if(isset($exam[0]['value'])) {
		$imgnm = $exam[0]['value'];
		echo "<img src=/a/upload/$imgnm>";
	}
?>
