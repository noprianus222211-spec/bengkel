<?php
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

        $query = mysqli_query($conn, "INSERT INTO kendaraan_222211 (222211_kodecustomer, 222211_plat, 222211_jenis, 222211_merk, 222211_tgl, 222211_kerusakan, 222211_status) 
                VALUES ('$kode', '$plat', '$jenis', '$merk', '$tanggal_service', '$kerusakan', '$status')");

        // Check if both queries succeeded
        if ($tambah && $query) {
            echo "<script>alert('Data customer berhasil ditambahkan!'); window.location.href='customer.php';</script>";
        } else {
            echo "<script>alert('Data customer gagal ditambahkan!'); window.location.href='customer.php';</script>";
        }
    } else {
        echo "<script>alert('Request tidak valid!'); window.location.href='customer.php';</script>";
    }
?>
