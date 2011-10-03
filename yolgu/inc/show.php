<?php
	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	takip_listesine_ekle();

	F3::set('SESSION.tdata', @takip_listesi2dizi());

	if($node['title'] == 'end') {
		F3::reroute('/rapor');
		return 1;
	}

	if($node['title'] == 'doz')
		show_node_doz($node);

	F3::set('SESSION.isspecial', 'no');
	if(in_array($node['title'], array('drug', 'doz')))
		F3::set('SESSION.isspecial', 'yes');

render('show', 'Olgu');


/* Yerel Islevler */
function show_node_doz($node) {
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
