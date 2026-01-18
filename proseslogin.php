<?php
session_start();
include 'koneksi.php';

if(isset($_POST['masuk'])) {
    $username = $_POST['uname']; 
    $password = $_POST['password']; 

    $sql = "SELECT * FROM admin_222211 WHERE 222211_username='$username' AND 222211_password='$password'"; 
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) { 
        $_SESSION['username'] = $username; 
        $_SESSION['status'] = "login";
        header("Location: home.php"); 
    } else { 
        echo '<script>alert("Gagal Login, Salah Usernama Atau Password");window.location="login.php"</script>';
    } 
}
?>
