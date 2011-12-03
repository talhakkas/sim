<html>

<body>

<h1>Çiçek Serası Çalışanı merdivenden düştü</h1>

33 yaşındaki Hamdi Mersin, çiçek serasında ilaçlama yaptıktan sonra, çiçek serasının
tavanındaki bir hasarı gidermek için merdivene çıkarken, kendini kötü hissetmiş,
bulantısı olmuş, kısa süreli bir baygınlık geçirmiş, gözleri kararmış ve  5
basamak yukarıdan yere düşmüştür. Düşme sırasında boyun ve bel bölgesini
zemindeki beton çıkıntıya çarpmıştır. Kafasına ise bir darbe almadığını
belirtmiştir. Doktor olarak görev yaptığınız, çiçek serasının 50 metre uzağında
bulunan  aile hekimliği merkezinden, hastaya müdahale etmeniz için çağrıldınız. <hr>

5 dakika içinde gerekli tıbbi aletleriniz ile olay yerine ulaştınız. 112
Ambulans merkezine haber verilmesini sağladınız. Sonrasında bir paramedik sağlık
memuru da, size yardımcı olabileceğini belirterek sizinle beraber hasta başına
geldi.<br>

Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen
bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz,
kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal
kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve
yardım istemektedir.<hr>

<?php
	
$beklenen = array("boyunluk", "sert zemin");

$resp = $_GET["resp"];

$mn = 100;
foreach($beklenen as $sec) {
	similar_text($resp, $sec, $sim);
	$mn = min($mn, $sim);
}

if ($mn < 35) {
	echo "paramedik konuşur: Doktor bey öncelikle hastanın boynuna boyunluk takılması ve sert taşıma tahtası üzerinde olası boyun ve bel zedelenmesine yönelik olarak dikkatlice taşınmasını) destekliyorum. Bu noktalar acil müdahale edilen hastanın taşınmasında temel ilkelerdir.<br>";

	exit("<b>Olgu sonu</b>");
} else
	echo "<a href=50-hastahane.php>Devam</a>";
?>

</body>
</html>
