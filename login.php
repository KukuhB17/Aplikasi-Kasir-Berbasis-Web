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

<title>Login Kasir</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card shadow">

<div class="card-header text-center">

<h3>LOGIN KASIR</h3>

</div>

<div class="card-body">

<?php if(isset($_GET['error']) && $_GET['error'] == 'login_gagal'): ?>
<div class="alert alert-danger">
Username atau password salah.
</div>
<?php endif; ?>

<form action="proses_login.php" method="POST">

<div class="mb-3">

<label>Username</label>

<input type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

</div>

<button type="submit"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

<div class="card-footer text-center">

<small>Belum punya akun? <a href="register.php">Daftar di sini</a></small>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
