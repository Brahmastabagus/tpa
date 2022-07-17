<?php
require_once "connect.php";

function upload()
{
    $namafile = $_FILES["narasumber_foto"]["name"];
    $ukuranfile = $_FILES["narasumber_foto"]["size"];
    $error = $_FILES["narasumber_foto"]["error"];
    $tmpname = $_FILES["narasumber_foto"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                        alert('Upload gambar terlebih dahulu')
                      </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensigambarvalid = ["jpg", "jpeg", "png"];
    $ekstensigambar = explode(".", $namafile);
    $ekstensigambar = strtolower(end($ekstensigambar));

    if (!in_array($ekstensigambar, $ekstensigambarvalid)) {
        echo "<script>
                        alert('Yang anda upload bukan gambar')
                      </script>";
        return false;
    }

    // cek jika gambar ukurannya terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script>
                        alert('Ukuran gambar terlalu besar')
                      </script>";
        return false;
    }

    // lolos semua
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    move_uploaded_file($tmpname, '../assets/' . $namafilebaru);
    return $namafilebaru;
}

$id_testimoni = $_POST['id_testimoni'];
$rating = $_POST['rating'];
$testimoni = $_POST['testimoni'];
$narasumber = $_POST['narasumber'];
$narasumber_profesi = $_POST['narasumber_profesi'];
$gambarLama = $_POST['gambarLama'];

if ($_FILES["narasumber_foto"]["error"] === 4) {
    $narasumber_foto = $gambarLama;
} else {
    $narasumber_foto = upload();
}

$sql_update = "UPDATE t_testimoni 
                SET rating='$rating', testimoni='$testimoni', narasumber='$narasumber', 
                    narasumber_profesi='$narasumber_profesi', narasumber_foto='$narasumber_foto'
                WHERE id_testimoni='$id_testimoni'";
$result = mysqli_query($dbcon, $sql_update);

if (mysqli_affected_rows($dbcon) == 1) {
    echo "<script>
            alert('Berhasil diubah');
            document.location.href = 'testimoni.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal diubah');
            document.location.href = 'testimoni.php';
        </script>";
}