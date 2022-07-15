<?php
require_once "connect.php";

if (isset($_POST["submit"])) {
    $id_sosial_media = $_POST['id_sosial_media'];
    $nama = $_POST['nama'];
    $link = $_POST['link'];
    
    $sql_update = "UPDATE `t_sosial-media` 
    SET nama='$nama', link='$link' 
                WHERE id_sosial_media = '$id_sosial_media'";
    $result = mysqli_query($dbcon, $sql_update);
}
                
if (mysqli_affected_rows($dbcon) == 1){
    echo "<script>
            alert('Berhasil diubah');
            document.location.href = 'sosial-media.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal diubah');
            document.location.href = 'sosial-media.php';
        </script>";
}
