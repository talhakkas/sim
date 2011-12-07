<?php
	/*
	 * Bu kitaplik `node` turune ait kitaplik islevlerini tutar.
	 */
	
function get_node($cid=NULL, $id=NULL) 
{
	// parametreler NULL ise SESSION dan al
	if($cid == NULL) 	$cid = F3::get('SESSION.cid');
	if($id  == NULL) 	$id  = F3::get('SESSION.id');

	$table = new Axon("node");
	$datas = $table->afind("id='$id' AND cid='$cid'");
	$node = $datas[0];

	// FIXME: `connector` e gore tekrar tasarla
	// $node['opts'] = get_node_options($cid, $id);
	$node['opts'] = unserialize($node['options']);

	return $node;
}

function set_node($cid=NULL, $id=NULL, $data=NULL)
{
	if($cid == NULL) 	$cid = F3::get('SESSION.cid');
	if($id  == NULL) 	$id  = F3::get('SESSION.id');
	if($data == NULL)	$data = $_POST;

	$data = zip($data);

	$table = new Axon("node");
	$table->load("id='$id' AND cid='$cid'");

	foreach($data as $gnl => $blg)
		if($gnl != "media")
			$table->$gnl = $blg;

	if(F3::get('FILES.media.name') != "") {
		$fnm = "_n". sprintf("%05d", $table->nid) . ".jpg";
		$ffnm = F3::get('uploaddir') . $fnm;
		if(yukle($ffnm, "media", true))
			$table->media = $fnm;
		else 
			$table->media = "default.jpg";
	}

	if(my_get($data, 'resim_sil') == 'evet')
		$table->media = NULL;

	$table->save();
}

