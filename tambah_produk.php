<?php

include 'koneksi.php';

if(isset($_POST['simpan'])){

    $kode  = $_POST['kode_produk'];
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    mysqli_query($conn,"INSERT INTO produk(
        kode_produk,
        nama_produk,
        harga,
        stok
    ) VALUES(
        '$kode',
        '$nama',
        '$harga',
        '$stok'
    )");

    header("Location: produk.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Tambah Produk</title>

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

.card-form{
    max-width:650px;
    margin:50px auto;
    background:#1e293b;
    border:1px solid #334155;
    border-radius:20px;
    box-shadow:0 20px 40px rgba(0,0,0,.45);
    overflow:hidden;
}

.card-header{
    background:#0f172a;
    color:white;
    text-align:center;
    padding:25px;
    border-bottom:1px solid #334155;
}

.card-header i{
    font-size:45px;
    color:#38bdf8;
}

.card-header h2{
    margin-top:10px;
    font-weight:bold;
}

.card-body{
    padding:30px;
}

label{
    color:#e2e8f0;
    margin-bottom:8px;
    font-weight:500;
}

.input-group-text{
    background:#0f172a;
    color:#38bdf8;
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
    border-color:#38bdf8;
    box-shadow:0 0 10px rgba(56,189,248,.35);
}

.btn-simpan{
    background:#2563eb;
    border:none;
    color:white;
    padding:12px;
    font-weight:bold;
    border-radius:10px;
    transition:.3s;
}

.btn-simpan:hover{
    background:#1d4ed8;
    transform:translateY(-2px);
}

.btn-kembali{
    background:#475569;
    color:white;
    border:none;
    padding:12px;
    font-weight:bold;
    border-radius:10px;
    transition:.3s;
}

.btn-kembali:hover{
    background:#334155;
    color:white;
}

</style>

</head>

<body>

<div class="container">

<div class="card-form">

<div class="card-header">

<i class="bi bi-box-seam-fill"></i>

<h2>Tambah Produk</h2>

<p class="text-secondary">Masukkan data produk baru</p>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Kode Produk</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-upc-scan"></i>
</span>

<input
type="text"
name="kode_produk"
class="form-control"
placeholder="Masukkan kode produk"
required>

</div>

</div>

<div class="mb-3">

<label>Nama Produk</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-box"></i>
</span>

<input
type="text"
name="nama_produk"
class="form-control"
placeholder="Masukkan nama produk"
required>

</div>

</div>

<div class="mb-3">

<label>Harga</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-cash-stack"></i>
</span>

<input
type="number"
name="harga"
class="form-control"
placeholder="Masukkan harga"
required>

</div>

</div>

<div class="mb-4">

<label>Stok</label>

<div class="input-group">

<span class="input-group-text">
<i class="bi bi-archive-fill"></i>
</span>

<input
type="number"
name="stok"
class="form-control"
placeholder="Masukkan stok"
required>

</div>

</div>

<div class="d-grid gap-2">

<button
type="submit"
name="simpan"
class="btn btn-simpan">

<i class="bi bi-check-circle-fill"></i>
Simpan Produk

</button>

<a href="produk.php" class="btn btn-kembali">

<i class="bi bi-arrow-left-circle-fill"></i>
Kembali

</a>

</div>

</form>

</div>

</div>

</div>

</body>
</html>
