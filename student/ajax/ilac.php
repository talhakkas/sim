<?

require_once  '../../asset/depo.php';

# Connect to the database
mysql_pconnect("localhost", $db_user, $db_pass) or die("Could not connect");
mysql_select_db($db_name) or die("Could not select database");

# Perform the query
$query = sprintf("SELECT id, name from drug WHERE name LIKE '%%%s%%' ORDER BY popularity DESC LIMIT 10", mysql_real_escape_string($_GET["drugs"]));

$arr = array();
$rs = mysql_query($query);

# Collect the results
while($obj = mysql_fetch_object($rs)) {
    $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;



?>
