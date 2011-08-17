
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
geldi.
<br>

Hasta seranın içinde, açık kapının yanındaki kanepede uzanmaktadır. Halen
bulantısı olduğunu belirten hasta, doktor bey bana yardımcı olur musunuz,
kendimi iyi hissetmiyorum  demektedir ? Kanepenin yanında, ağzı açık metal
kutular bulunmaktadır. Hasta karın ağrısı şikayetininde olduğunu belirtmekte ve
yardım istemektedir. <hr>

<?php
$beklenen = array("transport", "transfer");

$resp = $_GET["resp"];

$mx = 0;
foreach($beklenen as $sec) {
	similar_text($resp, $sec, $sim);
	$mx = max($mx, $sim);
}

if ($mx < 35)
	exit("<b>Olgu sonu</b>");
?>

<b>Paramedik konuşur.</b> Doktor bey ben de öncelikle hastanın
ve sağlık çalışanlarının güveliği için hastanın seradan uzak havadar bir yere
transportunun faydalı olduğu inancındayım. <br>

Transport <a href=40-transport.php>edelim</a>
