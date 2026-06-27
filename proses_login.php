<?php
session_start();

include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='".mysqli_real_escape_string($conn, $username)."' AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){

    $_SESSION['username'] = $username;

    header("Location: dashboard.php");

}else{

    header("Location: login.php?error=login_gagal");

}

exit;
?>
