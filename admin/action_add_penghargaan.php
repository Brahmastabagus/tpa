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

$judul = $_POST['judul'];
$tahun = date('Y-m-d', strtotime($_POST['tahun']));
$gambar = upload();

if (!$gambar) {
    return false;
}

$sql_insert = "INSERT INTO t_penghargaan(judul, tahun, gambar) VALUES ('$judul', '$tahun', '$gambar')";

$result = mysqli_query($dbcon, $sql_insert);

if (mysqli_affected_rows($dbcon) == 1) {
    echo "<script>
            alert('Berhasil ditambahkan');
            document.location.href = 'penghargaan.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal ditambahkan');
            document.location.href = 'penghargaan.php';
        </script>";
}