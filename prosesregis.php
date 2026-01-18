<?php
    include 'koneksi.php';

    if (isset($_POST['regis'])) {
        $nama = $_POST['uname'];
        $pass = $_POST['password'];

        $query =  mysqli_query($conn,"INSERT INTO admin_222211 (222211_username, 222211_password) 
                VALUES ('$nama', '$pass')");

        echo mysqli_error($conn);
            echo "<script>alert('Berhasil Buat Akun, Silahkan Login!'); window.location.href='Login.php';</script>";
        } else {
            echo "<script>alert('Gagal Buat Akun!'); window.location.href='mekanik.php';</script>";
    }
?>
