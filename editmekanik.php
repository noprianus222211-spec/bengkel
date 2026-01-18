<?php
    include 'koneksi.php';

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $status = $_POST['status'];

        $query = "UPDATE mekanik_222211 SET 222211_namamekanik = '$nama', 222211_status = '$status' WHERE 222211_kodemekanik = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data mekanik berhasil diperbarui!'); window.location.href='mekanik.php';</script>";
        } else {
            echo "<script>alert('Data mekanik gagal diperbarui!'); window.location.href='mekanik.php';</script>";
        }
    }
?>