<?php
include("connect.php");
$sql_delete="delete from t_produk where id_produk='$_GET[id_produk]'";

$result=mysqli_query($dbcon,$sql_delete);

if ($result) {
	header("location:produk.php");
}else{
	header("location:produk.php?hal=produk&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql_delete";
}
?>