<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Produk</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/register.css"> <!-- Update the path if necessary -->

    <style>
        body {
            font-family: 'Karla', sans-serif;
        }

        .login-card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-card-img {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
    </style>
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="img/background.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="img/logo.png" alt="logo" class="logo" style="height: 40px;">
                            </div>
                            <p class="login-card-description">Register Data Produk Anda</p>
                            <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_produk" class="sr-only">Nama Produk:</label>
                                    <input type="text" name="nama_produk" id="nama_produk" class="form-control"
                                        placeholder="Nama Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi" class="sr-only">Deskripsi:</label>
                                    <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                                        placeholder="Deskripsi Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga" class="sr-only">Harga:</label>
                                    <input type="text" name="harga" id="harga" class="form-control"
                                        placeholder="20.0000" required>
                                </div>
                                <div class="form-group">
                                    <label for="foto_produk" class="sr-only">Upload Foto:</label>
                                    <input type="file" name="foto_produk" id="foto_produk" class="form-control"
                                        required>
                                </div>
                                <button type="submit" name="simpan" class="btn btn-block login-btn mb-4">Tambah
                                    Produk</button>
                            </form>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>