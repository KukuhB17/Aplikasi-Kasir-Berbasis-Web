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
}

.container{
    margin-top:40px;
}

.card{
    background:#1e293b;
    border:1px solid #334155;
    border-radius:20px;
    box-shadow:0 20px 40px rgba(0,0,0,.4);
    color:white;
}

.card-header{
    background:#0f172a;
    border-bottom:1px solid #334155;
    padding:20px 30px;
}

.card-header h2{
    margin:0;
    font-weight:700;
    color:white;
}

.card-body{
    padding:30px;
}

.table{
    color:white;
    margin-bottom:0;
}

.table thead{
    background:#0f172a;
}

.table thead th{
    color:#38bdf8;
    border-color:#334155;
    text-align:center;
}

.table td{
    border-color:#334155;
    vertical-align:middle;
    text-align:center;
}

.table tbody tr:hover{
    background:#293548;
}

.badge{
    font-size:14px;
    padding:8px 12px;
}

.btn{
    border-radius:10px;
    font-weight:600;
    transition:.3s;
}

.btn:hover{
    transform:translateY(-2px);
}

.btn-dark{
    background:#475569;
    border:none;
}

.btn-dark:hover{
    background:#334155;
}

.btn-primary{
    background:#2563eb;
    border:none;
}

.btn-primary:hover{
    background:#1d4ed8;
}

.btn-success{
    background:#16a34a;
    border:none;
}

.btn-success:hover{
    background:#15803d;
}

.btn-warning{
    border:none;
    color:white;
}

.btn-danger{
    border:none;
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<div class="card-header d-flex justify-content-between align-items-center flex-wrap">

<h2>
<i class="bi bi-box-seam-fill text-info"></i>
Data Produk
</h2>

<div class="mt-2">

<a href="dashboard.php" class="btn btn-dark">
<i class="bi bi-house-door-fill"></i>
Dashboard
</a>

<a href="transaksi.php" class="btn btn-success">
<i class="bi bi-cart-check-fill"></i>
Transaksi
</a>

<a href="tambah_produk.php" class="btn btn-primary">
<i class="bi bi-plus-circle-fill"></i>
Tambah Produk
</a>

<a href="logout.php" class="btn btn-danger">
<i class="bi bi-box-arrow-right"></i>
Logout
</a>

</div>

</div>

<div class="card-body">

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

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
Rp <?= number_format($d['harga'],0,',','.'); ?>
</td>

<td>

<span class="badge bg-info">

<?= $d['stok']; ?>

</span>

</td>

<td>

<a href="edit_produk.php?id=<?= $d['id_produk']; ?>" class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

Edit

</a>

<a href="hapus_produk.php?id=<?= $d['id_produk']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus produk ini?')">

<i class="bi bi-trash-fill"></i>

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</body>
</html>
