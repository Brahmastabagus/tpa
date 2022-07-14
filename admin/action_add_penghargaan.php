<?php
require_once "connect.php";

$judul = $_POST['judul'];
$tahun = date('Y-m-d', strtotime($_POST['tahun']));
$gambar = $_POST['gambar'];

$sql_insert = "insert into t_penghargaan(judul, tahun, gambar) values('$judul', '$tahun', '$gambar')";

$result = mysqli_query($dbcon, $sql_insert);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "TAMBAH DATA BERHASIL";
    header("location:penghargaan.php");
}else{
    header("location:penghargaan.php?hal=penghargaans&pesan=gagal_tambah");
	echo mysqli_error();
    print_r();
	echo "$sql_insert";
}
?>
