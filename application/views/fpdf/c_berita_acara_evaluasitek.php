<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$tanggalK=$tglKudg;
//Header
		
		$pdf->Ln(45);
		

		$pdf->SetFont('Arial','',12);
				
		$pdf->SetLineWidth(0.2);
		$w = array(90,95);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('Satuan Kerja Biro Umum Sekretariat Jenderal Kementerian Kelautan dan Perikanan Tahun Anggaran '.$pdf->tanggal("Y",$tanggalK),'Berita Acara Evaluasi Teknis')); 
			}

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		for($i=0;$i<1;$i++){
			$pdf->Row1(array('Pekerjaan : '.$d->pgd_perihal,'Nomor   : '.$noevateknis.'
Tanggal : '.$pdf->tanggal("j M Y", $tanggalK))); 
			}
		$pdf->Ln(5);
		$pdf->MultiCell(0,5,'Pada hari ini, '.$pdf->tanggal("D",$tanggalK).' tanggal '.$pdf->Terbilang($pdf->tanggal("j",$tanggalK)).' bulan '.$pdf->tanggal(" M ",$tanggalK).' tahun '.$pdf->Terbilang($pdf->tanggal("Y",$tanggalK)).', yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Satker Biro Umum telah melaksanakan evaluasi teknis terhadap 1 (satu) perusahaan yang memenuhi syarat evaluasi administrasi, dengan hasil berikut :',0,'J');
		$pdf->Ln(5);
		$w = array(10,40,45,45,45);
		$pdf->SetWidths($w);
		$pdf->SetAligns('C');
		//header
		$pdf->SetFont('Arial','B',12);
                if($d->pgd_tipe_pengadaan==2){ 
                    for($i=0;$i<1;$i++){
                                    $pdf->Row1(array('No','Nama Perusahaan','Pengalaman perusahaan (Sejenis)','Pendekatan dan metodologi','Kualifikasi Tenaga Ahli')); 
                                }
                }else {	
                        for($i=0;$i<1;$i++){
                                    $pdf->Row1(array('No','Nama Perusahaan','Spesifikasi Teknis yang ditawarkan sesuai yang ditetapkan dalam dokumen pengadaan','Jadwal pelaksanaan pekerjaan yang ditawarkan tidak melampaui batas waktu sebagaimana tercantum dalam LDP','Identitas (jenis, type dan merk) yang ditawarkan sebagaimana tercantum dalam LDP')); 
                                }
                }
		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
		$no=0;

		for($i=0;$i<1;$i++){
			$no++;
			$pdf->Row1(array($no,$d->spl_nama,$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+70, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+115, $pdf->GetY()+1, 4),$pdf->Image(base_url().'assets/checkmark.jpeg', $pdf->GetX()+160, $pdf->GetY()+1, 4))); 
			}
		$pdf->Ln(5);
		
		$pdf->MultiCell(0,5,'Demikian Berita Acara ini dibuat oleh Pejabat Pengadaan Barang / Jasa Satker Biro Umum Setjen KKP untuk dapat dipergunakan sebagaimana mestinya.',0,'J');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal ',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
		$pdf->Cell(100);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
                
 if($d->pgd_tipe_pengadaan==2){                
                $pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'LAMPIRAN BERITA ACARA EVALUASI TEKNIS',0,2,'C');
		$pdf->MultiCell(0,6, strtoupper($d->pgd_perihal),0,'C');
//		$pdf->Cell(0,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
		$pdf->Ln(8);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(0,6,'NOMOR : '.$noevateknis,0,2,'L');
		$pdf->Cell(0,6,'Tanggal  : '.$pdf->tanggal("j M Y", $tanggalK),0,2,'L');
		$pdf->Ln(5);
				
		$pdf->SetLineWidth(0.2);
                //header
                $pdf->SetFont('Arial','B',12); 
                $x=$pdf->GetX(); $y=$pdf->GetY();$pdf->MultiCell(8, 5, 'No','LTR'); $pdf->SetXY($x+8,$y); $pdf->MultiCell(38, 5, 'Nama','LTR','C');$pdf->SetXY($x+46,$y); $pdf->MultiCell(139, 5, 'Nilai Konsultan','LTR','C');
                $y1=$pdf->GetY();$pdf->MultiCell(8, 5, '               ','LR'); $pdf->SetXY($x+8,$y1);  $pdf->MultiCell(38, 5, '     Perusahaan               ','LR','C'); $pdf->SetXY($x+46,$y1);  $pdf->MultiCell(30, 5, 'Pengalaman perusahaan (Sejenis)','LTR','C'); $pdf->SetXY($x+76,$y1);  $pdf->MultiCell(30, 5, 'Pendekatan dan metodologi','LTR','C'); 
                $pdf->SetXY($x+106,$y1);  $pdf->MultiCell(30, 5, 'Kualifikasi   Tenaga Ahli     ','LTR','C');
                $pdf->SetXY($x+136,$y1);  $pdf->MultiCell(22, 5, 'Jumlah   Nilai   ','LTR','C');$pdf->SetXY($x+158,$y1);  $pdf->MultiCell(27, 5, 'Keterangan                         ','LTR','C');
                 
                $w = array(8,38,30,30,30,22,27);
		$pdf->SetWidths($w);
		

		//isi
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('L');
			$n=0;
		for($i=0;$i<1;$i++){
		$n++;
			$pdf->Row1(array($n,$d->spl_nama,$d->pgd_perwakilan_spl,'ddd','ddd','ssss','Lulus')); 
			}
                $pdf->Ln(10);        
                $w = array(10,100,50);
		$pdf->SetWidths($w);
		$a='C';
		$pdf->SetAligns($a);
		//header
		$pdf->SetFont('Arial','B',12);
			for($i=0;$i<1;$i++){
			$pdf->Row1(array('No','Dokumen Penawaran Teknis','Keterangan')); 
			}
                //isi
                $dok= array('Pengalaman perusahaan','Pendekatan dan metodologi','Kualifikasi Tenaga Ahli');      
                $pdf->SetFont('Arial','',12); 
                $pdf->SetAligns('L');
                $n=0;
                for($i=0;$i<3;$i++){
		$n++;
			$pdf->Row1(array($n,$dok[$i],'Lengkap (terlampir)')); 
                }
                        
                        
		$pdf->Ln(7);
                
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,1,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum Sekretariat Jenderal',0,1,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,1,'L');
		$pdf->Ln(15);
		$pdf->Cell(90,6,$d->pgd_nama_pejpeng,0,1,'L');
                
 }           
                
                
	$pdf->Output();	
?>		