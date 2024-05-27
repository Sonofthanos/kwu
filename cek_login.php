<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];


$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['level'] = $data['level'];
    $_SESSION['file_path'] = $data['file_path'];

    if ($data['level'] == "admin") {
        header("location:halaman_admin.php");
    } else {
        header("location:halaman_user.php");
    }
} else {
    header("location:index.php?pesan=gagal");
}