/////////////////////////////////////////////////////////
function zip($data, $dbg=true) 
{
	$cid = $data['cid'];
	$id  = $data['id'];
	$ntype = $data['ntype'];

	if($dbg) print_pre($data, 'data');
	
	$node = get_node($cid, $id);
	if($dbg) print_pre($node);

	$dict = array();

	switch($ntype) {
		case 'drug':
			$dict = array("link_text" => $data['link_text'],
						  "node_link" => $data['node_link'],
						  "odul"      => $data['odul'],
						  "ceza"      => $data['ceza']
						 );
			
			$ndict = array();
			$tdrug = new Axon('drugs');
	
			$csv = $data['drugs'];
			$drugs = preg_split('/,/', $csv);
			foreach($drugs as $i=>$did) {
				$tmp = $tdrug->afind("id='$did'");
	
				$ndict[$did] = array("name" => $tmp[0]['name'],
									 "dmn"  => $tmp[0]['dmn'],
									 "dmx"  => $tmp[0]['dmx'],
									 "dval" => $tmp[0]['dval'],
									 "dayol"=> $tmp[0]['dayol']
									);
			}
	
			// ndict olup, odict (node['opts']['drugs'])'te olmayanları odict e
			// ekle ndict'te olmayıp, odict'te olanları odict'ten sil
			$dict['drugs'] = liste_senkronla($node['opts']['drugs'], $ndict);
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
			break;
		case 'dose':
			$dict = array("link_text" => $data['link_text'],
						  "node_link" => $data['node_link'],
						  "response"  => "drug:opts:drugs a bakin",
						  "odul"      => $data['odul'],
						  "ceza"      => $data['ceza']
						 );
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
	
			// dose:parent uzerinden drug:opts:drugs i guncelle
			$dnid = $data['parent'];
			$tdrug = new Axon('node');
			$tdrug->load("id='$dnid'");
			$opts = unserialize($tdrug->options);
	
			foreach($opts['drugs'] as $did=>$drug) {
				$ind = array_search($did, $data['did']);
	
				$opts['drugs'][$did]['dval']  = $data['dval'][$ind];
				$opts['drugs'][$did]['dayol'] = $data['dayol'][$ind];
			}
	
			$tdrug->options = serialize($opts);
			$tdrug->save();		
			break;
		case 'exam':
			$dict = array("link_text" => $data['link_text'],
						  "node_link" => $data['node_link'],
						  "odul"      => $data['odul'],
						  "ceza"      => $data['ceza']
						 );
	
			$dict['exams'] = liste_senkronla($node['opts']['exams'], get_stu_sel_exams($data));
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
			break;
		case 'result':
			$dict = array("link_text" => $data['link_text'],
						  "node_link" => $data['node_link'],
						  "response"  => "exam:opts:exams e bakin",
						  "odul"      => $data['odul'],
						  "ceza"      => $data['ceza']
						 );
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
			
			// once resimleri upload et!
			$emedia = array();
	
			$sz = count(F3::get('FILES.evalue.name'));
		
			for($i=0; $i<$sz; $i++) {
				$nm = F3::get("FILES.evalue.name[$i]");
				$eid = F3::get("POST.eid[$i]");
		
					if($nm != "") {
						$fnm = "_e_". sprintf("%06d", $eid) . ".jpg";
						$ffnm = F3::get('uploaddir') . $fnm;
						if(yukle2($ffnm, "evalue.tmp_name[$i]", true))
							$emedia[$eid] = $fnm;
						else 
							$emedia[$eid] = "default.jpg";
					}
			}
			// result:parent uzerinden exam:opts:exams i guncelle
			$enid = $data['parent'];
			$texam = new Axon('node');
			$texam->load("cid='$cid' AND id='$enid'");
			$opts = unserialize($texam->options);
	
			foreach($opts['exams'] as $eid=>$exam) {
				$ind = array_search($eid, $data['eid']);
	
				if(isset($emedia[$eid]))
					$opts['exams'][$eid]['value'] = $emedia[$eid];
			}
	
			$texam->options = serialize($opts);
			$texam->save();
			break;
		case 'bmap':
			$dict = array("link_text" => $data['link_text'],
						  "node_link" => $data['node_link'],
						  "odul"      => $data['odul'],
						  "ceza"      => $data['ceza']
						 );
			$nid = get_node_id(F3::get('SESSION.cid'), F3::get('SESSION.id'));
			$fnm = sprintf("%06d.jpg", $nid);
	
			if(F3::get("FILES.bmap_img.name") != "") {
				$ffnm = F3::get('uploaddir') . $fnm; 
				if(yukle2($ffnm, "bmap_img.tmp_name", true))
					$img_nm = $fnm;
				else
					$img_nm = "body_map.jpg";
			}
			else 	//node:bmap:opts:bmap:img dekini kullan!
				$img_nm = $fnm;
	
			$dict['img'] = $img_nm;
			$dict['map'] = htmlspecialchars(trim($data['bmap_map']));
	
			$dict['bmap'] = array();
			$tmp = map2dict($dict['map']);
			foreach($tmp as $i=>$m) {
				$dict['bmap'][$i] = array("name"  => $m['name'],
										  "value" => "null");
			}
		 	$data['opts'] = $dict;
			$data['options'] = serialize($dict); 
			break;
		case 'bmapr':
			$dict = array("link_text" => $data['link_text'],
				      "node_link" => $data['node_link'],
				      "response"  => "bmap:opts:bmap e bakin",
				      "odul"      => $data['odul'],
				      "ceza"      => $data['ceza']
				 );
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
			
			// once resimleri upload et!
			$bmedia = array();
	
			$sz = count(F3::get('FILES.bvalue.name'));
		
			for($i=0; $i<$sz; $i++) {
				$nm = F3::get("FILES.bvalue.name[$i]");
				$bid = F3::get("POST.bid[$i]");
		
					if($nm != "") {
						$fnm = "_b_". sprintf("%06d", $bid) . ".jpg";
						$ffnm = F3::get('uploaddir') . $fnm;
						if(yukle2($ffnm, "bvalue.tmp_name[$i]", true))
							$bmedia[$bid] = $fnm;
						else 
							$bmedia[$bid] = "default.jpg";
					}
			}
			// bmapr:parent uzerinden bmap:opts:bmap i guncelle
			$bnid = $data['parent'];
			$tbmap = new Axon('node');
			$tbmap->load("cid='$cid' AND id='$bnid'");
			$opts = unserialize($tbmap->options);
	
			foreach($opts['bmap'] as $bid=>$val) {
				$ind = array_search($bid, $data['bid']);
	
				if(isset($bmedia[$bid]))
					$opts['bmap'][$bid]['value'] = $bmedia[$bid];
			}
	
			$tbmap->options = serialize($opts);
			$tbmap->save();
			break;
		case 'immap':
			$dict = array();
			$dict['link_text'] = $data['link_text'];
			$dict['node_link'] = $data['node_link'];
			$dict['odul'] = $data['odul'];
			$dict['ceza'] = $data['ceza'];
			
			$dict['immap'] = unserialize(htmlspecialchars_decode($data['immap']));;
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
			break;
		case 'immapr':
			$dict = array("link_text" => $data['link_text'],
				      "node_link" => $data['node_link'],
				      "response"  => "bmap:opts:bmap e bakin",
				      "odul"      => $data['odul'],
				      "ceza"      => $data['ceza']
				 );
	
			$data['opts'] = $dict;
			$data['options'] = serialize($dict);
	
			// immapr:parent uzerinden immap:opts:immap i guncelle
			$inid = $data['parent'];
			$timap = new Axon('node');
			$timap->load("cid='$cid' AND id='$inid'");
			$opts = unserialize($timap->options);
	
			$opts['immap'] = array('x' => $data['x'],  'y' => $data['y'],
					       'x2'=> $data['x2'], 'y2'=> $data['y2'],
					       'w' => $data['w'],  'h' => $data['h'],
					       'yorum' => $data['response']
					      );
	
			$timap->options = serialize($opts);
			$timap->save();
			break;
		case 'dal':
			$sz = sizeof($data['link_text']);
			
			$chkR = array_pad(array(), $sz, 'no');
			if(isset($data['chkResponse'])) {
				$sz_chk = sizeof($data['chkResponse']);
				$arr = $data['chkResponse'];
	
				for($i=0; $i < $sz_chk; $i++) {
					$j = $arr[$i] - 1;
					$chkR[$j] = 'yes';
				}
			}
			$data['chkResponse'] = $chkR;
	
			for($i=0; $i < $sz; $i++) {
				$dict[$i] = array(
								'link_text' => my_get2($data, 'link_text', $i),
								'node_link' => my_get2($data, 'node_link', $i),
								'response'  => my_get2($data, 'response',  $i),
								'chkResponse'=>my_get2($data, 'chkResponse',$i),
								'odul'      => my_get2($data, 'odul',      $i),
								'ceza'      => my_get2($data, 'ceza',      $i)
								 );	
	
				if($dict[$i]['chkResponse'] == 'no') {
						$dict[$i]['response'] = '';
				}
			}
		
			if($dbg) print_pre($dict, 'dict');
	
			$data['options'] = serialize($dict);
	
			$data = unset_arr($data, array('link_text', 'node_link', 'response', 'chkResponse',
			  								 'odul', 'ceza'));
			break;
	}										

	if($dbg) print_pre($data, 'data');

	return $data;
}

?>
