<?php
include 'koneksi.php';

if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_akhir'])) {
    $tanggal_mulai = $_GET['tanggal_mulai'];
    $tanggal_akhir = $_GET['tanggal_akhir'];
    
    $query = "SELECT
customer_222211.222211_nama AS 222211_nama,
customer_222211.222211_notlp AS 222211_notlp,
kendaraan_222211.222211_plat AS 222211_plat,
kendaraan_222211.222211_jenis AS 222211_jenis,
kendaraan_222211.222211_merk AS 222211_merk,
kendaraan_222211.222211_tgl AS 222211_tgl,
kendaraan_222211.222211_kerusakan AS 222211_kerusakan,
customer_222211.222211_kodecustomer AS 222211_kodecustomer,
kendaraan_222211.222211_pembayaran AS 222211_pembayaran,
transaksi_222211.222211_kodetransaksi,
transaksi_222211.222211_total,
transaksi_222211.222211_jumlah,
transaksi_222211.222211_hargajasa,
transaksi_222211.222211_spareparts,
transaksi_222211.222211_kembalian
FROM
(customer_222211
JOIN kendaraan_222211 ON (customer_222211.222211_kodecustomer = kendaraan_222211.222211_kodecustomer))
INNER JOIN transaksi_222211 ON customer_222211.222211_kodecustomer = transaksi_222211.222211_kodecustomer 
WHERE 222211_tgl BETWEEN '$tanggal_mulai' AND '$tanggal_akhir' AND 222211_pembayaran = 'Berhasil'";
    $result = mysqli_query($conn, $query);
} else {
    echo "Tanggal tidak valid!";
    exit;
}

// Inisialisasi total keseluruhan
$total_harga_jasa = 0;
$total_total = 0;
$total_jumlah = 0;
$total_kembalian = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .btn {
                display: none;
            }
        }
        .kop-surat {
            background-color:rgb(29, 94, 165); /* Warna latar belakang biru */
            color: white; /* Warna teks putih */
            padding: 15px;
            border-radius: 5px;
        }
        .table thead th {
            background-color:rgb(29, 94, 165); /* Warna biru untuk header tabel */
            color: white; /* Warna teks putih untuk header tabel */
        }
        .table tfoot th {
            background-color:rgb(29, 94, 165); /* Warna biru untuk baris Total Keseluruhan */
            color: white; /* Warna teks putih untuk Total Keseluruhan */
        }
    </style>
</head>
<body onload="window.print()">
<div class="container mt-4">
    <div class="kop-surat text-center mb-4">
        <h4 class="mb-2">Laporan Transaksi 29Garage</h4>
        <p>Jalan Poros Toraja-Makassar, Mengkendek KM9, Sulawesi Selatan</p>
        <p>noprianuskalalembang@gmail.com</p>
        <p> Telp. 082292677514</p>
    </div>
    <p class="text-center"><strong>Periode:</strong> <?php echo htmlspecialchars($tanggal_mulai); ?> - <?php echo htmlspecialchars($tanggal_akhir); ?></p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Kode Transaksi</th>
                <th class="text-center">Tgl</th>
                <th class="text-center">Spareparts</th>
                <th class="text-center">Harga Jasa</th>
                <th class="text-center">Total</th>
                <th class="text-center">Tunai</th>
                <th class="text-center">Kembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_array($result)) { 
                    $total_harga_jasa += $row['222211_hargajasa'];
                    $total_total += $row['222211_total'];
                    $total_jumlah += $row['222211_jumlah'];
                    $total_kembalian += $row['222211_kembalian'];
                ?>
                    <tr>
                        <td class="text-center"><?php echo $row['222211_kodetransaksi']; ?></td>
                        <td class="text-center"><?php echo $row['222211_tgl']; ?></td>
                        <td class="text-center"><?php echo $row['222211_spareparts']; ?></td>
                        <td class="text-center">Rp. <?php echo number_format($row['222211_hargajasa']); ?></td>
                        <td class="text-center">Rp. <?php echo number_format($row['222211_total']); ?></td>
                        <td class="text-center">Rp. <?php echo number_format($row['222211_jumlah']); ?></td>
                        <td class="text-center">Rp. <?php echo number_format($row['222211_kembalian']); ?></td>
                    </tr>
                <?php } ?>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-center">Total Keseluruhan</th>
                        <th class="text-center">Rp. <?php echo number_format($total_harga_jasa); ?></th>
                        <th class="text-center">Rp. <?php echo number_format($total_total); ?></th>
                        <th class="text-center">Rp. <?php echo number_format($total_jumlah); ?></th>
                        <th class="text-center">Rp. <?php echo number_format($total_kembalian); ?></th>
                    </tr>
                </tfoot>
            <?php } else { ?>
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data transaksi untuk periode ini.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Tempat Tanda Tangan -->
    <div class="row mt-5">
        <div class="col-6 text-start">
            <p><strong>Tanggal Cetak:</strong> <?php echo date('d-m-Y'); ?></p>
        </div>
        <div class="col-6 text-end">
            <p>Hormat Kami,</p>
            <br><br><br>
            <p><strong>(29Garage)</strong></p>
        </div>
    </div>
</div>
</body>
</html>
