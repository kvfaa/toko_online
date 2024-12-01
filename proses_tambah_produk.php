<?php
if ($_POST) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto_produk']; // Handling the uploaded file

    // Check if 'nama' is empty
    if (empty($nama)) {
        echo "<script>alert('Nama buku tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } else if (empty($foto['name'])) { // Check if a file has been uploaded
        echo "<script>alert('Foto tidak boleh kosong');location.href='tambah_buku.php';</script>";
    } else if (empty($harga) || !is_numeric($harga)) { // Check if harga is numeric
        echo "<script>alert('Harga harus berupa angka');location.href='tambah_buku.php';</script>";
    } else {
        // Define the target directory for file uploads
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto["name"]);

        // Ensure the uploads directory exists and is writable
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0755, true);
        }

        // Check if the file is a real image
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($foto["tmp_name"]);
        if ($check === false) {
            echo "<script>alert('File yang diupload bukan gambar');location.href='tambah_produk.php';</script>";
            exit();
        }

        // Check for upload errors
        if ($foto['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('Gagal mengupload foto. Error code: " . $foto['error'] . "');location.href='tambah_produk.php';</script>";
            exit();
        }

        // Try to move the uploaded file
        if (move_uploaded_file($foto["tmp_name"], $target_file)) {
            include "koneksi.php";

            // Escape input data to prevent SQL injection
            $nama = mysqli_real_escape_string($conn, $nama);
            $harga = mysqli_real_escape_string($conn, $harga);
            $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
            $foto_path = mysqli_real_escape_string($conn, $target_file);

            // Insert into the database
            $insert = mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, foto_produk) VALUES ('$nama', '$deskripsi', '$harga', '$foto_path')");
            if ($insert) {
                echo "<script>alert('Sukses Menambahkan Produk');location.href='home_pelanggan.php';</script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Produk " . mysqli_error($conn) . "');location.href='tambah_produk.php';</script>";
            }
        } else {
            // Provide more detailed error information if file move fails
            echo "<script>alert('Gagal memindahkan file. Pastikan folder upload memiliki izin tulis.');location.href='tambah_produk.php';</script>";
        }
    }
}
