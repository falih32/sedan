<?php
$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->SetMargins(15,10,10);

$pdf->AddPage();

//Header
		
		$pdf->Ln(45);
		$pdf->SetFont('Arial','B',12);
	
		$pdf->Cell(0,6,'SURAT PERINTAH MULAI KERJA (SPMK)',0,2,'C');
                $pdf->SetFont('Arial','',12);
		$pdf->MultiCell(0,3,'',0,'C');
		$pdf->Cell(0,6,'Nomor : ',0,2,'C');
                $pdf->Cell(0,6,'Paket Pekerjaan : xxxxxxx xxxxxxx xxxxxxxx xxxxxxx',0,2,'C');
		$pdf->Ln(5);
                $pdf->Cell(0,6,'Yang bertanda tangan di bawah ini :',0,1,'L');
		$pdf->Cell(0,6,'xxxxxxxx xxxxxx',0,1,'L');
		$pdf->Cell(0,6,'Pejabat Pembuat Komitmen Satker Biro Umum Setjen KKP',0,1,'L'); 
                $pdf->Cell(0,6,'Jalan Medan Merdeka Timur No.16 Jakarta Pusat',0,1,'L');
		$pdf->Ln(3);
                $pdf->Cell(0,6,'selanjutnya disebut sebagai Pejabat Pembuat Komitmen;',0,1,'L');
                $pdf->Ln(5);
                
		$pdf->MultiCell(0,5,'Berdasarkan Surat Printah Kerja (SPK) Nomor xxxxxx xxxxx xxxxx, tanggal $pdf->tanggal("j M Y",$tglSP->dknt_isi), bersama ini memerintahkan :',0,'J');
		$pdf->Ln(3);
		$pdf->Cell(0,5,'PT xxxxxxxxxxxxxx',0,1,'L'); 
                $pdf->MultiCell(0,5,'Jl.xxxxx xxxxx xxxxxx',0,'L');
                $pdf->Cell(0,5,'yang dalam hal ini diwakili oleh : ',0,1,'L'); 
		$pdf->Ln(3);
                $pdf->Cell(0,5,'selanjutnya disebut sebagai penyedia;',0,1,'L');
                $pdf->Ln(3);
                $pdf->MultiCell(0,5,'Untuk segera memulai pelaksanaan pekerjaaan dengan memperhatikan ketentuan-ketentuan sebagai berikut :',0,'J');
		$pdf->Ln(3);
                $header[0] = array('1.', 'Nama Pekerjaan : ');
                $header[1] = array('2.', 'Tanggal mulai kerja : ');
                $header[2] = array('3.', 'Syarat-syarat pekerjaan : sesuai dengan persyaratan dan ketentuan SPK.');
                $header[3] = array('4.', 'Waktu penyelesaian : selama xx Hari Kalender dan pekerjaan harus sudah selesai pada tanggal xx xxxxxx xxxx');
                $header[4] = array('5.', 'Denda : Terhadap setiap hari keterlambatan pelaksanaan/penyelesaian pekerjaan. Penyedia akan dikenakan Denda Keterlambatan sebesar 1/1000 (satu per seribu) dari nilai SPK atau nilai bagian SPK untuk setiap hari keterlambatan.');
                $w = array(10,175);
		$pdf->SetWidths($w);
		for($i=0;$i<5;$i++){
			$pdf->RowNoLines($header[$i]); 
		}
                $pdf->Ln(5);
                if($pdf->GetY()>181){
                $pdf->AddPage();    
                }
		$pdf->Cell(0,6,'Jakarta, xxx xxxx xxxx',0,2,'L');
		$pdf->Ln(3);
		$pdf->Cell(0,6,'Untuk dan atas nama Satker Biro Umum Setjen KKP',0,2,'L');
		$pdf->Cell(0,6,'Pejabat Pembuat Komitmen',0,2,'L');
		$pdf->Ln(15);
                $pdf->Cell(0,6,'xxxxxxxx',0,2,'L');
                $pdf->Ln(5);
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,6,'Menerima dan menyetujui :',0,2,'L');
                $pdf->SetFont('Arial','',12);
                $pdf->Cell(0,6,'Untuk dan atas nama PT.Xxxxxxxxxxxxxxx xxxxx xxx',0,2,'L');
                $pdf->Ln(25);
                $pdf->Cell(0,6,'xxxxx xxxxxxx',0,2,'L');
                $pdf->Cell(0,5,'xxx',0,2,'L');
        $pdf->Output();	
?>		