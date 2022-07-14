-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 09:34 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
(3, 'dinda', 'a@tpa.com', 'ed2b1f468c5f915f3f1cf75d7068baae');

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
(1, '2022-07-14 04:23:06', 'Event', 'Mengumpulkan botol 300ml dan tukar dengan uang', 'Dapatkan kesempatan berlibur ke Bali dengan menukarkan 3 botol air mineral PrimA ke toko terdekat', ''),
(5, '2022-07-14 04:24:29', 'Pengumuman', 'Mengumpulkan botol 600ml dan tukar dengan uang', 'Dapatkan kesempatan uang 1 juta dengan menukarkan 3 botol air mineral PrimA ke toko terdekat', ''),
(7, '2022-07-14 04:27:39', 'Loker', 'Dicari Karyawan untuk pemantau gudang perusahaan', 'Persyaratan Pendaftaran : Laki-laki / Perempuan , Minimal lulusan S1 dan memiliki komitmen yang tinggi', '');

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
(1, 'International Organization for Standardization 22000', '2018-07-01', 'PT Tirta purbalingga adijaya berhasil mendapatkan sertifikasi ISO 2100                                ', ''),
(2, 'Perusahaan pemerhati lingkungan terbaik', '2019-09-01', 'Mendapatkan penghargaan dari pemerintah daerah purbalingga atas perhatian dan kepedulian kami terhadap lingkungan baik internal maupun eksternal perusahaan', ''),
(4, 'Pabrik dengan hustle culture terbaik di indonesia ', '2020-07-01', '', '');

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
(2, 'Botol - 1500 ml', 'Setiap tetes dalam air galon yang hadir di rumah merupakan komitmen kami untuk memberikan kemurnian 100% air mineral pegunungan berkualitas terbaik yang diambil langsung dari sumbernya. Setiap proses yang kami lakukan memastikan bahwa kebaikan alam sampai kepada Anda, tidak tersentuh dan tetap terjaga kemurniannya. Kami percaya bahwa kebaikan hidup dapat dimulai sejak membuka mata.                                                                ', 'https://drive.google.com/uc?export=view&id=1al9Xtp-Q-Sz_U8N41Rmuxr3EJMSs9Jkz'),
(3, 'Botol - 100 ml', 'Setiap tetes dalam air galon yang hadir di rumah merupakan komitmen kami untuk memberikan kemurnian 100% air mineral pegunungan berkualitas terbaik yang diambil langsung dari sumbernya. Setiap proses yang kami lakukan memastikan bahwa kebaikan alam sampai kepada Anda, tidak tersentuh dan tetap terjaga kemurniannya. Kami percaya bahwa kebaikan hidup dapat dimulai sejak membuka mata.                                                                                                ', 'https://drive.google.com/uc?export=view&id=1al9Xtp-Q-Sz_U8N41Rmuxr3EJMSs9Jkz'),
(4, 'Cup 150 ml', 'komposisi 100% air mineral alami', ''),
(8, 'aqua', 'Di dalam setiap botol AQUA Reflections terdapat kemurnian air mineral pegunungan berkualitas tinggi dan diproses dengan teknologi tercanggih. Kami berkomitmen untuk memberikan sebuah kesempurnaan dalam keseluruhan proses karena kami mengerti bahwa Anda hanya pantas mendapatkan air dengan kualitas terbaik.', 'https://drive.google.com/uc?export=view&id=16LfbhzVfumxuW08sCeSPHZg8ExEGlOkG');

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
(2, 5, 'Kemasan cup inovatif, praktis digunakan saat acara seperti resepsi ', 'Muaya', 'Event Organizer', ''),
(3, 2, 'Rasanya asin berdebu bau tanah dan terdapat minyak aneh', 'Duru', 'Mahasiswa', ''),
(4, 1, 'Plastik gampang melepuh jika terkena sinar matahari, plastik jadi slime', 'Darda', 'Pro Gamers', ''),
(5, 1, 'Harganya murah, tapi kualitasnya sesuai harga minuman kelas rendahan', 'Keihan', 'Carry Masyarakat', '');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_berita`
--
ALTER TABLE `t_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_penghargaan`
--
ALTER TABLE `t_penghargaan`
  MODIFY `id_penghargaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_testimoni`
--
ALTER TABLE `t_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
