<?php

$ad	   = $_POST['ad'];
$hid	   = $_POST['hid'];
$oyku	   = $_POST['oyku'];
$tetkikler = $_POST['tetkikler'];

echo "DBG: ad = $ad, hid=$hid, oyku=$oyku, tetkikler=$tetkikler <br>";

$user 	 ="root";
$password="root";
$database="sim";

mysql_connect(localhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$sql = "INSERT INTO `sim`.`olgu` (`id`, `hid`, `ad`, `oyku`, `tetkikler`) VALUES (NULL, \'$hid\', \'$ad\', \'$oyku\', \'$tetkikler\');";

echo $sql;

mysql_query($sql);

mysql_close();

?>
