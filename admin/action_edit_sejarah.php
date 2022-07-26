<?php
require_once "connect.php";

function upload()
{
    $namafile = $_FILES["Gambar"]["name"];
    $ukuranfile = $_FILES["Gambar"]["size"];
    $error = $_FILES["Gambar"]["error"];
    $tmpname = $_FILES["Gambar"]["tmp_name"];

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

$Nomor = $_POST['Nomor'];
$Judul = $_POST['Judul'];
$Deskripsi = $_POST['Deskripsi'];
$GambarLama = $_POST['GambarLama'];
$Gambar = $GambarLama;

if ($_FILES["Gambar"]["error"] === 4) {
    $Gambar = $GambarLama;
} else {
    $Gambar = upload();
}

$sql_update = "UPDATE t_content SET Judul='$Judul', Deskripsi='$Deskripsi', Gambar='$Gambar' WHERE Nomor = '$Nomor'";
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
