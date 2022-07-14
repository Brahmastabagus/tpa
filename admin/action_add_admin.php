<?php
require_once "connect.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password']; 

$sql_add="insert into t_admin (nama, email, password) values ('$nama', '$email', '$password')";

$result=mysqli_query($dbcon,$sql_add);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	header("location:admin.php");
}else{
	header("location:admin.php?hal=admin&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql_tambah";
}
?>