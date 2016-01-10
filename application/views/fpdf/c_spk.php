<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();

		$pdf->Ln(45);
		$pdf->SetFont('Arial','B',12);
                $posy=$pdf->GetY(); $pdf->MultiCell(60,5,'','LTR','C'); 
                $pdf->MultiCell(60,5,'SURAT PERINTAH KERJA (SPK)','LR','C');
                $pdf->MultiCell(60,5,'','LR','C');
                $pdf->SetFont('Arial','',12);
                $pdf->MultiCell(60,5,'Halaman 1 dari 6',1,'L'); $x1=$pdf->GetX(); $y1=$pdf->GetY();
                $pdf->MultiCell(60,5,'Paket Pekerjaan : '.$d->pgd_perihal,'LR','L');
                $pdf->SetXY(75, $posy);
                $pdf->MultiCell(125,5,'SATUAN KERJA : SATKER BIRO UMUM SETJEN KEMENTERIAN KELAUTAN DAN PERIKANAN',1,'J');
                $pdf->SetXY(75, $posy+10);
                $pdf->MultiCell(125,5,'Nomor SPK : '.$nospk.'
Tanggal '.$pdf->tanggal("j M Y",$tglspk),'LR','L');
				$pdf->SetXY(75, $posy+20); $pdf->MultiCell(125,5,'','LR','C');
				$pdf->SetXY(75, $posy+25);$pdf->MultiCell(125,5,'Nomor dan Tanggal Surat Undangan Pengadaan Langsung '.$noundangan->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglundangan->dknt_isi),'LTR','J');
				$pdf->SetXY(75, $posy+35);$pdf->MultiCell(125,5,'Nomor dan Tanggal Berita Acara Hasil Pengadaan Langsung '.$nohasilP->dknt_isi.' tanggal '.$pdf->tanggal("j M Y",$tglhasilP->dknt_isi),'LTR','J');
                                $pdf->SetXY(75, $posy+45);$pdf->MultiCell(125,5,'SPK ini mulai berlaku efektif terhitung sejak tanggal diterbitkannya SP dan penyelesaian keseluruhan pekerjaan sebagaimana diatur dalam SPK ini.',1,'J');
                                $x2=$pdf->GetX(); $y2=$pdf->GetY();
                $pdf->Line($x1, $y1, $x2, $y2);
                $pdf->Line($x2, $y2, $x2+60, $y2);
                
                $pdf->MultiCell(0,5,'Sumber Dana : dibebankan atas DIPA '.$dipa->dipa_nomor.' Tanggal '.$pdf->tanggal("j M Y",$dipa->dipa_tanggal).' untuk mata anggaran kegiatan '.$d->pgd_anggaran,1,'J');
                $pdf->MultiCell(0,5,'Waktu Pelaksanaan Pekerjaan: '.$d->pgd_lama_pekerjaan.' Hari Kalender terhitung sejak tanggal '.$pdf->tanggal("j M Y",$tglawal).' s.d '.$pdf->tanggal("j M Y",$tglakhir),1,'J');
                $pdf->MultiCell(0,5,'NILAI PEKERJAAN',1,'C');
                $header = array('No', 'Uraian Pekerjaan', 'Kuantitas','Satuan Ukuran','Harga Satuan (Rp.)','Total (Rp.)');
                $w = array(10,60,25,30,30,30);
		$pdf->SetWidths($w);
                $pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
                $pdf->SetAligns('L');
//		foreach ($listpeng as $row) {
                for($i=0;$i<1;$i++){
			$pdf->Row1(array('1',$d->pgd_perihal, 'terlampir' ,'terlampir',$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix) ,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix))); 
		}
                if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0);$pdf->Cell($w[5],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0); $pdf->Cell($w[5],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'L',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'R',0); $pdf->SetFont('Arial','B',12); $pdf->Cell($w[5],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);		
                $pdf->SetFont('Arial','',12);
                $cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(0,5,'Terbilang : ('.$b.' rupiah )',1,'L');
                $pdf->MultiCell(0,5,'Instruksi Kepada Penyedia : Penagihan hanya dapat dilakukan setelah penyelesaian pekerjaan yang diperintahkan dalam SPK ini dan dibuktikan dengan Berita Acara Serah Terima. Jika pekerjaan tidak dapat diselesaikan dalam jangka waktu pelaksanaan pekerjaan karena kesalahan atau kelalaian Penyedia maka Penyedia berkewajiban untuk membayar denda kepada PPK sebesar 1/1000 (satu per seribu) dari nilai SPK atau nilai bagian SPK untuk setiap hari keterlambatan.',1,'J');
                $xb1=$pdf->GetX(); $yb1=$pdf->GetY();
                $pdf->Cell(95,6,'Untuk dan atas nama Satker Biro Umum Setjen','LR',0,'L');	$pdf->Cell(90,6,'Untuk dan atas nama penyedia','LR',1,'L'); 
		$pdf->Cell(95,6,'Kementerian Kelautan dan Perikanan',0,0,'L');	$pdf->Cell(90,6,'','LR',1,'L');
		$pdf->Cell(95,6,'Pejabat Pembuat Komitmen',0,0,'L'); $pdf->Cell(90,6,$d->spl_nama,'LR',1,'L');
		$pdf->Ln(15);
		$pdf->Cell(95,6,$ppk->pgw_nama,0,0,'L');	$pdf->Cell(90,6,$d->pgd_perwakilan_spl,0,1,'L');
                $pdf->Cell(95,5,'','B',0,'L');	$pdf->Cell(90,5,$d->pgd_jbt_perwakilan_spl,'B',1,'L');
                $xb2=$pdf->GetX(); $yb2=$pdf->GetY();
                $pdf->Line($xb1, $yb1, $xb2, $yb2); $pdf->Line($xb1+95, $yb1, $xb2+95, $yb2); $pdf->Line($xb1+185, $yb1, $xb2+185, $yb2);
                $pdf->Output();         
?>		