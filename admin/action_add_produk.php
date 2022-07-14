<?php
require_once "connect.php";

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$input_gambar = $_POST['gambar'];

$sql_insert = "insert into t_produk(nama, deskripsi, gambar) values('$nama', '$deskripsi', '$input_gambar')";

$result = mysqli_query($dbcon, $sql_insert);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "TAMBAH DATA BERHASIL";
    header("location:produk.php");
}else{
    header("location:produk.php?hal=produk&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql_insert";
}
?>
