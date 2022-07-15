<?php
include("connect.php");
$id = $_GET["id_sosial_media"];
$sql_delete="DELETE FROM `t_sosial-media` WHERE id_sosial_media = $id";

$result=mysqli_query($dbcon,$sql_delete);

if ($result) {
    echo "<script>
            alert('Berhasil dihapus');
            document.location.href = 'sosial-media.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'sosial-media.php';
        </script>";
}
