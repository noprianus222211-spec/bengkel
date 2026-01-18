<?php
    include 'koneksi.php';

    if (isset($_POST['pilih'])) {
        $id = $_POST['id'];
        $kode = $_POST['kode'];
        $status = "Dikerjakan";
        $mekanik = "Tidak Tersedia";

        $update = mysqli_query($conn,"UPDATE mekanik_222211 SET 222211_status = '$mekanik' WHERE 222211_kodemekanik = '$kode'");

        $query = "UPDATE kendaraan_222211 SET 222211_kodemekanik = '$kode', 222211_status = '$status' WHERE 222211_kodecustomer = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Berhasil Memilih Mekanik, Mobil Dikerjakan!'); window.location.href='service.php';</script>";
        } else {
            echo "<script>alert('Gagal Memilih!'); window.location.href='service.php';</script>";
        }
    }
?>