<?php
include 'koneksi.php';

if (isset($_POST['bayar'])) {
    $kode_transaksi = $_POST['kode_transaksi'];
    $sts = "Berhasil";
    $kode_customer = $_POST['kode_customer'];
    $hargajasa = $_POST['hargajasa'];
    $total = $_POST['total'];
    $jumlah_uang = $_POST['jumlah_uang'];
    $kembalian = $_POST['kembalian'];

    $spareparts = isset($_POST['spareparts']) ? $_POST['spareparts'] : [];
    $sparepartNames = [];
    foreach ($spareparts as $kode_sparepart) {
        $sparepartQuery = "SELECT 222211_namaspareparts FROM spareparts_222211 WHERE 222211_kodespareparts = '$kode_sparepart'";
        $result = mysqli_query($conn, $sparepartQuery);
        if ($row = mysqli_fetch_assoc($result)) {
            $sparepartNames[] = $row['222211_namaspareparts'];
        }
        $updateStokQuery = "UPDATE spareparts_222211 SET 222211_stok = 222211_stok - 1 WHERE 222211_kodespareparts = '$kode_sparepart'";
        mysqli_query($conn, $updateStokQuery);

        $updatePembayaranQuery = "UPDATE kendaraan_222211 SET 222211_pembayaran = '$sts' WHERE 222211_kodecustomer = '$kode_customer'";
        mysqli_query($conn, $updatePembayaranQuery);
    }
    $sparepartNamesString = implode(', ', $sparepartNames);
    $query = "INSERT INTO transaksi_222211 (222211_kodetransaksi, 222211_kodecustomer, 222211_spareparts, 222211_hargajasa, 222211_total, 222211_jumlah, 222211_kembalian) 
              VALUES ('$kode_transaksi', '$kode_customer', '$sparepartNamesString', '$hargajasa', '$total', '$jumlah_uang', '$kembalian')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil Membayar!'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal Membayar!'); window.location.href='transaksi.php';</script>";
    }
} else {
    echo "<script>alert('Gagal Membayar!'); window.location.href='transaksi.php';</script>";
}
?>
