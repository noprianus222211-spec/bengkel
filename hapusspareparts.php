<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM spareparts_222211 WHERE 222211_idspareparts='$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.href='spareparts.php';</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!'); window.location.href='spareparst.php';</script>";
        }
    }
?>
