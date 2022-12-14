<?php
    //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
    include('../koneksi.php');
    session_start();
    if($_SESSION['status']!="login"){
        header("location:../index.php?pesan=belum_login");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD Produk dengan gambar - Gilacoding</title>
        <style type="text/css">
            * {
                font-family: "Trebuchet MS";
            }

            h1 {
                text-transform: uppercase;
                color: salmon;
            }

            table {
                border: solid 1px #DDEEEE;
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                margin: 10px auto 10px auto;
            }

            table thead th {
                background-color: #DDEFEF;
                border: solid 1px #DDEEEE;
                color: #336B6B;
                padding: 10px;
                text-align: left;
                text-shadow: 1px 1px 1px #fff;
                text-decoration: none;
            }

            table tbody td {
                border: solid 1px #DDEEEE;
                color: #333;
                padding: 10px;
                text-shadow: 1px 1px 1px #fff;
            }

            a {
                background-color: salmon;
                color: #fff;
                padding: 10px;
                text-decoration: none;
                font-size: 12px;
            }
            .add-produk {
                background-color: #d4eb57;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>Data Produk</h1>
            <a href="logout.php">Logout</a>
            <a href="tambah_produk.php" class="add-produk">+ &nbsp; Tambah roduk</a><br /><br />
        </center>
        <table>
            <thead>
                <tr>
                <th>NO</th>
                <th>Produk</th>
                <th>Dekripsi</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Gambar</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
            <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if(!$result){
                die ("Query Error: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
            }

            //buat perulangan untuk element tabel dari data mahasiswa
            $no = 1; //variabel untuk membuat nomor urut
            // hasil query akan disimpan dalam variabel $data dalam bentuk array
            // kemudian dicetak dengan perulangan while
            while($row = mysqli_fetch_assoc($result)){
            ?> 
            <tr>
                <td> <?= $no; ?> </td>
                <td> <?= $row['nama_produk']; ?> </td>
                <td> <?= substr($row['deskripsi'], 0, 20); ?>... </td>
                <td>Rp <?= number_format($row['harga_beli'],0,',','.'); ?> </td>
                <td>Rp <?= $row['harga_jual']; ?> </td>
                <td style="text-align: center;">
                    <img src="../gambar/<?= $row['gambar_produk']; ?>" style="width: 120px;">
                </td>
                <td>
                    <a href="edit_produk.php?id=<?= $row['id']; ?>">Edit </a> | <a href="proses_hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus </a>
                </td>
            </tr> 
            <?php
                    $no++; //untuk nomor urut terus bertambah 1
                }
            ?> 
            </tbody>
        </table>
    </body>
</html>