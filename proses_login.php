<?php
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        echo "<script>alert('Username Tidak Boleh Kosong');location.href='login.php';</script>";
    } elseif (empty($password)) {
        echo "<script>alert('Password Tidak Boleh Kosong');location.href='login.php';</script>";
    } else {
        include "koneksi.php";

        // Check for pelanggan (customers)
        $qry_login_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username' AND password = '" . md5($password) . "'");

        if (mysqli_num_rows($qry_login_pelanggan) > 0) {
            // If pelanggan found
            $data_pelanggan = mysqli_fetch_array($qry_login_pelanggan);
            session_start();
            $_SESSION['id_pelanggan'] = $data_pelanggan['id_pelanggan'];
            $_SESSION['nama_pelanggan'] = $data_pelanggan['nama_pelanggan'];
            $_SESSION['status_login'] = true;

            header("location:home_pelanggan.php");
            exit();
        } else {
            // Check for petugas (staff) if pelanggan not found
            $qry_login_petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '" . md5($password) . "'");

            if (mysqli_num_rows($qry_login_petugas) > 0) {
                // If petugas found
                $data_petugas = mysqli_fetch_array($qry_login_petugas);
                session_start();
                $_SESSION['id_petugas'] = $data_petugas['id_petugas'];
                $_SESSION['nama_petugas'] = $data_petugas['nama_petugas'];
                $_SESSION['status_login'] = true;

                header("location:home_petugas.php");
                exit();
            } else {
                echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
            }
        }
    }
}
?>