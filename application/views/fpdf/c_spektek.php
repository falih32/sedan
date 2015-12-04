<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

$header = array('No', 'Item Pekerjaan', 'Spesifikasi Teknis');
$pdf->SetMargins(15,10,10);
//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(85);
				//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,6,'SEKRETARIAT JENDRAL',0,2,'C');
		$pdf->Cell(30,6,'SATUAN KERJA BIRO UMUM',0,2,'C');
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(30,5,'JALAN MEDAN MERDEKA TIMUR NOMOR 16',0,2,'C');
		$pdf->Cell(30,5,'JAKARTA 10110,KOTAK POS 4130 JKP 10041',0,2,'C');
		$pdf->Cell(30,5,'TELEPON (021) 3519070, FAKSIMILE (021) 3520351',0,2,'C');
		$pdf->Ln(1);$pdf->Cell(70);$pdf->Cell(20,5,'LAMAN',0,0,'L');
		$pdf->SetFont('Arial','UI',14);
		$pdf->Cell(30,5,'www.kkp.go.id',0,2,'L');
		//buat garis horisontal
		$pdf->Line(15,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(15,52,200,52);
		
		$pdf->Ln(7);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(75);
		$pdf->Cell(30,5,'SPESIFIKASI TEKNIS',0,2,'C');
		$pdf->Cell(30,5,strtoupper($perihal),0,2,'C');
		$pdf->Cell(30,5,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Cell(30,5,'TAHUN '.date("Y"),0,2,'C');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$pdf->SetFont('Arial','',12);
		$w = array(10,87,87);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
                    if($row->dtp_spesifikasi!=Null) {
			$pdf->Row1(array('  '.$no,$row->dtp_pekerjaan,$row->dtp_spesifikasi));
                    }
		}	
		
		$pdf->Ln(10);
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, '.$pdf->tanggal("j M Y") ,0,3,'L');
		$pdf->Cell(100,6,'Mengetahui / Menyetujui',0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$namappk,0,3,'L');
		
	$pdf->Output();	
?>		