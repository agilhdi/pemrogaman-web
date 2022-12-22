<?php
    include('../koneksi.php');
    require '../lib/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'NAMA PRODUK');
    $sheet->setCellValue('C1', 'DESKRIPSI');
    $sheet->setCellValue('D1', 'HARGA JUAL');
    $sheet->setCellValue('E1', 'HARGA BELI');

    $data = mysqli_query($koneksi,"select * from produk");
    $i = 2;
    $no = 1;
    while($d = mysqli_fetch_array($data)){
        $sheet->setCellValue('A'.$i, $no++);
        $sheet->setCellValue('B'.$i, $d['nama_produk']);
        $sheet->setCellValue('C'.$i, $d['deskripsi']);
        $sheet->setCellValue('D'.$i, $d['harga_jual']);
        $sheet->setCellValue('E'.$i, $d['harga_beli']);    

        $i++;
    }

    $writer = new Xlsx($spreadsheet);
    $writer->save('Data Produk.xlsx');
    echo "<script>window.location = 'Data Produk.xlsx'</script>";
    echo "<script>window.location='index.php';</script>";

?>