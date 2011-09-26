<?

#
# Example PHP server-side script for generating
# responses suitable for use with jquery-tokeninput
#

# Connect to the database
mysql_pconnect("localhost", "sim", "maslak55") or die("Could not connect");
mysql_select_db("sim") or die("Could not select database");

//echo '[{"id":"978","name":'.$_GET["q"].'"cha$e"},{"id":"1530","name":"The Life and Times of Tim"}]';
# Perform the query
$query = sprintf("SELECT tc, name from mytable WHERE name LIKE '%%%s%%' ORDER BY popularity DESC LIMIT 10", mysql_real_escape_string($_GET["q"]));
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
#echo $json_response;

echo '
[{"id":"1530","name":"The Life and Times of Tim"},{"id":"1210","name":"Kenny vs. Spenny"},{"id":"1394","name":"Shark"},{"id":"1395","name":"Shaun the Sheep"},{"id":"1398","name":"Side Order of Life"},{"id":"1397","name":"Shear Genius"},{"id":"1396","name":"Seinfeld"}]'

//echo '[{"id":"978","name":"cha$e"},{"id":"1530","name":"The Life and Times of Tim"}]';
//echo 'emineker';

?>
