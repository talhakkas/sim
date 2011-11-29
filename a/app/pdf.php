<?php

class Pdf extends F3instance {

	function student_report() {
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Web Tabanlı Medikal Simülasyon Eğitim Merkezi');
		$pdf->SetAuthor('sim');

		$pdf->SetFont('freeserif', '', 12);
		$pdf->SetMargins(20, 20, 20);
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->AddPage();

		$pdf->SetFont('freeserif', 'B', 12);
		$pdf->Cell(0, 5, "Web Tabanlı Medikal Simülasyon Eğitim Merkezi", 0, 1, 'C');
		$pdf->Cell(0, 5, "Olgu Raporu", 0, 1, 'C');
		$pdf->Ln(15);

		// nası resim basacaz?
		// $image = "../../sim/public/img/icon/128x128/business_man.png"

		// oturum bilgilerini çek
		$userinfo = F3::get("SESSION.userinfo");
		$tdata = F3::get('SESSION.tdata');

		$bilgi = array(
			'tc'		=> 'TC Kimlik No',
			'name'		=> 'Ad',
			'surname'	=> 'Soyad',
		);

		// basit öğrenci bilgisi
		$pdf->SetFont('freeserif', 'B', 9);
		$pdf->Cell(0, 5, "Öğrenci Bilgileri", 0, 1, 'L');

		$pdf->SetFont('freeserif', '', 8);
		foreach ($bilgi as $key => $value) {
			$pdf->MultiCell(30, 1, "$value:", 0, 'L', 0, 0, '35', '', true);
			$pdf->MultiCell(80, 1, $userinfo[$key], 0, 'L', 0, 0, '',   '', true);
			$pdf->Ln(5);
		}
		$pdf->Ln(5);

		// olgu raporu
		$pdf->SetFont('freeserif', 'B', 9);
		$pdf->Cell(0, 5, "Olgu Raporu", 0, 1, 'L');

		$pdf->SetFont('freeserif', '', 8);
		$pdf->MultiCell(30, 1, "Olgu Adı:", 0, 'L', 0, 0, '35', '', true);
		$pdf->MultiCell(80, 1, "Bilinmiyor",       0, 'L', 0, 0, '',   '', true);
		$pdf->Ln(5);

		/*
		foreach ($bilgi as $key => $value) {
			$val = $userinfo[$key];
			$pdf->MultiCell(30, 1, "$value:", 0, 'L', 0, 0, '35', '', true);
			$pdf->MultiCell(80, 1, $val,       0, 'L', 0, 0, '',   '', true);
			$pdf->Ln(5);
		}
		 */
		//$pdf->Ln(10);

		//$pdf->Ln(15);
		//$pdf->Cell(0, 5, "", 0, 1,'T');

		$pdf->Output( $userinfo['tc'], 'D');
	}

	function beforeroute() {
		require("/opt/tcpdf/tcpdf.php");
	}

	function afterroute() {
		// bar
	}
}
