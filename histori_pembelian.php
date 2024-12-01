<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="tambah_kelas.css">
    <title>Histori Pembelian</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Histori Pembelian</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                // Query to get transaction history
                $qry_histori = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY id_transaksi DESC");
                $no = 0;
                while ($data_histori = mysqli_fetch_array($qry_histori)) {
                    $no++;

                    // Display products purchased in the transaction
                    $produk_dibeli = "<ol>";
                    $qry_produk = mysqli_query($conn, "SELECT * FROM detail_transaksi JOIN produk ON produk.id_produk = detail_transaksi.id_produk WHERE id_transaksi = '" . $data_histori['id_transaksi'] . "'");

                    while ($data_produk = mysqli_fetch_array($qry_produk)) {
                        $produk_dibeli .= "<li>" . htmlspecialchars($data_produk['nama_produk']) . " - " . htmlspecialchars($data_produk['qty']) . " pcs</li>";
                    }
                    $produk_dibeli .= "</ol>";

                    // Display total price and status of the transaction
                    $total_harga = "Rp. " . number_format($data_histori['subtotal'], 0, ',', '.');
                    $status_pembelian = htmlspecialchars($data_histori['status']); // e.g., "Pending", "Completed"
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($data_histori['tgl_transaksi']) ?></td>
                        <td><?= $produk_dibeli ?></td>
                        <td><?= htmlspecialchars($data_histori['qty']) ?></td>
                        <td><?= $total_harga ?></td>
                        <td><?= $status_pembelian ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>