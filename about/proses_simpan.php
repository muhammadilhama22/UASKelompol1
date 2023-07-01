<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
//

//proses upload gambar
//
//simpan data ke database
$insert = mysqli_query($koneksi, "INSERT INTO tb_about VALUES (
 NULL,
 '$judul',
 '$isi'
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
