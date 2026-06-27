<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>

<title>Register Kasir</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">

<h3>REGISTER AKUN</h3>

</div>

<div class="card-body">

<?php if(isset($_GET['error'])): ?>
<div class="alert alert-danger">
<?php
$error = $_GET['error'];
if($error == 'username_exists') echo 'Username sudah digunakan, pilih username lain.';
elseif($error == 'password_mismatch') echo 'Konfirmasi password tidak cocok.';
elseif($error == 'empty_field') echo 'Semua field harus diisi.';
elseif($error == 'db_error') echo 'Terjadi kesalahan pada database. Coba lagi.';
else echo 'Terjadi kesalahan. Silakan coba lagi.';
?>
</div>
<?php endif; ?>

<?php if(isset($_GET['success'])): ?>
<div class="alert alert-success">
Registrasi berhasil! Silakan <a href="login.php">login</a>.
</div>
<?php endif; ?>

<form action="proses_register.php" method="POST">

<div class="mb-3">

<label>Username</label>

<input type="text"
name="username"
class="form-control"
placeholder="Masukkan username"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control"
placeholder="Masukkan password"
required>

</div>

<div class="mb-3">

<label>Konfirmasi Password</label>

<input type="password"
name="konfirmasi_password"
class="form-control"
placeholder="Ulangi password"
required>

</div>

<button type="submit"
class="btn btn-success w-100">

Register

</button>

</form>

</div>

<div class="card-footer text-center">

<small>Sudah punya akun? <a href="login.php">Login di sini</a></small>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
