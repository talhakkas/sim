<?php

function strtolower_turkish($string) {
        $lower = array( 'İ' => 'i', 'I' => 'ı', 'Ğ' => 'ğ', 'Ü' => 'ü', 'Ş' => 'ş', 'Ö' => 'ö', 'Ç' => 'ç' );
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

?>
