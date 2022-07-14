<?php
include "connect.php";

$id_berita = $_POST['id_berita'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$gambar_berita = $_POST['gambar_berita']; 

$sql_update = "update t_berita 
                set ketegori='$kategori', judul='$judul', isi='$isi', gambar_berita='$gambar_berita' 
                where id_berita = '$id_berita'";
var_dump($sql_update);
                $result = mysqli_query($dbcon, $sql_update);

var_dump($result);
die();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "UBAH DATA BERHASIL";
    header("location:berita.php");
}else{
    header("location:berita.php?hal=produk&pesan=gagal_update");
	echo mysqli_error();
	echo "$sql_update";
}
?>
