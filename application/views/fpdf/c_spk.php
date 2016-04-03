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
                $pdf->SetRataKanan(4);
//		foreach ($listpeng as $row) {
                for($i=0;$i<1;$i++){
			$pdf->Row(array('1',$d->pgd_perihal, 'terlampir' ,'terlampir',$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix) ,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix))); 
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
		$pdf->Cell(95,6,$d->pgd_nama_ppk,0,0,'L');	$pdf->Cell(90,6,$d->pgd_perwakilan_spl,0,1,'L');
                $pdf->Cell(95,5,'','B',0,'L');	$pdf->Cell(90,5,$d->pgd_jbt_perwakilan_spl,'B',1,'L');
                $xb2=$pdf->GetX(); $yb2=$pdf->GetY();
                $pdf->Line($xb1, $yb1, $xb2, $yb2); $pdf->Line($xb1+95, $yb1, $xb2+95, $yb2); $pdf->Line($xb1+185, $yb1, $xb2+185, $yb2);
//-------------------------------------lampiran---------------------------------------------------
 $pdf->AddPage();
 $pdf->Ln(7);
                $pdf->SetFont('Arial','',11);
                $pdf->Cell(0,6,'Lampiran Surat Perintah Kerja (SPK)',0,2,'C');
		$pdf->Cell(0,6,'Nomor : '.$nospk,0,2,'C');
                 $pdf->Ln(3);
$last=-11;
		$pdf->SetFont('Arial','B',11);

                if($tipepengadaan==2){
//pengadaan konsultan               //header 
              $pdf->Cell(100,6,'1. BIAYA LANGSUNG PERSONIL',0,3,'L');      
              $header = array('No', 'Jabatan', 'Kualifikasi Pendidikan','Jumlah Orang','Jumlah Bulan','Intensitas','Kuantitas','Satuan','Biaya Personil (Rp.)','Jumlah Biaya (Rp.)');                 
              $w = array(10,30,35,15,15,14,14,15,20,20);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
                
                //isi    
                                $jumBLP=0;
                foreach ($listpengK as $rowk) {
                if(($rowk->dtk_sub_judul != '-99')&&($rowk->dtk_sub_judul !=$last)){ $pdf->SetFont('Arial','B',10); $last=$rowk->dtk_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk->sjd_sub_judul,'', '' ,'','','','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk->dtk_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor,$rowk->dtk_jabatan,$rowk->dtk_kualifikasi_pendidikan,$rowk->dtk_jml_org,$rowk->dtk_jml_bln+0,$rowk->dtk_intensitas+0,$rowk->dtk_kuantitas+0,$rowk->dtk_satuan,$pdf->formatrupiah($rowk->dtk_biaya_personil_hps),$pdf->formatrupiah($rowk->dtk_jml_biaya_hps))); 
		$jumBLP+=$rowk->dtk_jml_biaya_hps;        
                }
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'',1,0,'C',0); $pdf->Cell($w[2],7,'SUBTOTAL-1',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'C',0);$pdf->Cell($w[7],7,'',1,0,'C',0);$pdf->Cell($w[8],7,'',1,0,'R',0); $pdf->Cell($w[9],7,$pdf->formatrupiah($jumBLP),1,1,'R',0);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(100,6,'2. BIAYA LANGSUNG NON PERSONIL',0,3,'L');      
              $header = array('No', 'Uraian', 'Unit','Volume','Kuantitas','Satuan','Harga Satuan (Rp.)','Jumlah (Rp.)');                 
              $w = array(10,40,15,20,20,20,30,30);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(3);
		$no=0;
               
                //isi
                $jumBLNP=0;

                foreach ($listpengK2 as $rowk2) {
                if(($rowk2->dtk2_sub_judul != '-99')&&($rowk2->dtk2_sub_judul !=$last)){ $pdf->SetFont('Arial','B',10); $last=$rowk2->dtk2_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk2->sjd_sub_judul,'', '' ,'','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk2->dtk2_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor,$rowk2->dtk2_pekerjaan,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_satuan,$pdf->formatrupiah($rowk2->dtk2_hargasatuan_hps+0),$pdf->formatrupiah($rowk2->dtk2_jumlahharga_hps+0))); 
		$jumBLNP+=$rowk2->dtk2_jumlahharga_hps;        
                }
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'SUBTOTAL-2',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'R',0);$pdf->Cell($w[7],7,$pdf->formatrupiah($jumBLNP),1,0,'R',0);
 
                $pdf->AddPage();
                
                //Header
		$pdf->Cell(82);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'REKAPITULASI HARGA PERKIRAAN SENDIRI',0,3,'C');
		$pdf->Cell(30,6,strtoupper($d->pgd_perihal),0,3,'C');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$d->pgd_tanggal_input),0,3,'C');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
                    
                
$header = array('No', 'Uraian Pekerjaan', 'Jumlah');                 
              $w = array(10,100,50);
		$pdf->SetWidths($w);
		$pdf->SetFont('Arial','',12);
		$pdf->SetAligns('C');
              
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
                
                $pdf->Cell($w[0],7,'1.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLP),1,1,'R',0);
                $pdf->Cell($w[0],7,'2.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Non Personil',1,0,'L',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($jumBLNP),1,1,'R',0);
                if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah(0.1*$d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);                
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);
                
                }else{                                  
//----------------------------------------------------------------------------pengadaan barang/jasa-------------------------------------------------                 
                $header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');
                $w = array(10,75,35,30,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		$pdf->SetFont('Arial','',11);
		$pdf->SetAligns('L');
		$no=0;
		foreach ($listpeng as $row) {
		$no++;	
			$pdf->Row(array('  '.$no,$row->dtp_pekerjaan,($row->dtp_volume+0).' '.$row->dtp_satuan, $pdf->formatrupiah($row->dtp_hargasatuan_fix) ,$pdf->formatrupiah($row->dtp_jumlahharga_fix))); 
		}
		//$format = number_format($jum, 0, '','.');
		if($d->pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah(0.1*$d->pgd_jml_sblm_ppn_fix),1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,$pdf->formatrupiah($d->pgd_jml_ssdh_ppn_fix),1,1,'R',0);		
                }	
//--------------------------------------------------endif------------------------------------------------                
                
                $pdf->Ln(6);
		$cAngka = $pdf->Terbilang($d->pgd_jml_ssdh_ppn_fix);
		$b = ucfirst(strtolower($cAngka));
		$pdf->MultiCell(185,6,'Sebesar : '.$b.'rupiah',0,'L');
                if($d->pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
                }
                
                
                $pdf->Output();         
?>		