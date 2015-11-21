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

$pdf=new PDF_MC_Table();
$pdf->AddPage();

//Header
		$pdf->Image('logokelautan.png',10,8,-400);
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
		$pdf->Line(10,50,200,50);
		$pdf->SetLineWidth(1.5);
		$pdf->Line(10,52,200,52);
		$pdf->Ln(8);
		$pdf->SetFont('Arial','',12);
		
		$pdf->MultiCell(190,5,'Daftar Hadir Peserta pengadaan langsung Pekerjaan xxxxxx xxxxxxx xxxxxx xxxxxx xxxxxx  xxxxx xxxx xxxx xxxx xxxxxx xxxxxx xxxxx',0,'J');
		$pdf->Ln(5);

		$pdf->Cell(30,5,'Nomor',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,'XX.XXX.x/XXX.X/XX/XXXX',0,1,'L');
		$pdf->Cell(30,5,'Tanggal',0,0,'L'); $pdf->Cell(3,5,':',0,0,'L'); $pdf->Cell(140,5,'XX XXXX XXXX',0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetLineWidth(0.2);
		$w = array(10,80,60,40);		
		$pdf->SetWidths($w);
		$header = array('No', 'Nama Perusahaan', 'Nama Yang Hadir','Tanda Tangan');
		srand(microtime()*1000000);
		$pdf->SetHeaders($header,$w);
		$n=0;
		for($i=0;$i<4;$i++){
			$n++;
			$pdf->Row(array($n.'.',GenerateSentence(),GenerateSentence(),GenerateSentence())); 
			}
		$pdf->Ln(10);
		
		$pdf->Cell(105); 
		$pdf->Cell(100,6,'Pejabat Pengadaan Barang/Jasa',0,2,'L');
		$pdf->Cell(100,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(100,6,'Sekretariat Jendral KKP',0,2,'L');
		$pdf->Ln(20);
		$pdf->Cell(105); 
		$pdf->Cell(100,10,'MAS NOPA',0,3,'L');
		
	$pdf->Output();	
?>		