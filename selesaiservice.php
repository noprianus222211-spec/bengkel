<?php
    include 'koneksi.php';

    if (isset($_POST['selesai'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $status = "Selesai";
        $mekanik = "Tersedia";
        $bayar = "Belum Bayar";

        $update = mysqli_query($conn,"UPDATE mekanik_222211 SET 222211_status = '$mekanik' WHERE 222211_kodemekanik = '$kode'");

        $query = "UPDATE kendaraan_222211 SET 222211_kodemekanik = '$kode', 222211_status = '$status', 222211_pembayaran = '$bayar' WHERE 222211_kodecustomer = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Kendaraan Berhasil Diservice, Silahkan Membayar!'); window.location.href='service.php';</script>";
        } else {
            echo "<script>alert('Gagal!'); window.location.href='service.php';</script>";
        }
    }
?>