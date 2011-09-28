<?php

function myserialize($arr) {
	$str = '[';

	foreach($arr as $i=>$a) {
		$str .= '{"id":"' . $a['id'] . '","name":"' . $a['name'] . '"}';
	
		if($i <> (count($arr) - 1)) $str .= ',';
	}

	$str .= ']';

	return $str;
}

require_once  '../../asset/depo.php';

$q = empty($_GET['q']) ? "" : $_GET['q'];

mysql_pconnect("localhost", $db_user, $db_pass) or die("Could not connect");
mysql_select_db($db_name) or die("Could not select database");

$sql = "select * from drug where name LIKE '%$q%'";
$res = mysql_query($sql);

$arr = array();
while($r = mysql_fetch_array($res, MYSQL_ASSOC)) {
	array_push($arr, $r);
}

echo myserialize($arr);

mysql_close();
?>
