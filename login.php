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

<title>Login Kasir</title>

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

.login-card{
    width:100%;
    max-width:420px;
    background:#1e293b;
    border-radius:20px;
    box-shadow:0 20px 50px rgba(0,0,0,.6);
    border:1px solid #334155;
    color:#fff;
    overflow:hidden;
}

.login-header{
    text-align:center;
    padding:35px 20px 20px;
}

.login-header .icon{
    width:90px;
    height:90px;
    border-radius:50%;
    background:#2563eb;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:40px;
    color:#fff;
    margin:auto;
    box-shadow:0 10px 30px rgba(37,99,235,.4);
}

.login-header h2{
    margin-top:20px;
    font-weight:700;
    color:#fff;
}

.login-header p{
    color:#94a3b8;
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
    color:#60a5fa;
    border:1px solid #334155;
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
    border-color:#2563eb;
    box-shadow:0 0 10px rgba(37,99,235,.4);
}

.btn-login{
    background:#2563eb;
    border:none;
    color:white;
    font-weight:600;
    padding:12px;
    border-radius:10px;
    transition:.3s;
}

.btn-login:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.card-footer{
    text-align:center;
    background:#18212f;
    border-top:1px solid #334155;
    color:#94a3b8;
    padding:20px;
}

.card-footer a{
    color:#60a5fa;
    text-decoration:none;
    font-weight:600;
}

.card-footer a:hover{
    color:#93c5fd;
}

.alert{
    border-radius:10px;
}

</style>
</head>

<body>

<div class="login-card">

<div class="login-header">

<div class="icon">
<i class="bi bi-shop"></i>
</div>

<h2>LOGIN KASIR</h2>

<p>Silakan login untuk masuk ke sistem kasir</p>

</div>

<div class="card-body">

<?php if(isset($_GET['error']) && $_GET['error']=='login_gagal'): ?>
<div class="alert alert-danger">
<i class="bi bi-exclamation-circle-fill"></i>
Username atau Password salah!
</div>
<?php endif; ?>

<form action="proses_login.php" method="POST">

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

<div class="mb-4">

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

<button type="submit" class="btn btn-login text-white w-100">
<i class="bi bi-box-arrow-in-right"></i>
Login
</button>

</form>

</div>

<div class="card-footer">

Belum punya akun?
<a href="register.php">Daftar Sekarang</a>

</div>

</div>

</body>
</html>
