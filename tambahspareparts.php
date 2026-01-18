<?php
    include 'koneksi.php';

    if (isset($_POST['tambah'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $merk = $_POST['merk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        // Validate 'nama' and 'merk' - both must only contain letters
        $error = false;
        $errorMessage = '';

        // Check if 'nama' contains numbers
        if (preg_match("/[0-9]/", $nama)) {
            $error = true;
            $errorMessage .= 'Nama hanya bisa berupa huruf, bukan angka. ';
        }

        // Check if 'merk' contains numbers
        if (preg_match("/[0-9]/", $merk)) {
            $error = true;
            $errorMessage .= 'Merk hanya bisa berupa huruf, bukan angka. ';
        }

        // If there was any error with 'nama' or 'merk', show error message and stop the process
        if ($error) {
            echo "<script>alert('$errorMessage'); window.location.href='spareparts.php';</script>";
            exit();
        }

        // Validate 'harga' and 'stok' - must be numbers
        if (!is_numeric($harga)) {
            echo "<script>alert('Harga harus berupa angka!'); window.location.href='spareparts.php';</script>";
            exit();
        }

        if (!is_numeric($stok)) {
            echo "<script>alert('Stok harus berupa angka!'); window.location.href='spareparts.php';</script>";
            exit();
        }

        // SQL query to insert data
        $query = "INSERT INTO spareparts_222211 (222211_kodespareparts, 222211_namaspareparts, 222211_merkspareparts, 222211_hargaspareparts, 222211_stok) 
                VALUES ('$kode', '$nama', '$merk', '$harga', '$stok')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='spareparts.php';</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan!'); window.location.href='spareparts.php';</script>";
        }
    } else {
        header('Location: spareparts.php');
    }
?>
