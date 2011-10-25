<?php

$did = F3::get('PARAMS.did');

$drug = get_drug($did);

//echo "<p class=name>$drug[id]:$drug[name]</p>";
//echo "<p class=content>$drug[content]</p>";

F3::set('show_drug', $drug['content']);

render('show_drug', $drug['id']. " id'li ilaç");

?>
