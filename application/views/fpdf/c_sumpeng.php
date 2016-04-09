<?php
$pdf=new PDF_MC_Table('L','mm','A4');
$pdf->AddPage();
//$pdf->SetMargins();
//Header	

$pdf->SetFont('Arial','B',11);
$w = array(10,80,50,40,35,26,30);
$pdf->SetWidths($w);
$a='C';
$pdf->SetAligns($a);
//header
    for($i=0;$i<1;$i++){
        $pdf->Row1(array('No','Nama Pengadaaan','Nama Penyedia','No. SPK','Tgl. SPK','Waktu Pelaksanaan','Nilai Kontrak')); 
    } 
//isi
$pdf->SetFont('Arial','',11);    
$pdf->SetAligns('L');
$pdf->SetRataKanan(5);
$pdf->SetWidths($w);
 $no=0;   
 foreach ($d as $p) {
 $no++;    
     $pdf->Row(array($no.'.',$p->pgd_perihal,$p->spl_nama,$p->no_spk, $pdf->tanggal(" j M Y",$p->tgl_spk), $p->pgd_lama_pekerjaan." hari", $pdf->formatrupiah($p->pgd_jml_ssdh_ppn_fix)));   
 }   
		
$pdf->Output();	
?>		