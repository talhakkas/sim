<?php

$resp = $_GET["resp"];
$state = $_GET["state"];

echo "resp = $resp<br>";

if ($state == "true")
	echo "Ambulans <a href=20-ambulans.html>gelir";
else
	echo "Olgunun sonu";
?>

