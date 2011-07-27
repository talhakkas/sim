<?php

include 'depo.php';

//echo $_GET['page']."<br>";
//print_r($_GET);
//echo "<br>";
//echo $_GET['event']."<br>";
//echo $_GET['stdno']."<br>";
//print_r($_POST);


$page = substr($_GET['page'], 1);

$DB = mysql_connect("localhost", $db_user, $db_pass) or die (mysql_error());
mysql_select_db($db_name, $DB) or die (mysql_error());
$table = mysql_query("select name from parent where discipline_id='$page'") or die (mysql_error());

$alan = array();
$k = 1;
while($row = mysql_fetch_array($table))
	$alan[$k++] = $row['name'];
mysql_close();

$tabss = '
<script type="text/javascript">
$(document).ready(function() {
	/* see if anything is previously checked and reflect that in the view */
	$(".checklist input:checked").parent().addClass("selected");
	/* handle the user selections */
	$(".checklist .checkbox-select").click(
		function(event) {
			event.preventDefault();
			$(this).parent().addClass("selected");
			$(this).parent().find(":checkbox").attr("checked","checked");
		}
	);
	$(".checklist .checkbox-deselect").click(
		function(event) {
			event.preventDefault();
			$(this).parent().removeClass("selected");
			$(this).parent().find(":checkbox").removeAttr("checked");
		}
	);
});
</script>
';

$tabss .= '<ul class="checklist">';
for ($i=1; $i<count($alan)+1; $i++){
        $tabss .= '<form id="veri'.$page.$i.'"><li>
                <input name="'.$no.$i.'" value="1" type="checkbox" />
                <input type="hidden" name="parent_id" value="'.$page.$i.'"/>
                <label>'.$alan[$i].'</label>
                <a class="checkbox-select" href="#" onClick="gonder('.$page.$i.');">Seçin</a>
                <a class="checkbox-deselect" href="#">İptal</a>
              </li></form>';
}
$tabss .= '</ul>';

$tabss .= '<div id="sonuc"></div>';
echo $tabss;

$style = "<style>.tab_container{";
if ($i<8)
	$style .= "height:180px;";
else
	$style .= "height:360px;";

echo $style . '}</style>';

?>


