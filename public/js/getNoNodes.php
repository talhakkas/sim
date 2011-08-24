<?php
$cid = $_GET["cid"];

$con = mysql_connect('localhost', 'sim', 'maslak55');
if (!$con) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("sim", $con);

$sql="select max(id) from node where id AND cid='$cid';";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);
echo $row[0];

mysql_close($con);
?>
