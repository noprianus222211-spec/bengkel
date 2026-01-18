<?php
    include 'koneksi.php';

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $kode = $_POST['kode'];
        $status = $_POST['status'];

        // Validate 'nama' - must only contain letters and spaces
        if (preg_match("/[^a-zA-Z\s]/", $nama)) {
            echo "<script>alert('Nama hanya bisa berupa huruf.'); window.location.href='mekanik.php';</script>";
            exit(); // Stop further execution if validation fails
        }

        // Proceed with the insertion if 'nama' is valid
        $query = mysqli_query($conn, "INSERT INTO mekanik_222211 (222211_kodemekanik, 222211_namamekanik, 222211_status) 
                VALUES ('$kode', '$nama', '$status')");

        // Check if query was successful
        if ($query) {
            echo "<script>alert('Data mekanik berhasil ditambahkan!'); window.location.href='mekanik.php';</script>";
        } else {
            echo "<script>alert('Data mekanik gagal ditambahkan!'); window.location.href='mekanik.php';</script>";
        }
    } else {
        echo "<script>alert('Request tidak valid!'); window.location.href='mekanik.php';</script>";
    }
?>
