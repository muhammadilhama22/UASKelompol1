<?php
//load koneksi database
include '../../../koneksi.php';

//ambil data dari form
$nama_lengkap = $_POST['nama_lengkap'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$col_password = $_POST['col_password'];
$col_status = $_POST['col_status'];

//

//proses upload gambar
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = './uploads/';
move_uploaded_file($source, $folder . $nama_file);
//
//simpan data ke database
$insert = mysqli_query($koneksi, "INSERT INTO tb_users VALUES (
 NULL,
 '$nama_lengkap',
 '$no_telp',
 '$alamat',
 '$username',
 '$col_password',
 '$col_status',
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