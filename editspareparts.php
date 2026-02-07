<?php
    include 'koneksi.php';
    if (isset($_POST['edit'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $merk = $_POST['merk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $kategori_sparepart = $_POST['kategori_sparepart'];

        $query = "UPDATE spareparts_222211 SET 
        222211_kodespareparts='$kode', 
        222211_namaspareparts='$nama', 
        222211_merkspareparts='$merk', 
        222211_hargaspareparts='$harga', 
        222211_stok='$stok',
        222211_kategori_sparepart='$kategori_sparepart'
        WHERE 222211_kodespareparts='$kode'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diedit!'); window.location.href='spareparts.php';</script>";
        } else {
            echo "<script>alert('Data gagal diedit!'); window.location.href='spareparst.php';</script>";
        }
    }
?>
