<?php
	$dbg = true;

	$cid = F3::get('PARAMS.cid');
	$eid = F3::get('PARAMS.eid');

	$info = get_exam_info($cid, $eid, false);

	print_pre($info, 'info');

	echo "<hr>";

	$tmp['01'] = array('cid'=>1, '01' => array('pnm'=>'p001','03' => 
										array('snm' => 'foo', 
											  'fnm' => 'bar', 
											  'imgnm'=>'zoo')
									),
					   '07' => array('pnm'=>'p007','01' => 
					   					array('snm' => '1foo',
											  'fnm' => '1bar', 
											  'imgnm'=>'1zoo')
									) 
					  );

	$result = array_merge_recursive($info, $tmp);
	print_pre($result, 'result');

	$presult = exam_merge_postprocess($result);
	print_pre($presult, 'result: postprocess');
?>
