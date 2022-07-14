<?php
require_once "connect.php";

$kategori = $_POST['kategori'];
$judul = $_POST['judul']; 
$isi = $_POST['isi']; 
$gambar_berita = $_POST['gambar_berita']; 

$sql_add="insert into t_berita(kategori, judul, isi, gambar_berita) 
        values('$kategori', '$judul', '$isi', '$gambar_berita')";

$result=mysqli_query($dbcon,$sql_add);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	header("location:berita.php");
}else{
	header("location:berita.php?hal=admin&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql_add";
}

?>