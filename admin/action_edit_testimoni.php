<?php
require_once "connect.php";

$id_testimoni = $_POST['id_testimoni'];
$rating = $_POST['rating'];
$testimoni = $_POST['testimoni'];
$narasumber = $_POST['narasumber'];
$narasumber_profesi = $_POST['narasumber_profesi'];
$narasumber_foto = $_POST['narasumber_foto'];

$sql_update = "update t_testimoni 
                set rating='$rating', testimoni='$testimoni', narasumber='$narasumber', 
                    narasumber_profesi='$narasumber_profesi', narasumber_foto='$narasumber_foto'
                where id_testimoni='$id_testimoni'";
$result = mysqli_query($dbcon, $sql_update);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "UBAH DATA BERHASIL";
    header("location:testimoni.php");
}else{
    header("location:testimoni.php?hal=testimoni&pesan=gagal_update");
	echo mysqli_error();
	echo "$sql_update";
}
?>
