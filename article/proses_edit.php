<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$id = $_POST['id'];
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
//update data ke database
$update = mysqli_query($koneksi, "UPDATE tb_artikel SET
 judul = '$judul',
 isi = '$isi',
 id_kategori = '$nama_kategori',
 id_penulis = '$nama_penulis',
 id_merek = '$nama_merek',
 gambar = '$nama_file'
 WHERE id = '$id'");
//cek apakah proses edit ke database berhasil
if ($update) {
    //jika berhasil tampilkan pesan berhasil edit data
    echo "<script>
 alert('Data Berhasil Diubah');
 window.location.href='index.php';
 </script>";
} else {
    //jika gagal tampilkan pesan gagal edit data
    echo "<script>
 alert('Data Gagal Diubah');
 window.location.href='index.php';
 </script>";
}
 //