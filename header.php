<?php
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="tambah_kelas.css">
    <title></title>
    <style>
        /* Ensure the navbar is fixed at the top */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"
        style="box-shadow: 4px 4px 5px -4px; padding-left: 25px; padding-right: 25px;">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="img/new.svg" style="height: 40px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home_pelanggan.php">Home</a>
                    </li>
                </ul>
            </div>
            <div class="justify-content-right" id="navbarNav">
                <ul style="list-style-type: none; padding-left: 0; margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="keranjang.php">Keranjang</a>
                    </li>
                </ul>
            </div>
            <div class="justify-content-right" id="navbarNav">
                <ul style="list-style-type: none; padding-left: 0; margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="histori_pembelian.php">History</a>
                    </li>
                </ul>
            </div>
            <div class="justify-content-right" id="navbarNav">
                <ul style="list-style-type: none; padding-left: 0; margin: 0;">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>