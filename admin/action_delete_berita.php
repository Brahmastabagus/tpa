<?php
include("connect.php");
$sql_delete="delete from t_berita where id_berita='$_GET[id_berita]'";

$result=mysqli_query($dbcon,$sql_delete);

if ($result) {
	header("location:berita.php");
}else{
	header("location:berita.php?hal=berita&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql_delete";
}
?>