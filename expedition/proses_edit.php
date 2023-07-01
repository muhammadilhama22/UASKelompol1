<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$id = $_POST['id'];
$nama_ekspedisi = $_POST['nama_ekspedisi'];
$harga_ekspedisi = $_POST['harga_ekspedisi'];
//

//proses upload gambar
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = './uploads/';
move_uploaded_file($source, $folder . $nama_file);
//
//update data ke database
$update = mysqli_query($koneksi, "UPDATE tb_ekspedisi SET
 nama_ekspedisi = '$nama_ekspedisi',
 harga_ekspedisi = '$harga_ekspedisi',
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