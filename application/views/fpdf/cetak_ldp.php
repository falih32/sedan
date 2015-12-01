<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
//Header
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,10,'BAB III. LEMBAR DATA PENGADAAN',0,3,'C');
		//buat garis horisontal
		$pdf->Line(15,25,200,25);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(90,6,'A. LINGKUP PEKERJAAN ',0,0,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'1.',0,0,'L');
		$pdf->Cell(0,6,'Pejabat Pengadaan :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,'Pejabat Pengadaan Satker Biro Umum Setjen KKP',0,'J');
		$pdf->ln(5);
		$pdf->Cell(90);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'2.',0,0,'L');
		$pdf->Cell(50,6,'Alamat Pejabat Pengadaan :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,'Jl. Medan Merdeka Timur No.16 Jakarta Pusat',0,'J');
		$pdf->ln(5);
		$pdf->Cell(90);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'3.',0,0,'L');
		$pdf->Cell(50,6,'Website :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,'www.kkp.go.id',0,'J');
		$pdf->ln(5);
		$pdf->Cell(90);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'4.',0,0,'L');
		$pdf->Cell(50,6,'Nama paket pekerjaan :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,$d->pgd_perihal,0,'J');
		$pdf->ln(5);
		$pdf->Cell(90);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'5.',0,0,'L');
		$pdf->Cell(50,6,'Uraian singkat pekerjaan :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,$d->pgd_uraian_pekerjaan,0,'J');
		$pdf->ln(5);
		$pdf->Cell(90);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(10,6,'6.',0,0,'L');
		$pdf->Cell(50,6,'Jangka waktu penyelesaian pekerjaan :',0,2,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(0,6,$d->pgd_lama_pekerjaan.' hari kalender',0,'J');
		$pdf->ln(5);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(90,6,'B. SUMBER DANA ',0,0,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->MultiCell(0,6,'Pekerjaan ini dibiayai dari sumber pendanaan APBN tahun anggaran '.date("Y"),0,'J');
		$pdf->ln(5);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(7,6,'C.',0,0,'L');
		$pdf->Cell(83,6,'MASA BERLAKUNYA',0,0,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'Masa berlakunya surat penawaran :',0,1,'J');
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(7);
		$pdf->Cell(83,6,'PENAWARAN',0,0,'L');
		$pdf->SetFont('Arial','UI',12);
		$pdf->Cell(82,6,$d->pgd_lama_penawaran.' hari kalender',0,3,'J');
		$pdf->ln(5);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(90,6,'D. DOKUMEN PENAWARAN ',0,0,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(70,6,'Bagian Pekerjaan yang Disub-kontrakkan',0,3,'J');
		$pdf->SetFont('Arial','UI',12);
		$pdf->MultiCell(100,6,'-',0,'J');
		$pdf->ln(5);
		$pdf->SetFont('Arial','',14);
		$pdf->Cell(90,6,'E. SYARAT PENYEDIA ',0,0,'L');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(90,6,'Memiliki izin usaha bidang ',0,1,'L');
		$pdf->SetFont('Arial','UI',12);
       
                $w = array(90,0);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('L');
		foreach ($listsiz as $row) {
			$pdf->RowNoLines(array('',$row->siz_nama)); 
                        $pdf->ln(3);
		}
              	$pdf->ln(5);
	
                $pdf->Foot('Standar Dokumen Pengadaan Pengadaan Jasa Lainnya (Dengan Prakualifikasi)');
$pdf->Output();
?>