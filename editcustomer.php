<?php
    include 'koneksi.php';

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $notlp = $_POST['notlp'];

        $query = "UPDATE customer_222211 SET 222211_nama = '$nama', 222211_notlp = '$notlp' WHERE 222211_kodecustomer = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data customer berhasil diperbarui!'); window.location.href='customer.php';</script>";
        } else {
            echo "<script>alert('Data customer gagal diperbarui!'); window.location.href='customer.php';</script>";
        }
    }
?>