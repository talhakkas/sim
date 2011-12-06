<?php

class Pdf extends F3instance {

	function list_report() {
		// create new PDF document
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator('sim');
		$pdf->SetAuthor('sim');
		$pdf->SetTitle('Web Tabanlı Medikal Simülasyon Eğitim Merkezi');
		$pdf->SetSubject('Report');

		// set default header data
		// çok saçma lan bu header image neden bu yolla atanmış ki 
		// sunucuda da çalışmaz bu
		$header_image = "../../../var/www/public/img/omu-logo.jpg";
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 037', PDF_HEADER_STRING);
		$pdf->SetFont('freeserif','');
		$pdf->SetHeaderData($header_image, 25, "Ondokuz Mayıs Üniversitesi", "Web Tabanlı Medikal Simülasyon Eğitim Merkezi");

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


		// set font
		$pdf->SetFont('freeserif', '', 11);

		// add a page
		$pdf->AddPage();

		$html = '<h1>Example of Spot Colors</h1><br /><br />As long as no open standard for spot colours exists, TCPDF users will have to buy a colour book by one of the colour manufacturers and insert the values and names of spot colours directly into <b><em>spotcolors.php</em></b> file, or define them using the <b><em>AddSpotColor()</em></b> method.<br /><br />Common industry standard spot colors are:<br /><span color="#008800">ANPA-COLOR, DIC, FOCOLTONE, GCMI, HKS, PANTONE, TOYO, TRUMATCH</span>.';

		//$html = implode("\n", file('http://sim.omu.edu.tr/a'));
		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);


		$pdf->SetFont('helvetica', '', 10);

		$pdf->SetTextSpotColor('My TCPDF Black', 100);
		$pdf->SetDrawSpotColor('My TCPDF Black', 100);

		$starty = 100;

		// print some spot colors

		$starty += 24;
		$pdf->SetFillSpotColor('My TCPDF Blue', 100);
		$pdf->Rect(30, $starty, 40, 20, 'DF');
		$pdf->Text(73, $starty + 8, 'My TCPDF Blue');


		//Close and output PDF document
		$pdf->Output('case_student_list', 'D');
	}



	function student_report() {

		$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetTitle('Web Tabanlı Medikal Simülasyon Eğitim Merkezi');
		$pdf->SetAuthor('sim');

		$pdf->SetFont('freeserif','', 12);
		$pdf->SetMargins(20, 15, 20);
		$pdf->setPrintHeader(false);
		$pdf->AddPage();

		$pdf->SetFont('freeserif', 'B', 14);
		$pdf->Cell(0, 5, "Ondokuz Mayıs Üniversitesi", 0, 1, 'C');
		$pdf->Cell(0, 5, "Web Tabanlı Medikal Simülasyon Eğitim Merkezi", 0, 1, 'C');
		$pdf->Cell(0, 5, "Olgu Raporu", 0, 1, 'C');
		$pdf->Ln(20);

		$omu_image = "../public/img/omu-logo.jpg";
		$stu_image = "../public/img/icon/128x128/surgeon.png";
		$pdf->Image($omu_image, 15, 15, 28, 21, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
		$pdf->Image($stu_image, 173, 15, 23, 23, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

		$pdf->Image($stu_image, 160, 55, 28, 28, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
		// yol, x, y ,w, h

		// oturum bilgilerini al
		$userinfo = F3::get("SESSION.userinfo");
		$tdata = F3::get('SESSION.tdata');

		$bilgi = array(
			'id'		=> 'TC Kimlik No',
			'name'		=> 'Ad',
			'surname'	=> 'Soyad',
		);

		// basit öğrenci bilgisi
		$pdf->SetFont('freeserif', 'B',10);
		$pdf->setCellPaddings(4, 1, 3, 1);
		$pdf->SetFillColor(0,160,255);
		$pdf->MultiCell(140, 1, "Öğrenci Bilgileri:", 0, 'L', 1, 0, '', '', true);
		$pdf->Ln();
		$pdf->SetFont('freeserif', '', 8);
		$pdf->SetFillColor(245, 253, 245);
		$pdf->setCellPaddings(9, 1, 3, 1);
		foreach ($bilgi as $key => $value) {
			$pdf->MultiCell(65, 1, "$value:", 0, 'L', 1, 0, '30', '', true);
			$pdf->MultiCell(65, 1, $userinfo[$key], 0, 'L', 1, 0, '', '', true);
			$pdf->Ln();
		}
		$pdf->Ln(15);
		// olgu raporu


		$pdf->SetFont('freeserif', '', 9);
		$pdf->setCellPaddings(5, 2, 3, 2);

		$pdf->SetFillColor(0,160,255);
		$pdf->MultiCell(87.5, 0, "Olgu Adı:", 0, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(87.5, 0, F3::get('SESSION.case_title'), 0, 'L', 1, 0, '',   '', true);
		$pdf->Ln();
		$pdf->SetFillColor(222,222,239);
		$pdf->MultiCell(55, 1, "Başlık:", 0, 'L', 1, 0, '30', '', true);
		$pdf->MultiCell(50, 1, "Zaman:", 0, 'L', 1, 0, '', '', true);
	//	$pdf->MultiCell(40, 1, "Beklenen:", 1, 'L', 1, 0, '', '', true);
	//	$pdf->MultiCell(45, 1, "Soylenen:", 1, 'L', 1, 0, '', '', true);
		$pdf->MultiCell(50, 1, "Puan:", 0, 'L', 1, 0, '', '', true);
		$pdf->Ln();


		$pdf->SetFont('freeserif', '', 8);
		$pdf->setCellPaddings(7, 1, 3, 1);

		$i = 0;
		foreach ($tdata as $id => $dict) {
			$pdf->SetFillColor(220,255,255);
			if($i == 0){
				$pdf->SetFillColor(245, 253, 245);
			}
			$pdf->MultiCell(55, 1, $dict['title'], 0, 'L', 1, 0, '30', '', true);
			$pdf->MultiCell(50, 1, sprintf('%.2F',$dict['zaman']), 0, 'L', 1, 0, '', '', true);
		//	$pdf->MultiCell(40, 1, 'beklenen', 0, 'L', 1, 0, '', '', true);
		//	$pdf->MultiCell(45, 1, $dict['soylenen'], 0, 'L', 1, 0, '',   '', true);
			$pdf->MultiCell(50, 1, $dict['puan'], 0, 'L', 1, 0, '',   '', true);
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
