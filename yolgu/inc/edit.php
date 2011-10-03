<?php
	params2session();

	F3::set('SESSION.data', get_node());

	F3::set('SESSION.nofbs', count(F3::get('SESSION.data[nodes]')));

	$all_nodes = nodeList(F3::get('SESSION.cid'));
	F3::set('SESSION.all_nodes', $all_nodes);

	F3::set('SESSION.isspecial', 'no');
	if(in_array(F3::get("SESSION.data['title']"), array('drug', 'doz')))
		F3::set('SESSION.isspecial', 'yes');

	// FIXME: fonksiyona donusturulecek
	if(F3::get('SESSION.data[title]') == 'drug')
	{
		$drugs = F3::get('SESSION.data[nodes][0][IA]');
		$drug = preg_split('/,/', $drugs);

		$tdrug = new Axon("drugs");

		$ilac_data = array();
		foreach($drug as $i=>$id) {
			$datas = $tdrug->afind("id='$id'");
			$name  = $datas[0]['name'];

			$ilac_data[$id] = $name;
		}

		F3::set('SESSION.ilac', $ilac_data);
	}

	render('node', 'Düzenle');
?>
