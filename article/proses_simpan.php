<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$nama_kategori = $_POST['nama_kategori'];
$nama_penulis = $_POST['nama_penulis'];
$nama_merek = $_POST['nama_merek'];

//

//proses upload gambar
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = './uploads/';
move_uploaded_file($source, $folder . $nama_file);
//
//simpan data ke database
$insert = mysqli_query($koneksi, "INSERT INTO tb_artikel VALUES (
 NULL,
 '$judul',
 '$isi',
 '$nama_kategori',
 '$nama_penulis',
 '$nama_merek',
 '$nama_file',
 CURRENT_TIMESTAMP()
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