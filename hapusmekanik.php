<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = mysqli_query($conn, "DELETE FROM mekanik_222211 WHERE 222211_kodemekanik='$id'");

        echo mysqli_error($conn);
            echo "<script>alert('Data mekanik berhasil dihapus!'); window.location.href='mekanik.php';</script>";
        } else {
            echo "<script>alert('Data mekanik gagal dihapus!'); window.location.href='mekanik.php';</script>";
    }
?>
