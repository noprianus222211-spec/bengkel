<?php
    include 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // URUTAN PENTING: Hapus data anak yang paling bawah (Transaksi) terlebih dahulu

        // 1. HAPUS DATA DARI TRANSAKSI (Tabel Anak Paling Bawah)
        $query_transaksi = mysqli_query($conn, "DELETE FROM transaksi_222211 WHERE 222211_kodecustomer='$id'");

        if ($query_transaksi) {
            // 2. HAPUS DATA DARI KENDARAAN (Tabel Anak Tengah)
            $query_kendaraan = mysqli_query($conn, "DELETE FROM kendaraan_222211 WHERE 222211_kodecustomer='$id'");

            if ($query_kendaraan) {
                // 3. HAPUS DATA DARI CUSTOMER (Tabel Induk)
                $query_customer = mysqli_query($conn, "DELETE FROM customer_222211 WHERE 222211_kodecustomer='$id'");

                if ($query_customer) {
                    // Semua penghapusan berhasil
                    echo "<script>alert('Data customer, kendaraan, dan transaksi berhasil dihapus!'); window.location.href='customer.php';</script>";
                } else {
                    // Gagal menghapus customer (jarang terjadi)
                    echo "<script>alert('Gagal menghapus data customer. Error: " . mysqli_error($conn) . "'); window.location.href='customer.php';</script>";
                }
            } else {
                // Gagal menghapus kendaraan
                echo "<script>alert('Gagal menghapus data kendaraan. Error: " . mysqli_error($conn) . "'); window.location.href='customer.php';</script>";
            }
        } else {
            // Gagal menghapus transaksi
            echo "<script>alert('Gagal menghapus data transaksi. Error: " . mysqli_error($conn) . "'); window.location.href='customer.php';</script>";
        }

    } else {
        // ID tidak ditemukan
        echo "<script>alert('ID tidak valid atau tidak ditemukan!'); window.location.href='customer.php';</script>";
    }

?>