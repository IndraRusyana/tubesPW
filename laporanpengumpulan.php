<?php
require_once 'PHP/App/init.php';
require_once 'PHP/Data.php';
require('assets/fpdf.php');

class PDF extends FPDF {

	// Page header
	function Header() {
		
		// Add logo to page
		// $this->Image('assets/img/brand/blue.png',10,8,33);
		
		// Set font family to Arial bold
		$this->SetFont('Arial','B',15);
		
		// Move to the right
		$this->Cell(35);
		
		// Header
		$this->Cell(130,10,'Laporan Pengumpulan Zakat Fitrah',0,0,'C');
		
		// Line break
		$this->Ln(15);
	}

	// Page footer
	function Footer() {
		
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		
		// Page number
		$this->Cell(0,10,'Page ' .
			$this->PageNo(),0,0,'C');

        $this->Cell(0,10,'By Indra Rusyana',0,0,'R');
	}

    function createTable($header,$data){
        $width=[12,50,40,40,40];
        $this->SetFillColor( 112, 104, 102 );
        $this->SetTextColor(255,255,255);
        $this->SetDrawColor(0,0,0);
        for($i=0;$i<count($header);$i++)
        {
          $this->Cell($width[$i],7,$header[$i],1,0,'C',true);
        }
        $this->Ln();
        $this->SetFillColor(213,213,213);
        $this->SetTextColor(0,0,0);
        $x = 1;
        $fill=false;
        foreach($data as $row){
            $this->Cell($width[0],7,$x,1,0,'C',$fill);
            $this->Cell($width[1],7,$row['nama_kk'],1,0,'L',$fill);
            $this->Cell($width[2],7,$row['jumlah_tanggunganyangdibayar'],1,0,'C',$fill);
            $this->Cell($width[3],7,$row['bayar_beras'],1,0,'C',$fill);
            $this->Cell($width[4],7,$row['bayar_uang'],1,0,'C',$fill);
            $this->Ln();
            $fill=!$fill;
            $x++;
        }
      }
}

$pdf = new PDF();
// Column headings
$header = array('No', 'Nama KK', 'Banyak Jiwa', 'Bayar Beras', 'Bayar Uang');

// Data loading
$data = $bayarzakat;

//
$total_jumlah_tanggungan = 0;
$total_bayar_beras = 0;
$total_bayar_uang = 0;
foreach ($data as $key) {
    $total_nama_kk[] = $key['nama_kk'];
    $total_jumlah_tanggungan = $key['jumlah_tanggunganyangdibayar'] + $total_jumlah_tanggungan;

    $temp = explode(' ',$key['bayar_beras']);
    $beras = current($temp);
    $total_bayar_beras = $beras + $total_bayar_beras;

    $temp = explode('. ',$key['bayar_uang']);
    $uang = end($temp);
    $total_bayar_uang = $uang + $total_bayar_uang;
}

//
$pdf->SetFont('Times','',14);
$pdf->AddPage();
$pdf->createTable($header,$data);
$pdf->ln();

//
$pdf->Cell(0,7,'Total Muzakki : '.count($total_nama_kk),0,0,'LR');
$pdf->ln();
$pdf->Cell(0,7,'Total Jiwa : '.$total_jumlah_tanggungan,0,0,'LR');
$pdf->ln();
$pdf->Cell(0,7,'Total Beras : '.$total_bayar_beras.' Kg',0,0,'LR');
$pdf->ln();
$pdf->Cell(0,7,'Total Uang : Rp. '.$total_bayar_uang,0,0,'LR');

//
$pdf->Output();

?>
