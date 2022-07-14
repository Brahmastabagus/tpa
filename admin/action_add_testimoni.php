<?php
require_once "connect.php";

$rating = $_POST['rating'];
$testimoni = $_POST['testimoni'];
$narasumber = $_POST['narasumber'];
$narasumber_profesi = $_POST['narasumber_profesi'];
$narasumber_foto = $_POST['narasumber_foto'];


$sql_insert = "insert into t_testimoni(rating, testimoni, narasumber, narasumber_profesi, narasumber_foto) 
values('$rating', '$testimoni', '$narasumber', '$narasumber_profesi', '$narasumber_foto')";

$result = mysqli_query($dbcon, $sql_insert);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "TAMBAH DATA BERHASIL";
    header("location:testimoni.php");
}else{
    header("location:testimoni.php?hal=testimonis&pesan=gagal_tambah");
	echo mysqli_error();
	echo "$sql_insert";
}
?>
