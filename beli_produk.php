<?php
include "header.php";
include "koneksi.php";

// Fetch product details based on the provided ID
$qry_detail_produk = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '" . $_GET['id_produk'] . "'");
$data_produk = mysqli_fetch_array($qry_detail_produk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/beliproduk.css">
    <title>Product Detail - <?= htmlspecialchars($data_produk['nama_produk']) ?></title>
</head>

<body>

    <div class="container">
        <div class="image-section">
            <img src="<?= $data_produk['foto_produk'] ?>" class="img-fluid rounded"
                alt="Cover of <?= htmlspecialchars($data_produk['nama_produk']) ?>"
                style="height: 260px; width: 260px; border-radius: 10px; margin-bottom: 20px;">
            <div class="gallery">
                <!-- You can add additional images here if needed -->
                <img src="img/tangzu.png" alt="Shanling UA1 Plus">
                <img src="img/tangzu2.png" alt="Shanling UA1 Plus Back">
                <img src="img/tangzu3.png" alt="Shanling UA1 Plus Closeup">
            </div>
        </div>
        <div class="product-info">
            <h1><?= htmlspecialchars($data_produk['nama_produk']) ?></h1>
            <p class="price">Rp<?= number_format($data_produk['harga'], 0, ',', '.') ?></p>
            <hr>
            <br><br>
            <p class="description">
            <h3>Deskripsi</h3>
            <?= htmlspecialchars($data_produk['deskripsi']) ?>
            </p>
            <form action="masukkan_keranjang.php?id_produk=<?= $data_produk['id_produk'] ?>" method="post">
                <div class="mb-3">
                    <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                    <input type="number" name="jumlah_beli" id="jumlah_Beli" value="1" min="1" class="form-control">
                </div>
                <button class="btn btn-success" type="submit">Masukkan Keranjang</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>