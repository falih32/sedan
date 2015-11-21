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
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(30,6,'Daftar Kuantitas dan Harga',0,3,'C');
		$pdf->Cell(30,10,'Nomor :xxxxx/PPK.5/XX/tahun ',0,3,'C');
		$pdf->Ln(10);
		
		$header = array('No', 'Uraian Pekerjaan', 'Volume','Harga Satuan','Jumlah');
		$w = array(10,75,35,35,35);
		$pdf->SetWidths($w);
		
		$pdf->SetAligns('C');
		for($i=0;$i<1;$i++){
			$pdf->Row($header); 
		}
		
		$pdf->SetAligns('L');
		$no=0;
		for($i=0;$i<3;$i++){
		$no++;	
			$pdf->Row(array($no,GenerateSentence(),GenerateSentence(),GenerateSentence(),GenerateSentence())); 
		}
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'PPN 10%',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,1,'C',0);
		$pdf->Cell($w[0],7,'',1,0,'c',0); $pdf->Cell($w[1],7,'Jumlah',1,0,'C',0); $pdf->Cell($w[2],7,'',1,0,'C',0); $pdf->Cell($w[3],7,'',1,0,'C',0); $pdf->Cell($w[4],7,'xxxxxxxx',1,1,'C',0);		
		$pdf->Ln(6);
		
		$pdf->MultiCell(100,6,'Sebesar : ',0,'L');
		$pdf->Cell(100,6,'Harga diatas sudah termasuk Pajak',0,3,'L');
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Jakarta, XX XXXX XXXX',0,3,'L');
		$pdf->Cell(100,6,'Mengetahui / Menyetujui',0,3,'L');
		$pdf->Cell(100,6,'Pejabat Pembuat Komitmen',0,3,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,'MAS NOPA',0,3,'L');
		
	$pdf->Output();	
?>		