<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);
$pdf->AddPage();
$last=-11;
//Header
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'DAFTAR KUANTITAS DAN HARGA',0,3,'L');
                $pdf->MultiCell(0,6,strtoupper($perihal),0,'L');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'L');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$tgl),0,3,'L');
		$pdf->Ln(6);
		$pdf->SetFont('Arial','B',12);
                
                
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
            
                foreach ($listpengK as $rowk) {
                if(($rowk->dtk_sub_judul != '-99')&&($rowk->dtk_sub_judul !=$last)){$pdf->SetFont('Arial','B',10);$last=$rowk->dtk_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk->sjd_sub_judul,'', '' ,'','','','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk->dtk_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
                $pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor,$rowk->dtk_jabatan,$rowk->dtk_kualifikasi_pendidikan,$rowk->dtk_jml_org,$rowk->dtk_jml_bln+0,$rowk->dtk_intensitas+0,$rowk->dtk_kuantitas+0,$rowk->dtk_satuan,'','')); 
		      
                }                
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'',1,0,'C',0); $pdf->Cell($w[2],7,'SUBTOTAL-1',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'C',0);$pdf->Cell($w[7],7,'',1,0,'C',0);$pdf->Cell($w[8],7,'',1,0,'R',0); $pdf->Cell($w[9],7,'',1,1,'R',0);
$pdf->Ln(6);
$pdf->SetFont('Arial','B',12);
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
                foreach ($listpengK2 as $rowk2) {
                if(($rowk2->dtk2_sub_judul != '-99')&&($rowk2->dtk2_sub_judul !=$last)){ $pdf->SetFont('Arial','B',10);$last=$rowk2->dtk2_sub_judul; $no++; $pdf->Row(array($no.'.',$rowk2->sjd_sub_judul,'', '' ,'','','','')); $subno=0;}
		$subno++;
                if($no!=0 && $rowk2->dtk2_sub_judul != '-99'){$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',10);	
                $pdf->Row(array($nomor.'.',$rowk2->dtk2_pekerjaan,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_volume+0,$rowk2->dtk2_satuan,'',''));    
                }
                $pdf->SetFont('Arial','B',10);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'SUBTOTAL-2',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'',1,0,'C',0); $pdf->Cell($w[5],7,'',1,0,'C',0);$pdf->Cell($w[6],7,'',1,0,'R',0);$pdf->Cell($w[7],7,'',1,0,'R',0);
 
                $pdf->AddPage();
                
                //Header
		$pdf->Cell(82);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,6,'REKAPITULASI HARGA PERKIRAAN SENDIRI',0,3,'C');
		$pdf->Cell(30,6,strtoupper($perihal),0,3,'C');
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,3,'C');
		$pdf->Cell(30,6,'TAHUN '.$pdf->tanggal("Y",$tgl),0,3,'C');
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
                
                $pdf->Cell($w[0],7,'1.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Personil',1,0,'L',0); $pdf->Cell($w[2],7,'......................',1,1,'R',0);
                $pdf->Cell($w[0],7,'2.',1,0,'c',0); $pdf->Cell($w[1],7,'Biaya Langsung Non Personil',1,0,'L',0); $pdf->Cell($w[2],7,'......................',1,1,'R',0);
                if($pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,'......................',1,1,'R',0);
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'......................',1,1,'R',0);                
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'TOTAL',1,0,'C',0); $pdf->Cell($w[2],7,'......................',1,1,'R',0);
                }
                
                
//---------------------------------------------------------pengadaan barang jasa ---------------------------------------                
                else{
                    
 //-----------------------------------pengadaan jasa barang---------------------------------------------------------------------------------------                   
 //header 
   $header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan (Rp.)','     Jumlah      (Rp.)');                 
    $w = array(12,73,35,30,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row1($header); 
		}
		
		$pdf->SetAligns('L');
                $pdf->SetRataKanan(2);
		$no=0;
                $subno=0;
                $pdf->SetFont('Arial','',12);
 //isi                   
		foreach ($listpeng as $row) {
                if(($row->dtp_sub_judul != '-99')&&($row->dtp_sub_judul !=$last)){$pdf->SetFont('Arial','B',12);$no++; $pdf->Row(array($no.'.',$row->sjd_sub_judul,'', '' ,''));$last=$row->dtp_sub_judul; $subno=0;}
		$subno++;
                if($no!=0 && $row->dtp_sub_judul != '-99') {$nomor=$no.'.'.$subno;} else {$nomor=$subno;}
		$pdf->SetFont('Arial','',12);	$pdf->Row(array($nomor.'.',$row->dtp_pekerjaan,($row->dtp_volume+0).' '.$row->dtp_satuan, '' ,'')); 
		}
		//$format = number_format($jum, 0, '','.');
		if($pgd_dgn_pajak==0){
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'..........',1,1,'R',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'..........',1,1,'R',0);
                }
                $pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'..........',1,1,'R',0);		
                }          
//-------------------------------------------endif----------------------------------------------------------                

                $pdf->Ln(7);
		$pdf->MultiCell(185,6,'Sebesar : ',0,'L');
                if($pgd_dgn_pajak==0){
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
                }
                $pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,8,'Jakarta,'.$pdf->tanggal("j M Y",$tgl),0,3,'L');
		
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang / Jasa',0,3,'L');
                $pdf->Cell(100,6,'Satker Biro Umum Sekretariat Jenderal',0,3,'L');
                $pdf->Cell(100,6,'Kementerian Kelautan dan Perikanan',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,$namapejpeng,0,3,'L');
		
	$pdf->Output('daftar harga '.$perihal.'.pdf','I');	
?>		