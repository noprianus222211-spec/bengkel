<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $cust = mysqli_query($conn, "DELETE FROM customer_222211 WHERE 222211_kodecustomer='$id'");
        $query = mysqli_query($conn, "DELETE FROM kendaraan_222211 WHERE 222211_kodecustomer='$id'");

        echo mysqli_error($conn);
            echo "<script>alert('Data kendaraan berhasil dihapus!'); window.location.href='kendaraan.php';</script>";
        } else {
            echo "<script>alert('Data kendaraan gagal dihapus!'); window.location.href='kendaraan.php';</script>";
    }
?>
