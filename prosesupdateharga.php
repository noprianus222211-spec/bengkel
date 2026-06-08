<?php
include 'koneksi.php';
function rupiah($angka) {
    return 'Rp ' . number_format((float)$angka, 0, ',', '.');
}

if (isset($_POST['update_harga'])) {
    $kode_customer = $_POST['kode_customer'];
    $hargajasa = $_POST['hargajasa'];
    $total = $_POST['total'];
    $estimasi = $_POST['estimasi'];
    // var_dump($kode_customer, $hargajasa, $total, $estimasi);
    $updateHarga = "UPDATE transaksi_222211 SET 222211_hargajasa = $hargajasa, 222211_total = $total WHERE 222211_kodecustomer = '$kode_customer'";

    
    if (mysqli_query($conn, $updateHarga)) {
        $data = mysqli_query($conn, "SELECT * FROM customer_222211 WHERE 222211_kodecustomer = '$kode_customer' LIMIT 1"); 
        $customer = mysqli_fetch_assoc($data);
        $nama = $customer['222211_nama'];
        $notlp = $customer['222211_notlp'];
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => '082292677514',
        'message' => "Hi ".$nama.", estimasi perbaikan kendaraanmu:\n\n• Harga Jasa Pengerjaan: ".rupiah($hargajasa)."\n\n"."Total: ".rupiah($total)."\n\n"."Waktu pengerjaan: ".$estimasi." Menit"."\n\n" .
        "Terima kasih", 
        'countryCode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$token
        ),
        ));

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        }
        curl_close($curl);

        echo "<script>alert('Berhasil Update Harga!'); window.location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('Gagal Update Harga!'); window.location.href='transaksi.php';</script>";
    }
} else {
    echo "<script>alert('Gagal Update Harga!'); window.location.href='transaksi.php';</script>";
}
?>
