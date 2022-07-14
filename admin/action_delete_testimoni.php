<?php
include("connect.php");
$sql_delete="delete from t_testimoni where id_testimoni='$_GET[id_testimoni]'";

$result=mysqli_query($dbcon,$sql_delete);

if ($result) {
	header("location:testimoni.php");
}else{
	header("location:testimoni.php?hal=testimoni&pesan=gagal_hapus");
	echo mysqli_error();
	echo "$sql_delete";
}
?>