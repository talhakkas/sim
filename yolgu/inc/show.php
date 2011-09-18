<?php
	$onceki_cid = F3::get('SESSION.cid');
	$onceki_id  = F3::get('SESSION.id');

	params2session();

	$node = get_node();
	F3::set('SESSION.data', $node);

	takip_listesine_ekle($onceki_cid, $onceki_id);

	F3::set('SESSION.tdata', takip_listesi2dizi());

	if($node['title'] == 'end') {
		render('rapor', 'Rapor');
		return 1;
	}

	$beklenen_yanit = "";
	if($node['title'] == 'doz') {
		$nodes = $node['nodes'];
		foreach($nodes as $i=>$n) {
			$t1 = $nodes[$i]["link_text"];
			$t2 = preg_split('/--/', $t1);

			$nodes[$i]['dozmu'] = 'H';
			if(count($t2) < 5) continue;			
			$nodes[$i]['dozmu'] = 'E';

			$beklenen_yanit .= $t1 . ",,";

			$nodes[$i]['isim'] = $t2[0];
			$nodes[$i]['dmin'] = $t2[1];
			$nodes[$i]['dmax'] = $t2[2];
			$nodes[$i]['dval'] = $t2[3];
			$nodes[$i]['ayol'] = $t2[4];

			unset($nodes[$i]['link_text']);
			unset($nodes[$i]['node_link']);
		}
		$node['nodes'] = $nodes;
		$node['beklenen_yanit'] = $beklenen_yanit;
		F3::set('SESSION.data', $node);

		render('doz', 'Doz');
		return 1;
	}

	render('show', 'Olgu');
?>
