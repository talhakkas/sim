<html>
<head>
<title>Tetkikler</title>
</head>

<body>

<form action=degerlendir.php method=post>

<?php
if (isset($_POST["t_radyolojik"])) {
	echo "<fieldset><legend>Radyolojik Tetkik</legend>\n";
	echo "<img src=img/radyolojik.jpg>";
	echo "<br><font color=red>Akciğer grafisi: NORMAL</font>";
	echo "</fieldset>";
}

if (isset($_POST["t_biyokimya"])) {
	echo "<fieldset><legend>Biyokimya Tetkik</legend>\n";
	echo "<img src=img/biyokimya.jpg>";
	echo "<br><font color=red>Kan Biyokimyası: NORMAL</font>";
	echo "</fieldset>";
}
?>

	<input type=submit value="Değerlendir >>">
</form>
</body>
</html>
