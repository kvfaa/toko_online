<?php
if ($_POST)


    $nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

if (empty($nama_petugas)) {
    echo "<script>alert('Nama Pegawai tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
} elseif (empty($username)) {
    echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
} elseif (empty($password)) {
    echo "<script>alert('Password tidak boleh kosong');location.href='tambah_pegawai.php';</script>";
} else {
    include "koneksi.php";
    $insert = mysqli_query($conn, "insert into petugas (nama_petugas, username, password) 
    value ('" . $nama_petugas . "','" . $username . "','" . md5($password) . "')") or die(mysqli_error($conn));
    if ($insert) {
        echo "<script>alert('Sukses menambahkan Pegawai');location.href='tambah_pegawai.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan Pegawai');location.href='tambah_pegawai.php';</script>";
    }
}

header("Location: tampil.php");
exit();
?>