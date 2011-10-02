<?php

if(empty($_POST)) {
	echo "Herhangi bir ilaç seçimi yapılmamış";
	return;
}
$tdrug = new Axon("drugs");

$drugs = $_POST['drugs'];

/* hoca modunda beklenen ilac alanina ve
 * ogr. modunda soylenen ilac alanina kaydet
 */

$drug = preg_split('/,/', $drugs);

$ilac_data = array();

foreach($drug as $i=>$id) {
	$datas = $tdrug->afind("id='$id'");
	$name  = $datas[0]['name'];
	$content  = $datas[0]['content'];

	$ilac_data[$id] = array($name, $content);

	//echo "<a href=http://www.hekimce.com/ilacrehberi.php?ilac=$id>$name</a> <br>";
}

F3::set('SESSION.ilac', $ilac_data);

render('ilac_goster', 'Seçilen İlaçlar');

?>
