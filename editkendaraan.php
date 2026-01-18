<?php
    include 'koneksi.php';

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $plat = $_POST['plat'];
        $jenis = $_POST['jenis'];
        $merk = $_POST['merk'];
        $tanggal_service = $_POST['tanggal_service'];
        $kerusakan = $_POST['kerusakan'];

        $query = "UPDATE kendaraan_222211 SET 222211_plat = '$plat', 222211_jenis = '$jenis', 222211_merk = '$merk', 222211_tgl = '$tanggal_service', 
                222211_kerusakan = '$kerusakan' WHERE 222211_kodecustomer = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data kendaraan berhasil diperbarui!'); window.location.href='kendaraan.php';</script>";
        } else {
            echo "<script>alert('Data kendaraan gagal diperbarui!'); window.location.href='kendaraan.php';</script>";
        }
    }
?>