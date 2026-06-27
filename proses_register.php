<?php

include "koneksi.php";

// Ambil dan bersihkan input
$username = trim($_POST['username']);
$password = $_POST['password'];
$konfirmasi = $_POST['konfirmasi_password'];

// Validasi field tidak kosong
if(empty($username) || empty($password) || empty($konfirmasi)){
    header("Location: register.php?error=empty_field");
    exit;
}

// Validasi password cocok
if($password !== $konfirmasi){
    header("Location: register.php?error=password_mismatch");
    exit;
}

// Cek apakah username sudah ada
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn, $username)."'");

if(mysqli_num_rows($cek) > 0){
    header("Location: register.php?error=username_exists");
    exit;
}

// Hash password dengan MD5 (sama dengan sistem login yang sudah ada)
$password_hash = md5($password);

// Simpan ke database
$username_aman = mysqli_real_escape_string($conn, $username);
$insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username_aman', '$password_hash')");

if($insert){
    header("Location: register.php?success=1");
}else{
    header("Location: register.php?error=db_error");
}

exit;
?>
