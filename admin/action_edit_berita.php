<?php
include "connect.php";

function upload()
{
    $namafile = $_FILES["gambar_berita"]["name"];
    $ukuranfile = $_FILES["gambar_berita"]["size"];
    $error = $_FILES["gambar_berita"]["error"];
    $tmpname = $_FILES["gambar_berita"]["tmp_name"];

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

$id_berita = $_POST['id_berita'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$gambarLama = $_POST['gambarLama'];

if ($_FILES["gambar_berita"]["error"] === 4) {
    $gambar_berita = $gambarLama;
} else {
    $gambar_berita = upload();
}

$sql_update = "UPDATE `t_berita` 
                SET kategori='$kategori', judul='$judul', isi='$isi', gambar_berita='$gambar_berita' 
                WHERE id_berita = '$id_berita'";
$result = mysqli_query($dbcon, $sql_update);

if (mysqli_affected_rows($dbcon) == 1) {
    echo "<script>
            alert('Berhasil diubah');
            document.location.href = 'berita.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal diubah');
            document.location.href = 'berita.php';
        </script>";
}
