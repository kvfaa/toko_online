<?php
include "header.php";
?>

<link rel="stylesheet" href="CSS/product.css">
<h2>Daftar Produk</h2>

<div class="container d-flex flex-column justify-content-center align-items-center rounded-lg"
    style="min-height: 20vh; padding-left: 25px;">
</div>

<div class="containerbanner d-flex justify-content-center mb-4">
    <img src="img/banner.png" alt="banner" style="border-radius: 20px; width: 1280px;">
</div>

<div class="container d-flex justify-content-center mb-4">
    <div class="row w-100 d-flex justify-content-center">
        <div>
            <div class="kategori-section p-3 text-center">
                <h5>Kategori Pilihan</h5>
                <div class="row kategori-icons mt-4">
                    <div class="col-12 d-flex justify-content-around flex-wrap">
                        <button class="btn btn-outline-secondary">Kategori</button>
                        <button class="btn btn-outline-secondary">Handphone & Tablet</button>
                        <button class="btn btn-outline-secondary">Top-Up & Tagihan</button>
                        <button class="btn btn-outline-secondary">Elektronik</button>
                        <button class="btn btn-outline-secondary">Perawatan Hewan</button>
                        <button class="btn btn-outline-secondary">Travel & Entertainment</button>
                        <button class="btn btn-outline-secondary">Keuangan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
        include "koneksi.php";
        $qry_produk = mysqli_query($conn, "SELECT * FROM produk");
        while ($data_produk = mysqli_fetch_array($qry_produk)) {
            ?>
            <div class="col-md-3 mb-4 d-flex justify-content-center">
                <div class="card" style="width: 18rem;">
                    <div class="card-img-container">
                        <img src="<?= $data_produk['foto_produk'] ?>" class="card-img-top img-square">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $data_produk['nama_produk'] ?></h5>
                        <h5 class="card-title">Rp.<?= $data_produk['harga'] ?></h5>
                        <p class="mt-auto-card-text"><?= substr($data_produk['deskripsi'], 0, 20) ?>...</p>
                        <a href="beli_produk.php?id_produk=<?= $data_produk['id_produk'] ?>"
                            class="btn btn-success">Beli</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<div class="container d-flex justify-content-center align-items-center mb-4">
    <a href="tambah_produk.php" class="btn btn-success">Tambah Produk</a>
</div>

<?php
include "footer.php";
?>