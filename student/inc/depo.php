<?php

$story = "Arkadaşları tarafından acil servise getirilen öyküsünde yarım saat önce uyluk bölgesinden bıçaklandığı belirtilen, yapılan muayenesinde sağ uyluk üstünde yara bölgesinde sızıntı şeklinde aktif kanaması olan hastaya -Uyluk bölgesinden yaralandığı belirtilen şahsın ilk müdahalesini yapıp gerekli öncül tetkikleri yaptıktan sonra yaralanma bölgesi ile ilgili acil yaklaşım gerektiren patolojik durum ne olabilir?";

$photo = "bicaklanma.jpg";

$discipline = array(
		"1" => "Radyolojik",
		"2" => "Biyokimya",
		"3" => "Patolojik",
		"4" => "Mikrobiyoloji",
		"5" => "Nükleer Tıp"
	);

$parent = array(
	"1" => array(
		"1" => 	"Direkt Radyografi İstem Formu",
		"2" => 	"Manyetik Rezonans Görüntüleme İstem Formu",
		"3" => 	"Bilgisayarlı Tomografi Görüntüleme istem Formu",
	        "4" => 	"Ultrasonografi Görüntüleme istem Formu",
		"5" =>  "Doppler Ultrasonografi İstem Formu"),
	"2" => array("1" => "b1","2" => "b2","3" => "b3","4" => "b4"),
	"3" => array("1" => "c1","2" => "c2","3" => "c3","4" => "c4"),
	"4" => array("1" => "d1","2" => "d2","3" => "d3","4" => "d4"),
	"5" => array("1" => "e1","2" => "e2","3" => "e3","4" => "e4"),
);

//1, 2
$tetkik = array(
	"Beyin MR","Diffüzyon MR","Perfüzyon MR","Bos Akım MR","Hipofiz MR","Kulak MR","Orbita MR","Nazofarinks MR",
	"Boyun MR","Akciğer ve Mediasten MR","Kardiyak MR","Anjiyografi MR","Spektroskobi MR","Üst Abdomen MR",
	"Alt Abdomen MR","Meme MR",
	"Dinamik MR","Kolanjiografi MR","Ürografi MR","Servikal Vebtebra MR",
	"Torakal Vebtebra MR","Lomber Vebtebra MR","Myelografi MR","Omuz Eklem MR","Dirsek Eklem MR","El-Bilek Eklem MR",
	"Kalça Eklem MR","Sakro-ilikal Eklem MR","Diz Eklem MR","Ayak-Bilek Eklem MR","Temporo-Mandibula Eklem MR","Artrografi MR",
);

function olc($kes){
	return substr($kes, 1, strlen($kes)-2);
}

function config($file) {
	$_file = file($file);
	$_ini = array(
		'DB' => array(
			'name' => '',
			'user' => '',
			'password' => '',
		),
	);
	foreach ($_file as $row) {
		if ($row[0] == ';' || $row == "\n")
		       	continue;
		$part = preg_split('/[\. | \=]/', $row);
		if (array_key_exists($part[0], $_ini)){
			if (count($part) == 3) {
				$part[2] = trim($part[2]);
				$_ini[$part[0]][$part[1]] = olc($part[2]);
			}
		       	elseif (count($part) == 2) {
				$part[1] = trim($part[1]);
				$_ini[$part[0]] = olc($part[1]);
			}
		}
	}
	return $_ini['DB'];
}

//$db = config("../.f3.ini");
//$db_pass = (string)$db['password'];
//$db_user = (string)$db['user'];
//$db_name = (string)$db['name'];

$db_name = "sim";
$db_user = "sim";
$db_pass = "sim";

/*
$DB = mysql_connect("localhost", $db_name, $db_pass) or die ('veri tabanına bağlanılamadı...');
mysql_select_db($db_name) or die (mysql_error());
$table = mysql_query("select username from admin", $DB) or die ('tablo bilgileri görüntülenemiyor...');
$sonuc = mysql_fetch_row($table);
//print_r($sonuc);
mysql_close();
 */


?>
