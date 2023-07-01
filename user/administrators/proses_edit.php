<?php
//load koneksi database
include '../../../koneksi.php';

//ambil data dari form
$id = $_POST['id'];
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
//update data ke database
$update = mysqli_query($koneksi, "UPDATE tb_users SET
 nama_lengkap = '$nama_lengkap',
 no_telp = '$no_telp',
 alamat = '$alamat',
 username = '$username',
 col_password = '$col_password',
 col_status = '$col_status',
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