<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM produk WHERE id_produk='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $kode = $_POST['kode_produk'];
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn,

    "UPDATE produk SET

    kode_produk='$kode',
    nama_produk='$nama',
    harga='$harga',
    stok='$stok'

    WHERE id_produk='$id'"

    );

    header("Location: produk.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Produk</h2>

<div class="mb-3">

<a href="dashboard.php"
class="btn btn-dark">

🏠 Dashboard

</a>

<a href="produk.php"
class="btn btn-secondary">

📦 Data Produk

</a>

<a href="logout.php"
class="btn btn-danger">

🚪 Logout

</a>

</div>

<form method="POST">

<div class="mb-3">

<label>Kode Produk</label>

<input type="text"
name="kode_produk"
class="form-control"
value="<?= $d['kode_produk']; ?>"
required>

</div>

<div class="mb-3">

<label>Nama Produk</label>

<input type="text"
name="nama_produk"
class="form-control"
value="<?= $d['nama_produk']; ?>"
required>

</div>

<div class="mb-3">

<label>Harga</label>

<input type="number"
name="harga"
class="form-control"
value="<?= $d['harga']; ?>"
required>

</div>

<div class="mb-3">

<label>Stok</label>

<input type="number"
name="stok"
class="form-control"
value="<?= $d['stok']; ?>"
required>

</div>

<button type="submit"
name="update"
class="btn btn-success">

💾 Update

</button>

<a href="produk.php"
class="btn btn-warning">

← Kembali

</a>

</form>

</div>

</body>
</html>