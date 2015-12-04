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
		$pdf->Image('logokelautan.png',10,8,-400);
		//Arial bold 15
		$pdf->SetFont('Arial','B',16);
				$pdf->Cell(80);
		//judul
		$pdf->Cell(30,6,'KEMENTERIAN KELAUTAN DAN PERIKANAN',0,2,'C');
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
		$pdf->Ln(7);
		
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(20,5,'Nomor',0,0,'L'); $pdf->Cell(100,5,': xxxxxx/PPK.5/XX/XXXX',0,0,'L'); $pdf->Cell(40,5,'Jakarta, XX XXXX XXXX',0,1,'L');
		$pdf->Cell(20,5,'Sifat',0,0,'L'); $pdf->Cell(70,5,': Biasa',0,1,'L');
		$pdf->Cell(20,5,'Lampiran',0,0,'L'); $pdf->Cell(70,5,': x(xxxx) berkas',0,1,'L');
		$pdf->Cell(20,5,'Perihal',0,0,'L'); $pdf->SetFont('Arial','B',12); $pdf->Cell(70,5,': Penetapan Penyedia Barang/Jasa',0,1,'L');
		$pdf->Ln(10);
		
		$pdf->SetFont('Arial','',12);
		$pdf->MultiCell(190,5,'Berdasarkan Berita Acara Hasil Pengadaan Langsung Nomor                                           xx.x/PPK.x/xx/xxxx, Evaluasi Administrasi, Evaluasi Teknis dan Penawaran Harga calon  Penyedia Barang/Jasa Pengadaan .......... sebagaimana terlampir, maka Pejabat Pengadaan Barang/Jasa Satker Biro Umum menetapkan penyedia  Pekerjaan.......... sebagai berikut :',0,'J');
		$pdf->Ln(5);
		$pdf->Cell(5); $pdf->Cell(70,5,'Nama Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Alamat Perusahaan',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'NPWP',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Penawaran',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxxxxxxxxxx xxxxxxxxxxxx',0,'J');
		$pdf->Cell(5); $pdf->Cell(70,5,'Harga Negoisasi',0,0,'L'); $pdf->Cell(5,5,':',0,0,'L'); $pdf->MultiCell(115,5,'xxxxxxxxxxx xxxxxxxx xxxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxxxxx xxxxxxxx',0,'J');
		$pdf->Ln(5);
		$pdf->MultiCell(190,5,'Demikian disampaikan, atas perhatiannya diucapkan terima kasih.',0,'J');
		$pdf->Ln(10);
		$pdf->Cell(110);
		$pdf->Cell(90,6,'Pejabat Pengadaan Barang / Jasa',0,2,'L'); 
		$pdf->Cell(90,6,'Satker Biro Umum',0,2,'L');
		$pdf->Cell(90,6,'Sekretariat Jenderal',0,2,'L');
		$pdf->Cell(90,6,'Kementerian Kelautan dan Perikanan',0,2,'L');
		$pdf->Ln(15);
	   $pdf->Cell(110); $pdf->Cell(90,6,'xxxx xxxxx xxxxx xxxxx xxxxx',0,2,'L');
		
		
	$pdf->Output();	
?>		