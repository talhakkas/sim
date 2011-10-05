<?php

function add_new_field($dbg=true)
{
	$tnode = new Axon('node');
	$tnode->load("cid='1'");

	while(!$tnode->dry()) {
		if($tnode->ntype == 'dal') {
			$dict = unserialize($tnode->options);
			if($dbg) 	print_pre($dict, '<hr>dict');

			foreach($dict as $i=>$n) {
				$dict[$i]['chkIA'] = 'no';
				$dict[$i]['IA']    = '';
			}

			$tnode->options = serialize($dict);
			$tnode->save();
		}
		$tnode->skip();
	}

}

function convert()  
{
	$tnode = new Axon('node');
	$tnode->load("cid='1'");

	while(!$tnode->dry()) {
		$tnode->options = serialize(db_opts_convert($tnode->options, $tnode->ntype));
		$tnode->save();
		$tnode->skip();
	}
}

function db_opts_convert($opts, $type="drug", $dbg=true) {
	$dict = array();
	
	if($dbg) 	print_pre($opts, "options");

	// once dallari ayir
	$dallar = preg_split('/,,/', $opts);
	if($dbg) 	print_pre($dallar, "dallar");

	foreach($dallar as $i=>$d) {
		$td = preg_split('/::/', $d);
		if($dbg) print_pre($td, "td");

		$text_resp = my_get($td, 0);

		$tr = preg_split('/;;/', $text_resp);
		$link_text = my_get($tr, 0);
		$response  = my_get($tr, 1);

		if($type == 'drug') {
			$tdrug = preg_split('/\.\./', $response);
			if($dbg);	print_pre($tdrug, "tdrug");

			$response = $tdrug;
		} elseif($type == 'dose') {
			$tdose = preg_split('/\.\./', $response);
			if($dbg);	print_pre($tdose, "tdose");

			$response = array();
			foreach($tdose as $i=>$d) {
				$tds = preg_split('/--/', $d);
				if($dbg);	print_pre($tds, "tdose-dose");

				$response[$i]['did']  = my_get($tds, 0);
				$response[$i]['dmn']  = my_get($tds, 1);
				$response[$i]['dmx']  = my_get($tds, 2);
				$response[$i]['dval'] = my_get($tds, 3);
			}			
		}

		$node_link = my_get($td, 1);
		$odul      = my_get($td, 2);
		$ceza      = my_get($td, 3);
		
		$dict[$i]['link_text'] = $link_text;
		$dict[$i]['node_link'] = $node_link;
		$dict[$i]['response']  = $response;
		$dict[$i]['odul'] 	   = $odul;
		$dict[$i]['ceza'] 	   = $ceza;
	}

	if($dbg) print_pre($dict, "dict");

	return $dict;
}
?>
