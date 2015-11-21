<?php
require('mc_table.php');

function GenerateWord()
{
    //Get a random word
    $nb=rand(3,10);
    $w='';
    for($i=1;$i<=$nb;$i++)
        $w.=chr(rand(ord('a'),ord('z')));
    return $w;
}
function GenerateSentence()
{
    //Get a random sentence
    $nb=rand(1,10);
    $s='';
    for($i=1;$i<=$nb;$i++)
        $s.=GenerateWord().' ';
    return substr($s,0,-1);
}


$pdf=new PDF_MC_Table('p','mm','A4');
$pdf->AddPage();

//Header
		$pdf->Cell(80);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(30,6,'Lampiran Berita Acara Klarifikasi dan Negoisasi Harga',0,3,'C');
		$pdf->Cell(30,6,'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',0,3,'C');
		$pdf->Cell(30,6,'Setker Biro Umum Sekretariat Jendral Kementrian Kelautan dan Perikanan',0,3,'C');
		$pdf->Cell(30,6,'Nomor. xx.xxx.x/xxx.x/xx/xxxx',0,3,'C');
		$pdf->Ln(10);
		
		//header	
		$w = array(8,55,25,26,25,26,25);
		$pdf->SetWidths($w);
		$pdf->Cell($w[0],7,' ','LTR',0,'L',0); $pdf->Cell($w[1],7,'','LTR',0,'C',0); $pdf->Cell($w[2],7,'','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Penawaran','LTR',0,'C',0); $pdf->Cell(51,7,'Harga Negoisasi','LRT',1,'C',0);
		$pdf->Cell($w[0],7,'No','LR',0,'c',0); $pdf->Cell($w[1],7,'Uraian Pekerjaan','LR',0,'C',0); $pdf->Cell($w[2],7,'Volume','LR',0,'C',0); $pdf->Cell($w[3],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[4],7,'Jumlah',1,0,'C',0);$pdf->Cell($w[5],7,'Harga Satuan',1,0,'C',0); $pdf->Cell($w[6],7,'Jumlah',1,1,'C',0);		
		$pdf->Cell($w[0],7,'','LBR',0,'L',0); $pdf->Cell($w[1],7,'','LBR',0,'L',0); $pdf->Cell($w[2],7,'','LBR',0,'L',0); $pdf->Cell($w[3],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[4],7,'(Rp.)','LR',0,'C',0);$pdf->Cell($w[5],7,'(Rp.)','LR',0,'C',0); $pdf->Cell($w[6],7,'(Rp.)','LBR',1,'C',0);
		
		$pdf->SetAligns('L');
		$no=0;
		for($i=0;$i<1;$i++){
		$no++;	
			$pdf->Row(array($no,GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence())); 
		}
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,'xxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,'xxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,0,'C',0);$pdf->Cell($w[5],7,'',1,0,'C',0); $pdf->Cell($w[6],7,'xxxxxxx',1,1,'C',0);
		$pdf->Ln(6);
		
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(5);

 
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Jakarta, XX XXXX XXXX',0,1,'L');
		$pdf->Cell(120,6,'XXXX XXXXXXX',0,0,'L');$pdf->Cell(70,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Cell(120,6,'',0,0,'L');$pdf->Cell(70,6,'Satker Biro Umum Setjen KKP',0,3,'L');
		$pdf->Ln(20); 
		$pdf->SetFont('Arial','U',11); $pdf->Cell(120,5,'xxxxxxx',0,0,'L'); $pdf->SetFont('Arial','',11); $pdf->Cell(70,5,'MAS NOPA',0,1,'L');
		$pdf->Cell(130,5,'xxxxx',0,3,'L');
	$pdf->Output();	
?>		