<?php
include("connect.php");
$sql_delete="DELETE FROM t_testimoni WHERE id_testimoni='$_GET[id_testimoni]'";

$result=mysqli_query($dbcon,$sql_delete);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil dihapus');
            document.location.href = 'testimoni.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'testimoni.php';
        </script>";
}