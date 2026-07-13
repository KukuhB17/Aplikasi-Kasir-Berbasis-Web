<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register Kasir</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f172a,#111827,#1e293b);
}

/* Card */
.register-card{
    width:100%;
    max-width:430px;
    background:#1e293b;
    border-radius:20px;
    border:1px solid #334155;
    box-shadow:0 20px 50px rgba(0,0,0,.55);
    overflow:hidden;
    color:white;
}

/* Header */
.register-header{
    text-align:center;
    padding:35px 20px 20px;
}

.register-header .icon{
    width:90px;
    height:90px;
    background:#16a34a;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    margin:auto;
    font-size:40px;
    color:white;
    box-shadow:0 10px 25px rgba(22,163,74,.4);
}

.register-header h2{
    margin-top:20px;
    font-weight:700;
}

.register-header p{
    color:#94a3b8;
    font-size:14px;
}

.card-body{
    padding:30px;
}

.form-label{
    color:#e2e8f0;
    font-weight:500;
}

.input-group-text{
    background:#0f172a;
    border:1px solid #334155;
    color:#22c55e;
}

.form-control{
    background:#0f172a;
    border:1px solid #334155;
    color:white;
    padding:12px;
}

.form-control::placeholder{
    color:#64748b;
}

.form-control:focus{
    background:#0f172a;
    color:white;
    border-color:#16a34a;
    box-shadow:0 0 10px rgba(22,163,74,.35);
}

.btn-register{
    background:#16a34a;
    border:none;
    color:white;
    font-weight:600;
    padding:12px;
    border-radius:10px;
    transition:.3s;
}

.btn-register:hover{
    background:#15803d;
    transform:translateY(-2px);
}

.card-footer{
    background:#18212f;
    border-top:1px solid #334155;
    text-align:center;
    color:#94a3b8;
    padding:20px;
}

.card-footer a{
    color:#22c55e;
    text-decoration:none;
    font-weight:600;
}

.card-footer a:hover{
    color:#4ade80;
}

.alert{
    border-radius:10px;
}

</style>

</head>

<body>

<div class="register-card">

<div class="register-header">

<div class="icon">
<i class="bi bi-person-plus-fill"></i>
</div>

<h2>REGISTER AKUN</h2>

<p>Buat akun baru untuk Sistem Kasir</p>

</div>

<div class="card-body">

<?php if(isset($_GET['error'])): ?>
<div class="alert alert-danger">

<?php

$error = $_GET['error'];

if($error == 'username_exists'){
    echo "Username sudah digunakan, pilih username lain.";
}
elseif($error == 'password_mismatch'){
    echo "Konfirmasi password tidak cocok.";
}
elseif($error == 'empty_field'){
    echo "Semua field harus diisi.";
}
elseif($error == 'db_error'){
    echo "Terjadi kesalahan pada database.";
}
else{
    echo "Terjadi kesalahan.";
}

?>

</div>
<?php endif; ?>

<?php if(isset($_GET['success'])): ?>
<div class="alert alert-success">
<i class="bi bi-check-circle-fill"></i>
Registrasi berhasil!
<a href="login.php" class="text-success fw-bold text-decoration-none">
Login sekarang
</a>
</div>
<?php endif; ?>

<form action="proses_register.php" method="POST">

<div class="mb-3">

<label class="form-label">Username</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-person-fill"></i>
</span>

<input
type="text"
name="username"
class="form-control"
placeholder="Masukkan Username"
required>

</div>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-lock-fill"></i>
</span>

<input
type="password"
name="password"
class="form-control"
placeholder="Masukkan Password"
required>

</div>

</div>

<div class="mb-4">

<label class="form-label">Konfirmasi Password</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-shield-lock-fill"></i>
</span>

<input
type="password"
name="konfirmasi_password"
class="form-control"
placeholder="Ulangi Password"
required>

</div>

</div>

<button
type="submit"
class="btn btn-register w-100">

<i class="bi bi-person-check-fill"></i>
Register

</button>

</form>

</div>

<div class="card-footer">

Sudah punya akun?
<a href="login.php">Login di sini</a>

</div>

</div>

</body>
</html>
