<?php
// heryerde kullanilmayi dusundugumuz fonksiyonlari barindirdigimiz dosya
function strtolower_turkish($string) {
        $lower = array(
                'İ' => 'i', 'I' => 'ı', 'Ğ' => 'ğ', 'Ü' => 'ü',
                'Ş' => 'ş', 'Ö' => 'ö', 'Ç' => 'ç',
        );
        return strtolower(strtr($string, $lower));
}

function streq_turkish($string1, $string2) {
        return strtolower_turkish($string1) == strtolower_turkish($string2);
}
function is_tc($tc) {
	// Kaynak: is_tc(): http://www.kodaman.org/yazi/t-c-kimlik-no-algoritmasi
	preg_replace(
		'/([1-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1}).*$/e',
		"eval('
			\$on=((((\\1+\\3+\\5+\\7+\\9)*7)-(\\2+\\4+\\6+\\8))%10);
			\$onbir=(\\1+\\2+\\3+\\4+\\5+\\6+\\7+\\8+\\9+\$on)%10;
		')",
		$tc
	);
	// ilk üç hane için bir ek kontrol daha
	if (!(isset($on) && isset($onbir))) return false;

	// son iki haneyi (on ve onbirinci) kontrol et
	return substr($tc, -2) == ($on < 0 ? 10 + $on : $on) . $onbir;
}
// FIXME: bunu bir işlev tablosuna dönüştür
function denetle($verilen, $tarif) {
	foreach ($tarif as $ne => $bilgi) {
		$kosul = array_shift($bilgi);
		switch ($ne) {
		case 'dolu':
			$hata = $kosul && empty($verilen);
			break;
		case 'esit':
			$hata = $kosul != strlen($verilen);
			break;
		case 'enfazla':
			$hata = strlen($verilen) > $kosul;
			break;
		case 'enaz':
			$hata = strlen($verilen) < $kosul;
			break;
		case 'degeri':
			$hata = $kosul != $verilen;
			break;
		case 'tamsayi':
			$hata = $kosul && ! ctype_digit($verilen);
			break;
		case 'ozel':
			$hata = $kosul && $kosul($verilen);
			break;
		}
		if ($hata) {
			return array_shift($bilgi);
		}
	}
}

function yukle($hedef=NULL, $alan='file', $uzerine_yazma=false, $type='IMAGETYPE_JPEG', $fsz=550000) {
	return yukle2($hedef, "$alan.tmp_name", $uzerine_yazma, $type, $fsz);
}

function yukle2($hedef=NULL, $tmp_name='file.tmp_name', $uzerine_yazma=false, $type='IMAGETYPE_JPEG', $fsz=550000) {
        $yuklenen = F3::get("FILES.$tmp_name");

	// hedef ve yüklenen dosyanın boş olmasına izin veriyoruz
	// herhangi biri boşsa mesele yok, çağırana dön
	if (empty($hedef) || empty($yuklenen)) {
		return false;
	}

	$split = preg_split(
		'/\//', $hedef
	);

	// resimlere yataklık edecek recursive bir dizin oluşturma
	// ör : img/ ve img/student/ 'ı otomatik oluşturur.
	$dirs = array_slice($split, 0, count($split) - 1);
	$dir = implode("/", $dirs);

	if (! file_exists($dir)) {
		mkdir($dir, 0777, true);
		chmod($dir, 0777);
	}

	// tam yol
	$hedef = getcwd() . "/" . $hedef;
	// bu bir uploaded dosya olmalı, fake dosyalara izin yok
	if (is_uploaded_file($yuklenen)) {
		// boyutu sınırla, değeri öylesine seçtim
		if (filesize($yuklenen) > $fsz) {
			F3::set('error', 'Resim çok büyük');
		}
		// şimdilik sadece JPEG, dosya tipini içine bakarak tespit ediyoruz
		else if ($type != 'all' && exif_imagetype($yuklenen) != IMAGETYPE_JPEG) {
			F3::set('error', 'Resim JPEG değil');
		}
		// dosyanın üzerine yazmayalım, ekstra güvenlik
		// else if (!(!file_exists($hedef) || $uzerine_yazma)) {
		else if (file_exists($hedef) && !($uzerine_yazma)) {
			F3::set('error', 'Resim zaten kaydedilmiş');
		}
		// tamamdır, kalıcı kayıt yapalım
		else if (!move_uploaded_file($yuklenen, $hedef)) {
			F3::set('error', 'Dosya yükleme hatası');
		} else {// yok başka bir ihtimal!, doğru yoldasın
			$file_parts = pathinfo($hedef);

			if($file_parts['extension'] == 'jpg') {
					// image resizing
					$klasor = $file_parts['dirname'] . "/";
					$dosya = $hedef;
					$resim = imagecreatefromjpeg($dosya);

					$boyutlar = getimagesize($dosya);
					$resimorani = 300 / $boyutlar[0];
					$yeniyukseklik = $resimorani * $boyutlar[1];
					$yeniresim = imagecreatetruecolor("300", $yeniyukseklik);
					imagecopyresampled($yeniresim, $resim, 0, 0, 0, 0, "300", $yeniyukseklik,
						$boyutlar[0], $boyutlar[1]);
					$hedefdosya = $klasor . "kucuk". $file_parts['basename'];
					imagejpeg($yeniresim, $hedefdosya, 100);
					chmod($hedefdosya, 0755);
			}
			else {
			echo "FOOOOOOOOOO";
			}
	
		}
			return true;
	}
	else {
		// bu aslında bir atak işareti
		F3::set('error', 'Dosya geçerli bir yükleme değil');
	}

	return false;
}

?>
