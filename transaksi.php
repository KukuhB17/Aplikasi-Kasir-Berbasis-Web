<!-- transaksi.php -->
<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
        }

        .container {
            margin-top: 40px;
        }

        .table {
            background: white;
        }

        h1 {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">

    <h1 class="mb-3">Data Transaksi</h1>

    <a href="tambah_transaksi.php" class="btn btn-primary mb-3">
        + Tambah Transaksi
    </a>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Diskon</th>
                <th>Total Bayar</th>
                <th>Uang Bayar</th>
                <th>Kembalian</th>
                <th width="120">Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;

        // Memastikan nama variabel koneksi database benar ($conn)
        $query = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");

        while($data = mysqli_fetch_array($query)){
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['tanggal']; ?></td>
                <td>Rp <?= number_format($data['total'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($data['diskon'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($data['total_bayar'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($data['uang_bayar'], 0, ',', '.'); ?></td>
                <td>Rp <?= number_format($data['kembalian'], 0, ',', '.'); ?></td>
                <td>
                    <!-- Tombol Hapus menuju hapus_transaksi.php -->
                    <a href="hapus_transaksi.php?id=<?= $data['id_transaksi']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                        Hapus
                    </a>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>

</body>
</html>