<?php

class Pdf extends F3instance {

	function iistudent_report() {
		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Web Tabanlı Medikal Simülasyon Eğitim Merkezi');
		$pdf->SetAuthor('sim');

		$pdf->SetFont('freeserif','', 12);
		$pdf->SetMargins(20, 20, 20);
		$pdf->setPrintHeader(false);
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
			'id'		=> 'TC Kimlik No',
			'name'		=> 'Ad',
			'surname'	=> 'Soyad',
		);

		// basit öğrenci bilgisi
		$pdf->SetFont('freeserif', 'B',10);
		$pdf->setCellPaddings(14, 1, 3, 1);
		$pdf->Cell(170, 7, "Öğrenci Bilgileri", 1, 1, 'L');
		$pdf->SetFont('freeserif', '', 8);
		$pdf->SetFillColor(222,222,239);
		$pdf->setCellPaddings(9, 1, 3, 1);
		foreach ($bilgi as $key => $value) {
			$pdf->MultiCell(85, 1, "$value:", 1, 'L', 1, 0, '', '', true);
			$pdf->MultiCell(85, 1, $userinfo[$key], 1, 'L', 0, 0, '',   '', true);
			$pdf->Ln();
		}
		$pdf->Ln(9);
		// olgu raporu

		$pdf->SetFont('freeserif', 'B', 10);
		$pdf->setCellPaddings(14, 1, 3, 1);
		$pdf->Cell(170, 7, "Olgu Raporu", 1, 1, 'L');

		$pdf->SetFillColor(145,197,239);
		$pdf->SetFont('freeserif', '', 9);
		$pdf->setCellPaddings(5, 1, 3, 1);
		$pdf->MultiCell(85, 1, "Olgu Adı:", 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(85, 1, F3::get('SESSION.case_title'), 1, 'L', 1, 0, '',   '', true);
		$pdf->Ln();

		$pdf->SetFont('freeserif', '', 8);
		$pdf->setCellPaddings(11, 1, 3, 1);
			$i = 0;
			foreach ($tdata as $id => $dict) {
					$pdf->SetFillColor(220,240, 255);
					if($i == 0){
						$pdf->SetFillColor(240, 255, 255);
					}
					$pdf->MultiCell(85, 1, $dict['title'], 1, 'L', 1, 0, '', '', true);
					$pdf->MultiCell(85, 1, $dict['puan'], 1, 'L', 1, 0, '',   '', true);
					$pdf->Ln();
					$i = !$i;
			}

		$pdf->Ln(5);
		$pdf->Output( $userinfo['id'], 'D');
	}
function student_report() {

		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Web Tabanlı Medikal Simülasyon Eğitim Merkezi');
		$pdf->SetAuthor('sim');

		$pdf->SetFont('freeserif','', 12);
		$pdf->SetMargins(20, 20, 20);
		$pdf->setPrintHeader(false);
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
			'id'		=> 'TC Kimlik No',
			'name'		=> 'Ad',
			'surname'	=> 'Soyad',
		);

		// basit öğrenci bilgisi
		$pdf->SetFont('freeserif', 'B',10);
		$pdf->setCellPaddings(14, 1, 3, 1);
		$pdf->Cell(170, 7, "Öğrenci Bilgileri", 1, 1, 'L');
		$pdf->SetFont('freeserif', '', 8);
		$pdf->SetFillColor(222,222,239);
		$pdf->setCellPaddings(9, 1, 3, 1);
		foreach ($bilgi as $key => $value) {
			$pdf->MultiCell(85, 1, "$value:", 1, 'L', 1, 0, '', '', true);
			$pdf->MultiCell(85, 1, $userinfo[$key], 1, 'L', 0, 0, '',   '', true);
			$pdf->Ln();
		}
		$pdf->Ln(9);
		// olgu raporu

		$pdf->SetFont('freeserif', 'B', 10);
		$pdf->setCellPaddings(14, 1, 3, 1);
		$pdf->Cell(170, 7, "Olgu Raporu", 1, 1, 'L');

		$pdf->SetFillColor(145,197,239);
		$pdf->SetFont('freeserif', '', 9);
		$pdf->setCellPaddings(5, 1, 3, 1);
		$pdf->MultiCell(85, 1, "Olgu Adı:", 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(85, 1, F3::get('SESSION.case_title'), 1, 'L', 1, 0, '',   '', true);
		$pdf->Ln();

		$pdf->SetFont('freeserif', '', 8);
		$pdf->setCellPaddings(11, 1, 3, 1);
			$i = 0;
			foreach ($tdata as $id => $dict) {
					$pdf->SetFillColor(220,240, 255);
					if($i == 0){
						$pdf->SetFillColor(240, 255, 255);
					}
					$pdf->MultiCell(85, 1, $dict['title'], 1, 'L', 1, 0, '', '', true);
					$pdf->MultiCell(85, 1, $dict['puan'], 1, 'L', 1, 0, '',   '', true);
					$pdf->Ln();
					$i = !$i;
			}

		$pdf->Ln(5);
		$pdf->Output( $userinfo['id'], 'D');
	}

	function beforeroute() {
		require("/opt/tcpdf/tcpdf.php");
	}

	function afterroute() {
		// bar
	}
}
