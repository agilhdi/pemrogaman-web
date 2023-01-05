<?php
    // memanggil library FPDF
    require('../lib/pdf/fpdf.php');
    include '../koneksi.php';

    // intance object dan memberikan pengaturan halaman PDF
    $pdf=new FPDF('P','mm','A4');
    $pdf->AddPage();

    $pdf->SetFont('Times','B',13);
    $pdf->Cell(180,10,'DATA PRODUK',0,0,'C');

    $pdf->Cell(10,15,'',0,1);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(10,7,'NO',1,0,'C');
    $pdf->Cell(30,7,'NAMA PRODUK' ,1,0,'C');
    $pdf->Cell(75,7,'DESKRIPSI',1,0,'C');
    $pdf->Cell(25,7,'HARGA BELI',1,0,'C');
    $pdf->Cell(25,7,'HARGA JUAL',1,0,'C');

    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Times','',10);
    $no=1;
    $data = mysqli_query($koneksi,"SELECT  * FROM produk");
    while($d = mysqli_fetch_array($data)){
        $pdf->Cell(10,6, $no++,1,0,'C');
        $pdf->Cell(30,6, $d['nama_produk'],1,0);
        $pdf->Cell(75,6, $d['deskripsi'],1,0);  
        $pdf->Cell(25,6, $d['harga_beli'],1,0);
        $pdf->Cell(25,6, $d['harga_jual'],1,1);
    }

    $pdf->Output();

?>