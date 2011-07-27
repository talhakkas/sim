<?php

function pdf($kul) {
	require("/opt/tcpdf/tcpdf.php");

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	$pdf->SetTitle('ÖRNEK TCPDF UYGULAMASI');
	$pdf->SetAuthor('emineker');
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->SetMargins(20, 60, 20);
	$pdf->SetHeaderMargin(10);
	$pdf->SetFooterMargin(10);

	$pdf->AddPage();

	$pdf->SetFont('dejavusans', 'B', 16);
	$pdf->Cell(0, 5, "PHP İLE YAZILMIŞ BİR PDF UYGULAMASI", 0, 1, 'C');
	$pdf->Cell(0, 5, "daha ayrıntılı bilgi için www.tcpdf.org", 0, 1, 'C');
	$pdf->Ln(20);

	$bilgiler = array(
		'Kişisel Bilgiler' => array(
			'tc'		=> 'TC Kimlik No',
			'ad'		=> 'Ad',
			'soyad'		=> 'Soyad',
			'babaad'	=> 'Baba Adı',
			'anaad'		=> 'Ana Adı',
			'dogumtarih'	=> 'Doğum Tarihi',
			'dogumil'	=> 'Doğum Yeri',
			'tarih' 	=> 'Kayıt Tarihi',
		),
	);
        foreach ($bilgiler as $kesim => $bilgi) {
		$pdf->SetFont('dejavusans', 'B', 12);
		$pdf->Cell(0, 5, $kesim, 0, 1, 'L');

		$pdf->SetFont('dejavusans', '', 9);
		foreach ($bilgi as $alan => $baslik) {
                        $deger = $kul[$alan];
			$pdf->MultiCell(30, 1, $baslik.':', 0, 'L', 0, 0, '35', '', true);
			$pdf->MultiCell(80, 1, $deger,       0, 'L', 0, 0, '',   '', true);
                        $pdf->Ln(5);
		}
                $pdf->Ln(5);
        }

        $pdf->Ln(15);
        $pdf->Cell(0, 5, "Gördüğünüz gibi yukarıdaki bilgileri bu şekilde pdf'e basıyoruz.", 0, 1,'T');

	$pdf->Output("example.pdf",'D');
}

$kul = array(
        'tc'            => 'tc',
        'ad'	        => 'ad',
        'soyad'	        => 'soyad',
        'babaad'        => 'baba adı',
        'anaad'	        => 'ana adı',
        'dogumtarih'    => 'doğum tarihi',
        'dogumil'       => 'doğum yeri',
        'tarih'         => date("d-m-y"),
);

pdf($kul);   // $kul dizisini pdf fonksiyonumuza gönderiyoruz bu kısımda pdf üretiliyor...
//unset($kul); // $kul dizisiyle işimiz bittiğine göre bu değişkeni ortadan kaldıralım
//F3::call(':giris');  // şimdi de tekrar aynı sayfayı çağıralım

?>

