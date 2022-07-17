<?php
require_once "connect.php";

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

$kategori = $_POST['kategori'];
$judul = $_POST['judul']; 
$isi = $_POST['isi']; 
$gambar_berita = upload();

if (!$gambar_berita) {
        return false;
}

$sql_add="INSERT INTO t_berita(kategori, judul, isi, gambar_berita) 
        VALUES ('$kategori', '$judul', '$isi', '$gambar_berita')";

$result=mysqli_query($dbcon,$sql_add);

if (mysqli_affected_rows($dbcon) == 1) {
	echo "<script>
            alert('Berhasil ditambahkan');
            document.location.href = 'berita.php';
        </script>";
} else {
	echo "<script>
            alert('Gagal ditambahkan');
            document.location.href = 'berita.php';
        </script>";
}