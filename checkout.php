<?php
session_start();
include "koneksi.php";

$cart = @$_SESSION['cart'];
if (count($cart) > 0) {
    $id_pelanggan = $_SESSION['id_pelanggan'];
    $id_petugas = $_SESSION['id_petugas'];
    $tgl_transaksi = date('Y-m-d');
    $total_harga = 0;

    foreach ($cart as $key_produk => $val_produk) {
        $total_harga += $val_produk['qty'] * $val_produk['harga'];
    }

    // Insert into transaksi
    $qry_insert_transaksi = mysqli_query($conn, "INSERT INTO transaksi (id_pelanggan, id_petugas, tgl_transaksi, status) 
        VALUES ('$id_pelanggan', '$id_petugas', '$tgl_transaksi', 'Pending')");

    // Check if the transaksi insertion was successful
    if ($qry_insert_transaksi) {
        // Get the newly inserted transaction's ID
        $id_transaksi = mysqli_insert_id($conn);

        // Insert each item in the cart into detail_transaksi
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn, "INSERT INTO detail_transaksi (id_transaksi, id_produk, qty, subtotal)
                VALUES ('$id_transaksi', '" . $val_produk['id_produk'] . "', '" . $val_produk['qty'] . "', '" . $val_produk['subtotal'] . "')");
        }

        // Clear cart after successful insertion
        unset($_SESSION['cart']);

        echo '<script>alert("Pembelian berhasil!"); location.href="histori_pembelian.php";</script>';
    } else {
        // Display MySQL error if the insert fails
        $error = mysqli_error($conn);
        echo '<script>alert("Gagal menambahkan transaksi: ' . $error . '"); location.href="index.php";</script>';
    }
} else {
    echo '<script>alert("Keranjang Anda kosong."); location.href="index.php";</script>';
}
?>