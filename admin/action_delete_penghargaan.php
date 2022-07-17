<?php
include("connect.php");
$sql_delete="DELETE FROM t_penghargaan WHERE id_penghargaan='$_GET[id_penghargaan]'";

$result=mysqli_query($dbcon,$sql_delete);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil dihapus');
            document.location.href = 'penghargaan.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'penghargaan.php';
        </script>";
}