<?php
require_once "connect.php";

function upload()
{
    $namafile = $_FILES["gambar"]["name"];
    $ukuranfile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpname = $_FILES["gambar"]["tmp_name"];

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

$id_produk = $_POST['id_produk'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$gambarLama = $_POST['gambarLama'];
$gambar = $gambarLama;

if ($_FILES["gambar"]["error"] === 4) {
    $gambar = $gambarLama;
} else {
    $gambar = upload();
}

$sql_update = "UPDATE t_produk SET nama='$nama', deskripsi='$deskripsi', gambar='$gambar' WHERE id_produk = '$id_produk'";
$result = mysqli_query($dbcon, $sql_update);

if (mysqli_affected_rows($dbcon) == 1) {
    echo "<script>
            alert('Berhasil diubah');
            document.location.href = 'produk.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal diubah');
            document.location.href = 'produk.php';
        </script>";
}
