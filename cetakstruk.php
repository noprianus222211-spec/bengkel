<?php 
include 'koneksi.php';

$kode_transaksi = $_GET['kode'];

$query = mysqli_query($conn, "SELECT * FROM transaksi_222211 WHERE 222211_kodecustomer = '$kode_transaksi'");
$transaksi = mysqli_fetch_array($query);

$sparepartsQuery = mysqli_query($conn, "SELECT s.222211_namaspareparts, ts.222211_spareparts 
                                        FROM transaksi_222211 ts 
                                        JOIN spareparts_222211 s ON FIND_IN_SET(s.222211_namaspareparts, ts.222211_spareparts) 
                                        WHERE ts.222211_kodecustomer = '$kode_transaksi'");

$sparepartsList = [];
while ($sparepart = mysqli_fetch_array($sparepartsQuery)) {
    $sparepartsList[] = $sparepart['222211_spareparts'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>STRUK</title>
    <style type="text/css">
        .kotak-struk {
            width: 380px;
            font-size: 15px;
            font-family: Courier New;
        }
        .kotak-struk .head p {
            text-align: center;
            font-size: 17px;
            margin: 0;
        }
        .kotak-struk .logo {
            font-weight: bold;
        }
        .kotak-struk .tabel1 {
            margin: 0px 30px;
            width: 100%;
        }
        .kotak-struk .tabel1 tr td {
            line-height: 25px;
        }
        .kotak-struk .foot {
            text-align: center;
            margin: 0px 40px;
            margin-top: 10px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="kotak-struk">
        <div class="head">
            <p class="logo">Struk Transaksi 29Garage</p>
        </div>
        <div class="isi">
            <table class="tabel1">
                <tr>
                    <td>Kode Transaksi</td>
                    <td><?php echo $transaksi['222211_kodetransaksi']; ?></td>
                </tr>
                <tr>
                    <td>Kode Customer</td>
                    <td><?php echo $transaksi['222211_kodecustomer']; ?></td>
                </tr>
                <tr>
                    <td>Spareparts</td>
                    <td>
                        <?php 
                        if (!empty($sparepartsList)) {
                            echo "<ul>";
                            foreach ($sparepartsList as $sparepart) {
                                echo "<li>$sparepart</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo 'Tidak ada spareparts';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Harga Jasa</td>
                    <td><?php echo $transaksi['222211_hargajasa']; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Uang</td>
                    <td><?php echo $transaksi['222211_jumlah']; ?></td>
                </tr>
                <tr>
                    <td colspan="2">=============================</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo $transaksi['222211_total']; ?></td>
                </tr>
                <tr>
                    <td>Kembalian</td>
                    <td><?php echo $transaksi['222211_kembalian']; ?></td>
                </tr>
            </table>
        </div>
        <div class="foot">
            <p>Terima kasih!</p>
        </div>
    </div>
</body>
</html>
