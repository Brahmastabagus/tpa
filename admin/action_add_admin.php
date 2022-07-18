<?php
require_once "connect.php";

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password']; 

$sql_add="INSERT INTO t_admin (nama, email, password) VALUES ('$nama', '$email', '$password')";

$result=mysqli_query($dbcon,$sql_add);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil ditambahkan');
            document.location.href = 'admin.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal ditambahkan');
            document.location.href = 'admin.php';
        </script>";
}