<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
//Header
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,10,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,10,'SEKRETARIAT JENDERAL',0,2,'C');
		//buat garis horisontal
		$pdf->Line(15,35,200,35);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','UB',14);
		$pdf->Cell(80);
		$pdf->Cell(30,6,'MEMORANDUM',0,3,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(30,6,'Yth',0,0,'L');
		$pdf->Cell(10,6,' : ',0,0,'L');
		$pdf->MultiCell(130,6, $kepada.' Biro Umum Setjen KKP',0,'J');
		$pdf->Cell(30,6,'Dari',0,0,'L');
		$pdf->Cell(10,6,' : ',0,0,'L');
		$pdf->MultiCell(130,6, $dari.'Biro Umum Setjen KKP',0,'J');
		$pdf->Cell(30,6,'Hal',0,0,'L');
		$pdf->Cell(10,6,' : ',0,0,'L');
		$pdf->MultiCell(130,6, $pgd_perihal ,0,'J');
		$pdf->Cell(30,6,'Tanggal',0,0,'L');
		$pdf->Cell(10,6,' : ',0,0,'L');
		$pdf->MultiCell(130,6, $pdf->tanggal("j M Y",$tanggal) ,0,'J');
		$pdf->Ln(10);
		
		$pdf->Line(15,$pdf->gety(),200,$pdf->gety());
		$pdf->Ln(10);
                $pdf->MultiCell(0,6,'Untuk menunjang kelancaran kegiatan Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Jl. Medan Merdeka Timur No.16 Jakarta, maka perlu dilakukan '.$pgd_perihal.' dengan menggunakan '.$ang_nama.' ('.$ang_kode.') '.$pgd_perihal.'.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,6,'Sehubungan dengan hal tersebut, mohon kiranya dapat diproses kegiatan tersebut.',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(0,6,'Atas perhatian dan kerjasamanya diucapkan terima kasih.',0,'J');
		$pdf->Ln(35);
		$pdf->Cell(170,10,$ttd,0,3,'R');
 
$pdf->Output('Memo1 '.$pgd_perihal.'.pdf','I');
?>