<?php
//load koneksi database
include '../../../koneksi.php';

//ambil data dari form
$nama_ukuran = $_POST['nama_ukuran'];
//

//simpan data ke database
$insert = mysqli_query($koneksi, "INSERT INTO tb_ukuran_b VALUES (
 NULL,
 '$nama_ukuran'
 )");
//
//cek apakah proses simpan ke database berhasil
if ($insert) {
    //jika berhasil tampilkan pesan berhasil simpan data
    echo "<script>
 alert('Data Berhasil Ditambahkan');
 window.location.href='index.php';
 </script>";
} else {
    //jika gagal tampilkan pesan gagal simpan data
    echo "<script>
 alert('Data Gagal Ditambahkan');
 window.location.href='index.php';
 </script>";
}
 //