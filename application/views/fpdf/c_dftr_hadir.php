<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

//Header
		$pdf->Image(base_url().'assets/logokelautan.png',15,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTRIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		$pdf->Ln(8);
		$pdf->SetFont('Arial','',12);
		
		$pdf->MultiCell(0,5,'Daftar Hadir Peserta pengadaan langsung '.$d->pgd_perihal,0,'J');
		$pdf->Ln(5);

		$pdf->Cell(30,5,'Nomor',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,$nomor,0,1,'L');
		$pdf->Cell(30,5,'Tanggal',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,$pdf->tanggal("j M Y", $tgl),0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$w = array(10,80,55,40);		
		$pdf->SetWidths($w);
		$header = array('No', 'Nama Perusahaan', 'Nama Yang Hadir','Tanda Tangan');
                $np = array($d->spl_nama, '', '');
                $pwk = array($namap, '', '');
		$pdf->SetHeaders($header,$w);
		$n=0;
		for($i=0;$i<3;$i++){
			$n++;
			$pdf->Row1(array($n.'.',$np[$i],$pwk[$i],'')); 
			}
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang/Jasa',0,2,'L');
		$pdf->Cell(100,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(100,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$pejpeng->pgw_nama,0,3,'L');
		
	$pdf->Output();	
?>		