<?php
require_once 'PHP/App/init.php';
require_once 'PHP/Data.php';
require('assets/fpdf.php');

class PDF extends FPDF {

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

    // table mustahik warga
    function MustahikWargaTable($header,$data){
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
            $this->Cell($width[1],7,current($row["kategori"]),1,0,'L',$fill);
            $this->Cell($width[2],7,$row["hak_beras"],1,0,'C',$fill);
            $this->Cell($width[3],7,$row['jumlah_kk'],1,0,'C',$fill);
            $this->Cell($width[4],7,$row['total_beras'],1,0,'C',$fill);
            $this->Ln();
            $fill=!$fill;
            $x++;
        }
      }

      // tabel mustahik lainnya
      function MustahikLainTable($header,$data){
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
            $this->Cell($width[1],7,current($row["kategori"]),1,0,'L',$fill);
            $this->Cell($width[2],7,$row["hak_beras"],1,0,'C',$fill);
            $this->Cell($width[3],7,$row['jumlah_kk'],1,0,'C',$fill);
            $this->Cell($width[4],7,$row['total_beras'],1,0,'C',$fill);
            $this->Ln();
            $fill=!$fill;
            $x++;
        }
      }
}

// inisiasi fpdf
$pdf = new PDF();

// Column headings
$header = array('No', 'Kategori Mustahik', 'Hak Beras', 'Jumlah KK', 'Total Beras');

// temp for data mustahik warga
$array1 = [
    [
        "kategori" => [],
        "hak_beras" => "",
        "jumlah_kk" => "",
        "total_beras" => ""
    ],
];

// Data loading
$data1 = $mustahikwarga;

// mustahikwarga to array1
$i = 0;
foreach ($data1 as $key) {
    if ($key['kategori'] == "Fakir") {
        $array1[0]["kategori"][$i] = $key['kategori'];
        $array1[0]["hak_beras"] = $key['hak'];
        $array1[0]["jumlah_kk"] = count($array1[0]["kategori"]);
        $temp = explode(' ',$array1[0]["hak_beras"]);
        $hak_beras = current($temp);
        $array1[0]["total_beras"] = $hak_beras * $array1[0]["jumlah_kk"];
    }

    if ($key['kategori'] == "Miskin") {
        $array1[1]["kategori"][$i] = $key['kategori'];
        $array1[1]["hak_beras"] = $key['hak'];
        $array1[1]["jumlah_kk"] = count($array1[1]["kategori"]);
        $temp = explode(' ',$array1[1]["hak_beras"]);
        $hak_beras = current($temp);
        $array1[1]["total_beras"] = $hak_beras * $array1[1]["jumlah_kk"];
    }

    if ($key['kategori'] == "Mampu") {
        $array1[2]["kategori"][$i] = $key['kategori'];
        $array1[2]["hak_beras"] = $key['hak'];
        $array1[2]["jumlah_kk"] = count($array1[2]["kategori"]);
        $temp = explode(' ',$array1[2]["hak_beras"]);
        $hak_beras = current($temp);
        $array1[2]["total_beras"] = $hak_beras * $array1[2]["jumlah_kk"];
    }
    $i++;
}

// temp for data mustahik lainnya
$array2 = [
    [
        "kategori" => [],
        "hak_beras" => "",
        "jumlah_kk" => "",
        "total_beras" => ""
    ],
];

// Data loading
$data2 = $mustahiklainnya;

// mustahiklainnya to array2
$i = 0;
foreach ($data2 as $key) {
    if ($key['kategori'] == "Amilin") {
        $array2[0]["kategori"][$i] = $key['kategori'];
        $array2[0]["hak_beras"] = $key['hak'];
        $array2[0]["jumlah_kk"] = count($array2[0]["kategori"]);
        $temp = explode(' ',$array2[0]["hak_beras"]);
        $hak_beras = current($temp);
        $array2[0]["total_beras"] = $hak_beras * $array2[0]["jumlah_kk"];
    }

    if ($key['kategori'] == "Fisabilillah") {
        $array2[1]["kategori"][$i] = $key['kategori'];
        $array2[1]["hak_beras"] = $key['hak'];
        $array2[1]["jumlah_kk"] = count($array2[1]["kategori"]);
        $temp = explode(' ',$array2[1]["hak_beras"]);
        $hak_beras = current($temp);
        $array2[1]["total_beras"] = $hak_beras * $array2[1]["jumlah_kk"];
    }

    if ($key['kategori'] == "Mualaf") {
        $array2[2]["kategori"][$i] = $key['kategori'];
        $array2[2]["hak_beras"] = $key['hak'];
        $array2[2]["jumlah_kk"] = count($array2[2]["kategori"]);
        $temp = explode(' ',$array2[2]["hak_beras"]);
        $hak_beras = current($temp);
        $array2[2]["total_beras"] = $hak_beras * $array2[2]["jumlah_kk"];
    }

    if ($key['kategori'] == "Ibnu Sabil") {
        $array2[3]["kategori"][$i] = $key['kategori'];
        $array2[3]["hak_beras"] = $key['hak'];
        $array2[3]["jumlah_kk"] = count($array2[3]["kategori"]);
        $temp = explode(' ',$array2[3]["hak_beras"]);
        $hak_beras = current($temp);
        $array2[3]["total_beras"] = $hak_beras * $array2[3]["jumlah_kk"];
    }
    $i++;
}

// write pdf
$pdf->AddPage();

    // Set font family to Arial bold
    $pdf->SetFont('Arial','B',15);
    
    // Move to the right
    $pdf->Cell(35);
    
    // Header
    $pdf->Cell(130,7,'Laporan Distribusi Zakat Fitrah',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(200,10,'Mustahik Warga',0,0,'C');
    // Line break
    $pdf->Ln(10);

$pdf->SetFont('Times','',14);
$pdf->MustahikWargaTable($header,$array1);
$pdf->ln();

    // Set font family to Arial bold
    $pdf->SetFont('Arial','B',15);
    
    // Header
    $pdf->Cell(200,10,'Mustahik Lainnya',0,0,'C');
    // Line break
    $pdf->Ln(10);

$pdf->SetFont('Times','',14);
$pdf->MustahikLainTable($header,$array2);
$pdf->ln();

//
$pdf->Output();

?>
