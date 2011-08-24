<?php

include '../../asset/depo.php';

$DB = mysql_connect("localhost", $db_user, $db_pass) or die (mysql_error());
mysql_select_db($db_name, $DB) or die (mysql_error());
$table = mysql_query("select name from d_survey") or die (mysql_error());

$tetkik = array();
$k = 1;
while($row = mysql_fetch_array($table))
    $tetkik[$k++] = $row['name'];


$yeni = array();
for ($i = 0; $i < count($tetkik); $i++){
	if ($_POST['tetkik'.$i])
		$yeni[$i] = $tetkik[$i];
}

$parent = $_POST['parent'];

$denek = $parent . ':' . implode(',', array_keys($yeni)) . ';';
echo $denek;
//print_r( array_keys($yeni));
//print_r($yeni);

//mysql_query("insert into values result values ('','öğrenci_no','event_id','date','time','results','comment')") or die ('kaydedilemedi');


mysql_close();
echo '<center style="font-size:15px; color:red; font-weight:bold">Kaydedildi</center>';

?>
