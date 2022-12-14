<?php 
    include '../koneksi.php';
    if (isset($_GET['id'])) {
        if ($_GET['id'] != "") {
            
            // Mengambil ID diURL
            $id = $_GET['id'];

            // Mengambil data gambar_produk didalam table produk
            $get_foto = "SELECT gambar_produk FROM produk WHERE id='$id'";
            $data_foto = mysqli_query($koneksi, $get_foto); 
            // Mengubah data yang diambil menjadi Array
            $foto_lama = mysqli_fetch_array($data_foto);

            // Menghapus Foto lama didalam folder FOTO
            unlink("../gambar/".$foto_lama['gambar_produk']);    

            // Mengapus data produk berdasarkan ID
            $query = mysqli_query($koneksi,"DELETE FROM produk WHERE id='$id'");
            if ($query) {
                echo "<script>
                alert('Data berhasil dihapus.');
                window.location='index.php';
                </script>";
            }else{
                echo "<script>
                alert('Data gagal dihapus.');
                window.location='index.php';
                </script>";
            }
            
        }else{
            // Apabila ID nya kosong maka akan dikembalikan kehalaman index
            header("location:index.php");
        }
    }else{
        // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
        header("location:index.php");
    }
?>