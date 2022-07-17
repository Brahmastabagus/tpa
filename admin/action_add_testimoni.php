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

$rating = $_POST['rating'];
$testimoni = $_POST['testimoni'];
$narasumber = $_POST['narasumber'];
$narasumber_profesi = $_POST['narasumber_profesi'];
$narasumber_foto = upload();

if (!$narasumber_foto) {
    return false;
}

$sql_insert = "INSERT INTO t_testimoni(rating, testimoni, narasumber, narasumber_profesi, narasumber_foto) 
VALUES ('$rating', '$testimoni', '$narasumber', '$narasumber_profesi', '$narasumber_foto')";

$result = mysqli_query($dbcon, $sql_insert);

if (mysqli_affected_rows($dbcon) == 1) {
    echo "<script>
            alert('Berhasil ditambahkan');
            document.location.href = 'testimoni.php';
        </script>";
} else {
    echo "<script>
            alert('Gagal ditambahkan');
            document.location.href = 'testimoni.php';
        </script>";
}