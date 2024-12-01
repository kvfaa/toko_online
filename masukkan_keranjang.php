<?php
session_start();
if ($_POST) {
    include "koneksi.php";

    $qry_get_produk = mysqli_query($conn, "select * from produk where id_produk = '" . $_GET['id_produk'] . "'");
    $data_produk = mysqli_fetch_array($qry_get_produk);
    $_SESSION['cart'][] = array(
        'id_produk' => $data_produk['id_produk'],
        'foto_produk' => $data_produk['foto_produk'],
        'nama_produk' => $data_produk['nama_produk'],
        'harga' => $data_produk['harga'],
        'qty' => $_POST['jumlah_beli']


    );
}
header('location: keranjang.php');
?>