<?php
	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	/* FIXME: data:options a gore yeniden tasarla.
	takip_listesine_ekle();
	F3::set('SESSION.tdata', @takip_listesi2dizi());

	if($node['ntype'] == 'report') {
		F3::reroute('/rapor');
		return 1;
	}
	*/

	// FIXME: data:options a gore yeniden tasarla.
	if($node['ntype'] == 'dose')
		show_node_doz($node);

render('show', 'Olgu');


/* Yerel Islevler */
function show_node_doz($node) 
{
	/*$pid = $_POST['onceki_id'];
	$cid = F3::get('SESSION.cid');

	$tnode = new Axon('node');
	$datas = $tnode->afind("id='$pid' AND cid='$cid'");
	$opts = $datas[0]['options'];

	$tmp = preg_split('/;;/', $opts);
	$tmp = $tmp[1];
	$tmp = preg_split('/::/', $tmp);
	$tmp = $tmp[0];
	$tmp = preg_split('/,/', $tmp);


	$drug_doz = array();
	foreach($tmp as $i=>$did) {
		$tdrug = new Axon('drugs');
		$tdrug->load("id='$did'");

		$drug_doz[$i]['isim'] = $tdrug->name;
	}*/

		$tdoz = "";
		$tayol = "";
		$nodes = $node['nodes'];
		foreach($nodes as $i=>$n) {
			$t1 = $nodes[$i]["link_text"];
			$t2 = preg_split('/--/', $t1);

			$nodes[$i]['dozmu'] = 'H';
			if(count($t2) < 5) {
				$sonraki_id = $nodes[$i]['node_link'];
				continue;			
			}
			$nodes[$i]['dozmu'] = 'E';

			$nodes[$i]['isim'] = $t2[0];
			$nodes[$i]['dmin'] = $t2[1];
			$nodes[$i]['dmax'] = $t2[2];
			$nodes[$i]['dval'] = $t2[3];
			$nodes[$i]['ayol'] = $t2[4];

			$tdoz  .= $t2[3] . "--";
			$tayol .= $t2[4] . "--";

			//unset($nodes[$i]['link_text']);
			//unset($nodes[$i]['node_link']);
		}
		$beklenen_yanit = "doz::$tdoz,,ayol::$tayol";
		$node['nodes'] = $nodes;
		$node['beklenen_yanit'] = $beklenen_yanit;
		$node['sonraki_id'] = $sonraki_id;
		F3::set('SESSION.data', $node);

	//render('doz_osec', 'Doz');
}
?>
