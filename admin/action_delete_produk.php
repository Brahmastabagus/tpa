<?php
include("connect.php");
$sql_delete="DELETE FROM t_produk WHERE id_produk='$_GET[id_produk]'";

$result=mysqli_query($dbcon,$sql_delete);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil dihapus');
            document.location.href = 'produk.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal dihapus');
            document.location.href = 'produk.php';
        </script>";
}