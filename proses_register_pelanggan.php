<?php
if ($_POST) {
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat_pelanggan = $_POST['alamat_pelanggan'];
    $telp_pelanggan = $_POST['telp_pelanggan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($nama_pelanggan)) {
        echo "<script>alert('Nama Pegawai tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } elseif (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong');location.href='register_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "INSERT INTO pelanggan (nama_pelanggan, alamat_pelanggan, telp_pelanggan, username, password) 
        VALUES ('" . $nama_pelanggan . "','" . $alamat_pelanggan . "','" . $telp_pelanggan . "','" . $username . "','" . md5($password) . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan Pegawai');location.href='register_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan Pegawai');location.href='register_pelanggan.php';</script>";
        }
    }

    header("Location: login.php");
    exit();
}
?>