-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 07:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@tpa.com', '0192023a7bbd73250516f069df18b500'),
(3, 'dinda', 'a@tpa.com', 'ed2b1f468c5f915f3f1cf75d7068baae'),
(4, 'Bagus', 'b@tpa.com', '9e1e06ec8e02f0a0074f2fcc6b26303b');

-- --------------------------------------------------------

--
-- Table structure for table `t_berita`
--

CREATE TABLE `t_berita` (
  `id_berita` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kategori` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar_berita` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_berita`
--

INSERT INTO `t_berita` (`id_berita`, `tgl`, `kategori`, `judul`, `isi`, `gambar_berita`) VALUES
(1, '2022-07-17 03:14:28', 'Event', 'Mengumpulkan botol 300ml dan tukar dengan uang', 'Dapatkan kesempatan berlibur ke Bali dengan menukarkan 3 botol air mineral PrimA ke toko terdekat', '62d37e940c068.png'),
(5, '2022-07-17 03:08:38', 'Pengumuman', 'Mengumpulkan botol 600ml dan tukar dengan uang', 'Dapatkan kesempatan uang 1 juta dengan menukarkan 3 botol air mineral PrimA ke toko terdekat', '62d37d36bba7b.png'),
(10, '2022-07-17 03:06:31', 'Loker', 'Dicari Karyawan untuk pemantau gudang perusahaan', 'Persyaratan Pendaftaran : Laki-laki / Perempuan , Minimal lulusan S1 dan memiliki komitmen yang tinggi', '62d37cb734547.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_penghargaan`
--

CREATE TABLE `t_penghargaan` (
  `id_penghargaan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_penghargaan`
--

INSERT INTO `t_penghargaan` (`id_penghargaan`, `judul`, `tahun`, `deskripsi`, `gambar`) VALUES
(1, 'International Organization for Standardization 22000', '2018-07-01', 'PT Tirta purbalingga adijaya berhasil mendapatkan sertifikasi ISO 2100                                ', '62d394b731692.png'),
(2, 'Perusahaan pemerhati lingkungan terbaik', '2019-09-01', 'Mendapatkan penghargaan dari pemerintah daerah purbalingga atas perhatian dan kepedulian kami terhadap lingkungan baik internal maupun eksternal perusahaan', '62d394aea9a9e.png'),
(5, 'Pabrik dengan hustle culture terbaik di indonesia', '2020-06-17', '', '62d394a633db2.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama`, `deskripsi`, `gambar`) VALUES
(2, 'Gelas - 240 ml', 'Air mineral Prim-A kemasan gelas 240 ml sangat cocok untuk sekali minum.  Prim-A kemasan ini bisa disajikan untuk acara yang dihadiri banyak orang. Ukurannya yang kecil membuat kemasan ini praktis dan ekonomis.', '62d39d15f2b77.png'),
(3, 'Botol - 330 ml', 'Botol air mineral Prim-A ukuran 330 ml cocok untuk beraktivitas sehari-hari. Ukurannya yang kecil, praktis untuk dibawa saat bepergian, bisa dimasukkan tas ataupun digenggam.', '62d39d7e649f6.png'),
(4, 'Botol - 600 ml', 'Botol air mineral Prim-A ukuran 600 ml cocok untuk menemanimu berolahraga. Botol sedangnya tidak terlalu berat sehingga mudah dibawa, namun isinya cukup untuk melepaskan dahaga setelah berolahraga. Kemasannya yang ramping juga mudah digenggam walaupun tangan berkeringat. Botol air mineral ', '62d39df0b3c8b.png'),
(8, 'Botol - 1500 ml', 'Botol air mineral Prim-A ukuran 1500 ml bisa dikonsumsi untuk seharian. Prim-A kemasan ini cocok dibawa saat bepergian jauh atau saat sedang melakukan aktivitas berat yang membutuhkan banyak minum.', '62d39e58eb024.png'),
(13, 'Galon - 19 Liter', 'Air mineral Prim-A galon 19 liter cocok untuk memenuhi kebutuhan sehari-hari. Prim-A ukuran ini biasanya dikonsumsi di rumah atau di kantor. Karena ukurannya yang besar, Prim-A galon ini bisa dinikmati bersama-sama.                                ', '62d39f4fb3d83.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_sosial-media`
--

CREATE TABLE `t_sosial-media` (
  `id_sosial_media` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_sosial-media`
--

INSERT INTO `t_sosial-media` (`id_sosial_media`, `nama`, `link`) VALUES
(1, 'Instagram', 'https://www.instagram.com/explore/locations/478949202153559/indonesia/bogor-indonesia/pt-tirta-purbalingga-adijaya-jln-olimpic-raya-blok-a6-sentul-bogor/?hl=id'),
(2, 'Glints', 'https://glints.com/id/companies/pt-sinar-sosro/91251a5c-fff6-4d17-99cf-135d41a9332a'),
(3, 'Linkedin', 'https://id.linkedin.com/company/pt.-sinar-sosro'),
(4, 'Twitter', 'https://mobile.twitter.com/sinarsosro');

-- --------------------------------------------------------

--
-- Table structure for table `t_testimoni`
--

CREATE TABLE `t_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `rating` int(3) NOT NULL,
  `testimoni` text NOT NULL,
  `narasumber` varchar(100) NOT NULL,
  `narasumber_profesi` varchar(100) NOT NULL,
  `narasumber_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_testimoni`
--

INSERT INTO `t_testimoni` (`id_testimoni`, `rating`, `testimoni`, `narasumber`, `narasumber_profesi`, `narasumber_foto`) VALUES
(2, 5, 'Kemasan cup inovatif, praktis digunakan saat acara seperti resepsi ', 'Muaya', 'Event Organizer', '62d3974dd13c0.png'),
(3, 2, 'Rasanya asin berdebu bau tanah dan terdapat minyak aneh', 'Duru', 'Mahasiswa', '62d3984f7c7ea.png'),
(4, 1, 'Plastik gampang melepuh jika terkena sinar matahari, plastik jadi slime', 'Darda', 'Pro Gamers', '62d398581ee0a.png'),
(6, 1, 'Harganya murah, tapi kualitasnya sesuai harga minuman kelas rendahan', 'Kehian', 'Carry Masyarakat', '62d39839bf5f8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `t_berita`
--
ALTER TABLE `t_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `t_penghargaan`
--
ALTER TABLE `t_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `t_sosial-media`
--
ALTER TABLE `t_sosial-media`
  ADD PRIMARY KEY (`id_sosial_media`);

--
-- Indexes for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penghargaan`
--
ALTER TABLE `t_penghargaan`
  MODIFY `id_penghargaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `t_sosial-media`
--
ALTER TABLE `t_sosial-media`
  MODIFY `id_sosial_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
