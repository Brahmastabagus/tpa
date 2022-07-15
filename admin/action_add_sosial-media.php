<?php
require_once "connect.php";

$nama = $_POST['nama'];
$link = $_POST['link'];

$sql_insert = "INSERT INTO `t_sosial-media`(nama, link) VALUES ('$nama', '$link')";

$result = mysqli_query($dbcon, $sql_insert);

if (mysqli_affected_rows($dbcon) == 1){
    echo "<script>
            alert('Berhasil ditambahkan');
            document.location.href = 'sosial-media.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal ditambahkan');
            document.location.href = 'sosial-media.php';
        </script>";
}
