
<?php

include 'koneksi.php';

if(isset($_POST['simpan'])){

$kode = $_POST['kode_produk'];

$nama = $_POST['nama_produk'];

$harga = $_POST['harga'];

$stok = $_POST['stok'];

mysqli_query($conn,

"INSERT INTO produk(

kode_produk,
nama_produk,
harga,
stok

)

VALUES(

'$kode',
'$nama',
'$harga',
'$stok'

)");

header("Location: produk.php");

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Produk</h2>

<form method="POST">

<div class="mb-3">

<label>Kode Produk</label>

<input type="text"
name="kode_produk"
class="form-control">

</div>

<div class="mb-3">

<label>Nama Produk</label>

<input type="text"
name="nama_produk"
class="form-control">

</div>

<div class="mb-3">

<label>Harga</label>

<input type="number"
name="harga"
class="form-control">

</div>

<div class="mb-3">

<label>Stok</label>

<input type="number"
name="stok"
class="form-control">

</div>

<button type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

</form>

</div>

</body>
</html>