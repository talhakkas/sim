<?php

include '../../asset/depo.php';

$parent = $_POST["parent_id"];

$DB = mysql_connect("localhost", $db_user, $db_pass) or die (mysql_error());
mysql_select_db($db_name, $DB) or die (mysql_error());
//$table = mysql_query("select name from d_survey where d_survey_id='$parent'") or die (mysql_error());
$table = mysql_query("select * from d_survey") or die (mysql_error());

$tetkik = array();
$k = 1;
while($row = mysql_fetch_array($table)){
    $p = substr($row['d_survey_id'], 0, 2);
    if ($p == $parent)
        $tetkik[$k++] = $row['name'];
}
mysql_close();


$box = '
<div class="black_overlay"></div>
<div class="white_content">

<script type="text/javascript" src="gui/js/customInput.jquery.js"></script>
<script type="text/javascript">
    $(function(){
	$("form#save input").customInput();
    });
</script>
';

$box .= '<form id="save">';
$box .= '<input type="hidden" name="parent" value="'.$parent.'">';
$box .= '<div class="leftcol">';
for ($i=1; $i<count($tetkik)/2; $i++){
	$box .= '<input type="checkbox" name="tetkik'.$i.'" id="check-'.$i.'" value="1" />';
	$box .= '<label for="check-'.$i.'">'.$tetkik[$i].'</label>';
}
$box .= '</div>';

$box .= '<div class="rightcol">';
for (; $i<count($tetkik)+1; $i++){
	$box .= '<input type="checkbox" name="tetkik'.$i.'" id="check-'.$i.'" value="1" />';
	$box .= '<label for="check-'.$i.'">'.$tetkik[$i].'</label>';
}
$box .= '</div>';
$box .= '</form>';

$box .= '
  <div style="height:40px; width:820px;">
  <form id="close" style="float:left;">
    <input type="button" onClick="kapat();" value="Kapat" class="small green awesome"/>
  </form>

  <form id="save" style="float:right;">
    <input type="button" onClick="kaydet();" value="Kaydet" class="small green awesome"/>
  </form>
</div>

  <div id="kaydet"> </div>
  <div id="kapat"> </div>
</div>
';

echo $box;


?>
