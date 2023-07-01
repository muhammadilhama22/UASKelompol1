<?php
//load koneksi database
include '../../koneksi.php';

//ambil data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
//

//proses upload gambar
//
//update data ke database
$update = mysqli_query($koneksi, "UPDATE tb_about SET judul ='$judul', isi ='$isi'
WHERE id='$id'");
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
