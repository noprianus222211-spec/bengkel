<?php
    include 'index.php';
    include 'koneksi.php';

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $notlp = $_POST['notlp'];
        $kode = $_POST['kode'];
        $plat = $_POST['plat'];
        $jenis = $_POST['jenis'];
        $merk = $_POST['merk'];
        $tanggal_service = $_POST['tanggal_service'];
        $kerusakan = $_POST['kerusakan'];
        $hargajasa = $_POST['hargajasa'];
        $status = "Proses";

        // Initialize error message variable
        $errorMessage = '';

        // Validate 'nama' - must only contain letters
        if (preg_match("/[^a-zA-Z\s]/", $nama)) {
            $errorMessage .= 'Nama hanya bisa berupa huruf. ';
        }

        // Validate 'merk' - must only contain letters
        if (preg_match("/[^a-zA-Z\s]/", $merk)) {
            $errorMessage .= 'Merk hanya bisa berupa huruf. ';
        }

        // Validate 'notlp' - must only contain numbers
        if (!is_numeric($notlp)) {
            $errorMessage .= 'Nomor telepon hanya bisa berupa angka. ';
        }
        if (!is_numeric($notlp)) {
            $errorMessage .= 'Nomor telepon hanya bisa berupa angka. ';
        } elseif (strlen($notlp) < 12) {
            $errorMessage .= 'Nomor telepon harus memiliki minimal 12 angka. ';
        }

        if ($errorMessage != '') {
            echo "<script>
                alert('$errorMessage');
                window.location.href = 'javascript:history.back()';
            </script>";
            exit(); // Prevent further processing if validation fails
        }

        
        // If validation passes, proceed with the database insertion
        $tambah = mysqli_query($conn, "INSERT INTO customer_222211 (222211_kodecustomer, 222211_nama, 222211_notlp) 
                VALUES ('$kode', '$nama', '$notlp')");

        // create the transaction

        $spareparts = isset($_POST['spareparts']) ? $_POST['spareparts'] : [];
        $sparepartNames = [];
        $textDetail = '';
        $textTotal = 0;
        foreach ($spareparts as $kode_sparepart) {
            $sparepartQuery = "SELECT 222211_namaspareparts, 222211_hargaspareparts  FROM spareparts_222211 WHERE 222211_kodespareparts = '$kode_sparepart'";
            $result = mysqli_query($conn, $sparepartQuery);
            if ($row = mysqli_fetch_assoc($result)) {
                $sparepartNames[] = $row['222211_namaspareparts'];
                $textDetail .= "• ". $row['222211_namaspareparts'] ." - ".rupiah($row['222211_hargaspareparts'])."\n";
                $textTotal += $row['222211_hargaspareparts'];
            }
            $updateStokQuery = "UPDATE spareparts_222211 SET 222211_stok = 222211_stok - 1 WHERE 222211_kodespareparts = '$kode_sparepart'";
            mysqli_query($conn, $updateStokQuery);

            $updatePembayaranQuery = "UPDATE kendaraan_222211 SET 222211_pembayaran = 'Belum Bayar' WHERE 222211_kodecustomer = '$kode'";
            mysqli_query($conn, $updatePembayaranQuery);
        }
        $sparepartNamesString = implode(', ', $sparepartNames);

        $querytrx = "SELECT max(222211_kodetransaksi) as maxkode FROM transaksi_222211";
        $hasiltrx = mysqli_query($conn, $querytrx);
        $datatrx = mysqli_fetch_array($hasiltrx);
        $kodetrx = $datatrx['maxkode'];
        $nourut = (int) substr($kodetrx, 4, 3);
        $nourut++;
        $char = "TRNS";
        $kodetrx = $char . sprintf("%03s", $nourut);
        $textTotal += $hargajasa;
        $add_transaction = mysqli_query($conn, "INSERT INTO transaksi_222211 (222211_kodetransaksi, 222211_kodecustomer, 222211_spareparts, 222211_hargajasa, 222211_total) 
            VALUES ('$kodetrx', '$kode', '$sparepartNamesString', '$hargajasa', '$textDetail')");
        // 

        $query = mysqli_query($conn, "INSERT INTO kendaraan_222211 (222211_kodecustomer, 222211_plat, 222211_jenis, 222211_merk, 222211_tgl, 222211_kerusakan, 222211_status) 
                VALUES ('$kode', '$plat', '$jenis', '$merk', '$tanggal_service', '$kerusakan', '$status')");


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
        'target' => $notlp,
        'message' => "Hi ".$nama.", estimasi perbaikan kendaraanmu:\n".$textDetail."• Harga Jasa Pengerjaan: ".rupiah($hargajasa)."\n"."Total: ".rupiah($textTotal)."\n\n" .
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

        // if (isset($error_msg)) {
        // echo $error_msg;
        // }
        // echo $response;
        // 

        // Check if both queries succeeded
        if ($tambah && $query) {
            echo "<script>alert('Data customer berhasil ditambahkan!'); window.location.href='customer.php';</script>";
        } else {
            echo "<script>alert('Data customer gagal ditambahkan!'); window.location.href='customer.php';</script>";
        }

        //
    } else {
        echo "<script>alert('Request tidak valid!'); window.location.href='customer.php';</script>";
    }
?>
