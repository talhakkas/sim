<?php

if(empty($_POST)) {
	echo "Herhangi bir ilaç seçimi yapılmamış";
	return;
}

echo "<h2>Seçilen İlaçlar</h2>";

$tdrug = new Axon("drug");

$drug = preg_split('/,/', $_POST['drugs']);

$ilac_data = array();

foreach($drug as $i=>$id) {
	$datas = $tdrug->afind("id='$id'");
	$name  = $datas[0]['name'];

	$ilac_data[$id] = $name;

	//echo "<a href=http://www.hekimce.com/ilacrehberi.php?ilac=$id>$name</a> <br>";
}

F3::set('SESSION.ilac', $ilac_data);

render('ilac_secilen', 'Seçilen İlaçlar');

?>
