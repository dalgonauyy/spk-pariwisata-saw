<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Password salah!');window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!');window.location.href='index.php';</script>";
}

$conn->close();
