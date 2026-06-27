<?php

include 'koneksi.php';

$data = mysqli_query($conn,"SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f6fa;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.table{
    border-radius:10px;
    overflow:hidden;
}

h2{
    font-weight:bold;
}

.btn{
    border-radius:10px;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="card p-4">

<div class="d-flex justify-content-between align-items-center mb-4">

<h2>📦 Data Produk</h2>

<div>

<a href="dashboard.php"
class="btn btn-dark">

🏠 Dashboard

</a>

<a href="transaksi.php"
class="btn btn-success">

💰 Transaksi

</a>

<a href="tambah_produk.php"
class="btn btn-primary">

➕ Tambah Produk

</a>

<a href="logout.php"
class="btn btn-danger">

🚪 Logout

</a>

</div>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover align-middle text-center">

<thead class="table-dark">

<tr>

<th>No</th>
<th>Kode Produk</th>
<th>Nama Produk</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no = 1;

while($d = mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['kode_produk']; ?></td>

<td><?= $d['nama_produk']; ?></td>

<td>
Rp <?= number_format($d['harga']); ?>
</td>

<td>

<span class="badge bg-primary p-2">

<?= $d['stok']; ?>

</span>

</td>

<td>

<a href="edit_produk.php?id=<?= $d['id_produk']; ?>"
class="btn btn-warning btn-sm">

✏ Edit

</a>

<a href="hapus_produk.php?id=<?= $d['id_produk']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus produk?')">

🗑 Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>