<?php
$did = F3::get('PARAMS.did');

$drug = get_drug($did);

echo "<p class=name>$drug[id]:$drug[name]</p>";
echo "<p class=content>$drug[content]</p>";
?>
