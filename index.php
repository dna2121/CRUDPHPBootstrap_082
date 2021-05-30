<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <title>Data Mahasiswa</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Data Mahasiswa</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNovAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="nav-link active" aria-current="page" href="#">Tambah Mahasiswa</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container data-mahasiswa mt-5">
            <!--Modal-->
            <!--Pastikan modal berada di dalam container-->
            <!--Button untuk  memunculkan modal-->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data
            </button>
            <!-- Modal tambah data-->
            <div class="modal fade show" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!--Kita membuat form dengan method post untuk memanggil file store.php-->
                        <form action="store.php" method="post" name="form">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahDataLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- input nama -->
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Mahasiswa" name="nama" required>
                                </div>
                                <!--input nim-->
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" placeholder="Masukkan NIM Mahasiswa" name="nim" required>
                                </div>
                                <!--input alamat-->
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <!--coba pake text area-->
                                    <textarea type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat Mahasiswa" name="alamat" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!--button close modal-->
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!--button tambah data pastikan berada di dalam form -->
                                <button type="submit" class="btn btn-primary" value="SIMPAN">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        

            <table class="table table-striped" id="tabelMahasiswa">
                <thead>
                    <tr>
                        <th scope="col">No. </th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    //memanggil config.phpyang sudah kita buat
                    include 'config.php';
                    //membuat var untuk nomor mhs yang akan diincrement
                    $no = 1;
                    //melakukan query
                    $mahasiswa = mysqli_query($koneksi, "select * from mahasiswa");
                    //looping data mahasiswa
                    while ($data = mysqli_fetch_array($mahasiswa)) {
                    ?>
                        <!--menampilkan data mahasiswa ke dalam table-->
                        <tr>
                            <!--increment nomor baris $no++ -->
                            <td><?php echo $no++; ?></td>
                            <!--menampilkan data-->
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['alamat']; ?></td> 
                        <!--kolom ini untuk aksi data mahasiswa-->
                        <td>
                            <!-- aksi edit dan delete, di sini menggunakan btn-sm agar tombolnya kecil-->
                            <!-- link untuk masuk ke halaman edit-->
                            <!-- edit.php?id=<........-->
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning btn-sm text-white">EDIT</a>
                            <!-- link untuk delete berdasarkan id, akan keluar confirm terlebih dahulu-->
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data mahasiswa ini?')">HAPUS</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            </table>            
        </div> 

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tabelMahasiswa').DataTable();
            });
        </script>
    </body>
</html>