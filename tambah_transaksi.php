<?php

session_start();

include 'koneksi.php';

if(!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang'] = [];
}

if(isset($_POST['tambah'])){

    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];

    $ambil = mysqli_query($conn,
    "SELECT * FROM produk WHERE id_produk='$id_produk'");

    $p = mysqli_fetch_array($ambil);

    $subtotal = $p['harga'] * $jumlah;

    $_SESSION['keranjang'][] = [

        'id_produk' => $p['id_produk'],
        'nama_produk' => $p['nama_produk'],
        'harga' => $p['harga'],
        'jumlah' => $jumlah,
        'subtotal' => $subtotal

    ];

}

if(isset($_POST['simpan'])){

    $total = 0;

    foreach($_SESSION['keranjang'] as $k){

        $total += $k['subtotal'];

    }

    $diskon = 0;

    if($total > 500000){

        $diskon = $total * 0.1;

    }

    $total_bayar = $total - $diskon;

    $uang_bayar = $_POST['uang_bayar'];

    $kembalian = $uang_bayar - $total_bayar;

    mysqli_query($conn,

    "INSERT INTO transaksi(

    tanggal,
    total,
    diskon,
    total_bayar,
    uang_bayar,
    kembalian

    )

    VALUES(

    CURDATE(),
    '$total',
    '$diskon',
    '$total_bayar',
    '$uang_bayar',
    '$kembalian'

    )"

    );

    $id_transaksi = mysqli_insert_id($conn);

    foreach($_SESSION['keranjang'] as $k){

        mysqli_query($conn,

        "INSERT INTO detail_transaksi(

        id_transaksi,
        id_produk,
        harga,
        jumlah,
        subtotal

        )

        VALUES(

        '$id_transaksi',
        '{$k['id_produk']}',
        '{$k['harga']}',
        '{$k['jumlah']}',
        '{$k['subtotal']}'

        )"

        );

        mysqli_query($conn,

        "UPDATE produk
        SET stok = stok - {$k['jumlah']}
        WHERE id_produk='{$k['id_produk']}'"

        );

    }

    unset($_SESSION['keranjang']);

    header("Location: transaksi.php");

}

$produk = mysqli_query($conn,
"SELECT * FROM produk");

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Transaksi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Transaksi</h2>

<div class="mb-3">

<a href="dashboard.php"
class="btn btn-dark">

🏠 Dashboard

</a>

<a href="produk.php"
class="btn btn-primary">

📦 Produk

</a>

<a href="transaksi.php"
class="btn btn-success">

📋 Transaksi

</a>

</div>

<form method="POST">

<div class="row">

<div class="col-md-5">

<select name="id_produk"
class="form-control"
required>

<option value="">-- Pilih Produk --</option>

<?php while($p = mysqli_fetch_array($produk)){ ?>

<option value="<?= $p['id_produk']; ?>">

<?= $p['nama_produk']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="col-md-3">

<input type="number"
name="jumlah"
class="form-control"
placeholder="Jumlah"
required>

</div>

<div class="col-md-2">

<button type="submit"
name="tambah"
class="btn btn-primary">

Tambah

</button>

</div>

</div>

</form>

<br>

<table class="table table-bordered">

<tr class="table-dark">

<th>Produk</th>
<th>Harga</th>
<th>Jumlah</th>
<th>Subtotal</th>

</tr>

<?php

$total = 0;

if(!empty($_SESSION['keranjang'])){

foreach($_SESSION['keranjang'] as $k){

$total += $k['subtotal'];

?>

<tr>

<td><?= $k['nama_produk']; ?></td>

<td>Rp <?= number_format($k['harga']); ?></td>

<td><?= $k['jumlah']; ?></td>

<td>Rp <?= number_format($k['subtotal']); ?></td>

</tr>

<?php }} ?>

</table>

<?php

$diskon = 0;

if($total > 500000){

$diskon = $total * 0.1;

}

$total_bayar = $total - $diskon;

?>

<h4>Total : Rp <?= number_format($total); ?></h4>

<h4>Diskon : Rp <?= number_format($diskon); ?></h4>

<h4>Total Bayar : Rp <?= number_format($total_bayar); ?></h4>

<form method="POST">

<div class="mb-3">

<label>Uang Bayar</label>

<input type="number"
name="uang_bayar"
class="form-control"
required>

</div>

<button type="submit"
name="simpan"
class="btn btn-success">

💾 Simpan Transaksi

</button>

</form>

</div>

</body>
</html>