<?php
include("connect.php");
$sql_delete="delete from t_penghargaan where id_penghargaan='$_GET[id_penghargaan]'";

$result=mysqli_query($dbcon,$sql_delete);

if ($result) {
	header("location:penghargaan.php");
}else{
	header("location:penghargaan.php?hal=penghargaan&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql_delete";
}
?>