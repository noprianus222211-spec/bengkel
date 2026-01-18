<?php
// setting_account.php

// Mulai session
session_start();

// Koneksi ke database
$host = "localhost"; // Ganti dengan host database Anda
$user = "root";      // Ganti dengan username database Anda
$pass = "";          // Ganti dengan password database Anda
$dbname = "bengkel_222211"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldUsername = $_POST['old_username'];
    $oldPassword = $_POST['old_password'];
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Validasi input tidak kosong
    if (empty($oldUsername) || empty($oldPassword) || empty($newUsername) || empty($newPassword)) {
        echo "Semua field harus diisi!";
        exit;
    }

    // Validasi username lama dan password lama
    $sql = "SELECT * FROM admin_222211 WHERE 222211_username = ? AND 222211_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $oldUsername, $oldPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username lama dan password cocok, update data
        $sqlUpdate = "UPDATE admin_222211 SET 222211_username = ?, 222211_password = ? WHERE 222211_username = ? AND 222211_password = ?";
        $stmtUpdate = $conn->prepare($sqlUpdate);
        $stmtUpdate->bind_param("ssss", $newUsername, $newPassword, $oldUsername, $oldPassword);

        if ($stmtUpdate->execute()) {
            // Set session dengan pesan sukses
            $_SESSION['message'] = "Akun berhasil diperbarui. Silakan login dengan username dan password baru.";

            // Arahkan ke halaman login
            header("Location: login.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat memperbarui akun!";
        }
    } else {
        // Username lama atau password lama tidak cocok
        echo "Username atau password lama salah!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting Akun</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 14px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            text-align: center;
        }
        .success-message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Setting Akun</h2>

    <!-- Menampilkan pesan error/sukses -->
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="success-message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php } ?>

    <!-- Form untuk update username dan password -->
    <form action="" method="POST">
        <label for="old_username">Username Lama</label>
        <input type="text" id="old_username" name="old_username" required>

        <label for="old_password">Password Lama</label>
        <input type="password" id="old_password" name="old_password" required>

        <label for="new_username">Username Baru</label>
        <input type="text" id="new_username" name="new_username" required>

        <label for="new_password">Password Baru</label>
        <input type="password" id="new_password" name="new_password" required>

        <button type="submit">Perbarui Akun</button>
    </form>
</div>

</body>
</html>
