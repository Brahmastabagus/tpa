<?php
include("connect.php");
$sql_delete="DELETE FROM t_berita WHERE id_berita='$_GET[id_berita]'";

$result=mysqli_query($dbcon,$sql_delete);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil dihapus');
            document.location.href = 'berita.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'berita.php';
        </script>";
}