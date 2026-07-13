<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>

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
    background:linear-gradient(135deg,#0f172a,#111827,#1e293b);
    min-height:100vh;
    color:white;
}

.navbar{
    background:#1e293b;
    box-shadow:0 5px 20px rgba(0,0,0,.4);
}

.navbar-brand{
    color:#fff !important;
    font-weight:bold;
}

.username{
    color:#94a3b8;
}

.dashboard{
    margin-top:60px;
}

.title{
    text-align:center;
    margin-bottom:40px;
}

.title h2{
    font-weight:700;
}

.title p{
    color:#94a3b8;
}

.menu-card{
    background:#1e293b;
    border:1px solid #334155;
    border-radius:20px;
    padding:35px 20px;
    text-align:center;
    transition:.3s;
    height:100%;
    box-shadow:0 10px 25px rgba(0,0,0,.3);
}

.menu-card:hover{
    transform:translateY(-8px);
}

.menu-card i{
    font-size:55px;
    margin-bottom:20px;
}

.menu-card h4{
    margin-bottom:10px;
}

.menu-card p{
    color:#94a3b8;
    font-size:14px;
}

.btn-custom{
    width:100%;
    border-radius:10px;
    padding:10px;
    margin-top:15px;
    font-weight:600;
}

.produk{
    color:#38bdf8;
}

.transaksi{
    color:#22c55e;
}

.logout{
    color:#ef4444;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg">
<div class="container">

<span class="navbar-brand">
<i class="bi bi-shop"></i>
Sistem Kasir
</span>

<span class="username">
<i class="bi bi-person-circle"></i>
<?php echo $_SESSION['username']; ?>
</span>

</div>
</nav>

<div class="container dashboard">

<div class="title">

<h2>Dashboard Admin</h2>

<p>Selamat datang di Sistem Informasi Kasir</p>

</div>

<div class="row g-4">

<div class="col-md-4">

<div class="menu-card">

<i class="bi bi-box-seam produk"></i>

<h4>Data Produk</h4>

<p>Kelola data produk yang dijual.</p>

<a href="produk.php" class="btn btn-info btn-custom">
<i class="bi bi-arrow-right-circle"></i>
Masuk
</a>

</div>

</div>

<div class="col-md-4">

<div class="menu-card">

<i class="bi bi-cart-check transaksi"></i>

<h4>Transaksi</h4>

<p>Lakukan transaksi penjualan produk.</p>

<a href="transaksi.php" class="btn btn-success btn-custom">
<i class="bi bi-arrow-right-circle"></i>
Masuk
</a>

</div>

</div>

<div class="col-md-4">

<div class="menu-card">

<i class="bi bi-box-arrow-right logout"></i>

<h4>Logout</h4>

<p>Keluar dari sistem kasir dengan aman.</p>

<a href="logout.php" class="btn btn-danger btn-custom">
<i class="bi bi-door-open"></i>
Logout
</a>

</div>

</div>

</div>

</div>

</body>
</html>
