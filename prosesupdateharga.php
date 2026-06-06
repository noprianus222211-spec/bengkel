<?php
include 'koneksi.php';

if (isset($_POST['update_harga'])) {
    $kode_customer = $_POST['kode_customer'];
    $hargajasa = $_POST['hargajasa'];
    $total = $_POST['total'];

    $updateHarga = "UPDATE transaksi_222211 SET 222211_hargajasa = $hargajasa, 222211_total = $total WHERE 222211_kodecustomer = '$kode_customer'";
    
    if (mysqli_query($conn, $updateHarga)) {
        echo "<script>alert('Berhasil Update Harga!'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal Update Harga!'); window.location.href='transaksi.php';</script>";
    }
} else {
    echo "<script>alert('Gagal Update Harga!'); window.location.href='transaksi.php';</script>";
}
?>
