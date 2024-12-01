<div class="container" style="margin: 130px;">
    <h1>Data Pegawai</h1>
    <div class="card p-4">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>GENDER</th>
                    <th>NIK</th>
                    <th>NO TELEPON</th>
                    <th>ALAMAT</th>
                    <th>USERNAME</th>
                    <th>JABATAN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_pegawai = mysqli_query($conn, "SELECT * FROM pegawai JOIN jabatan ON jabatan.id_jabatan = pegawai.id_jabatan");
                $no = 0;
                while ($data_pegawai = mysqli_fetch_array($qry_pegawai)) {
                    $no++;
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $data_pegawai['nama_pelanggani'] ?></td>
                        <td><?= $data_pegawai['alamat_pelanggan'] ?></td>
                        <td><?= $data_pegawai['telp_pelanggan'] ?></td>
                        <td><?= $data_pegawai['username'] ?></td>
                        <td>
                            <a href="ubah_pegawai.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>"
                                class="btn btn-success">Ubah</a>
                            <a href="hapus_pegawai.php?id_pegawai=<?= $data_pegawai['id_pegawai'] ?>"
                                onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <!-- <iframe style="border-radius:12px"
                        src="https://open.spotify.com/embed/playlist/1aQYbkcCvE1z0I4AzJRAne?utm_source=generator"
                        width="100%" height="352" frameBorder="0" allowfullscreen=""
                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                        loading="lazy"></iframe> -->
            </tbody>
        </table>
    </div>
    <div class="card p-4 mt-3">
        <a href="tambah_pegawai.php" class="btn btn-success">Tambah</a>
    </div>
</div>
<br> <br> <br>
<br> <br> <br>
<br> <br> <br>
<?php
include "footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>