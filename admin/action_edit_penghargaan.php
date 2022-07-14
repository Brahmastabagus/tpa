<?php
require_once "connect.php";

$id_penghargaan = $_POST['id_penghargaan'];
$judul = $_POST['judul'];
$tahun = date('Y-m-d', strtotime($_POST['tahun']));
$gambar = $_POST['gambar']; 

$sql_update = "update t_penghargaan 
                set judul='$judul', tahun='$tahun', gambar='$gambar' 
                where id_penghargaan = '$id_penghargaan'";
$result = mysqli_query($dbcon, $sql_update);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "UBAH DATA BERHASIL";
    header("location:penghargaan.php");
}else{
    header("location:penghargaan.php?hal=penghargaan&pesan=gagal_update");
	echo mysqli_error();
	echo "$sql_update";
}
?>
