<?php

session_start();

if(!isset($_SESSION['username'])){

    header("Location: login.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Dashboard Admin</h2>

<hr>

<a href="produk.php"
class="btn btn-primary">

Data Produk

</a>

<a href="transaksi.php"
class="btn btn-success">

Transaksi

</a>

<a href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</body>
</html>