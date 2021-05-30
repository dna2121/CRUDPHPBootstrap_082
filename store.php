<?php
// include koneksi database
include './config.php';

//menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];

// menginput data ke database
mysqli_query($koneksi, "insert into mahasiswa values('', '$nama', '$nim', '$alamat')");
//mengembalikan ke halaman awal
header("location:./index.php");
