<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Menggunakan hash untuk keamanan

// Mengecek apakah username sudah ada
$sql_check = "SELECT * FROM users WHERE username='$username'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "<script>alert('Username sudah ada, silakan gunakan username lain!');window.location.href='register.php';</script>";
} else {
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registrasi berhasil, silakan login!');window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
