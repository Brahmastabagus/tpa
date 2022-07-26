<?php
include "connect.php";

$id_header = $_POST['id_header'];
$judul = $_POST['judul'];
$keterangan = $_POST['keterangan'];
$vidio = $_POST['vidio'];

$sql_update = "UPDATE `t_header` 
SET judul='$judul', keterangan='$keterangan' , vidio='$vidio'
WHERE id_header = '$id_header'";
$result = mysqli_query($dbcon, $sql_update);
if (mysqli_affected_rows($dbcon) == 1) {
echo "<script>
alert('Berhasil diubah');
document.location.href = 'header.php';
</script>";

} else {

echo "<script>
alert('Gagal diubah');
document.location.href = 'header.php';
</script>";
}

