<?php
require_once "connect.php";

$id_produk = $_POST['id_produk'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_POST['gambar']; 

$sql_update = "update t_produk set nama='$nama', deskripsi='$deskripsi', gambar='$gambar' where id_produk = '$id_produk'";
$result = mysqli_query($dbcon, $sql_update);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "UBAH DATA BERHASIL";
    header("location:produk.php");
}else{
    header("location:produk.php?hal=produk&pesan=gagal_update");
	echo mysqli_error();
	echo "$sql_update";
}
?>
