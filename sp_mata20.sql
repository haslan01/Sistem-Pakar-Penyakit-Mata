-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 03:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_mata20`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `no` int(11) NOT NULL,
  `kodegejala` varchar(5) NOT NULL,
  `namagejala` varchar(50) NOT NULL,
  `nilai` float NOT NULL,
  `kodepenyakit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`no`, `kodegejala`, `namagejala`, `nilai`, `kodepenyakit`) VALUES
(1, 'G01', 'Mata merah?', 0.6, 'P01'),
(2, 'G02', 'Mata terasa gatal dan terasa berpasirl', 0.5, 'P02'),
(3, 'G03', 'Mata terasa sakit atau perih', 0.6, 'P03'),
(4, 'G04', 'Kelopak mata bengkak', 0.6, 'P03'),
(5, 'G05', 'Mata berair', 0.7, 'P04'),
(6, 'G06', 'Keluar cairan berwarna hijau atau putih dari mata', 0.5, 'P05'),
(7, 'G07', 'Kelopak mata terasa gatal', 0.7, 'P03'),
(8, 'G08', 'Mata sering mengeluarkan kotoran', 0.7, 'P03'),
(9, 'G09', 'Pandangan kabur seperti berkabut', 0.6, 'P02'),
(10, 'G010', 'melihat lingkaran disekeliling cahaya', 0.5, 'P01'),
(11, 'G011', 'Mata mengeluarkan nanah', 0.6, 'P02'),
(12, 'G012', 'Pandangan ganda', 0.4, 'P01');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_diagnosa`
--

CREATE TABLE `laporan_diagnosa` (
  `id_laporan` int(5) NOT NULL,
  `tgl_diagnosa` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `nilai_bayes` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_diagnosa`
--

INSERT INTO `laporan_diagnosa` (`id_laporan`, `tgl_diagnosa`, `nama`, `tgl_lahir`, `jk`, `kelas`, `penyakit`, `nilai_bayes`) VALUES
(1, '2022-08-11', 'fikri', '2022-08-17', 'Laki - Laki', '2', 'Bullying Fisik', '30.8628251'),
(2, '2022-08-21', '', '0000-00-00', '', '', 'Bullying Fisik', '36'),
(3, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36'),
(4, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36'),
(5, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36'),
(6, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36'),
(7, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36'),
(8, '2023-01-19', 'aslan', '2023-01-03', 'Laki - Laki', '', 'Bullying Fisik', '36');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `no` int(5) NOT NULL,
  `kodepenyakit` varchar(5) NOT NULL,
  `namapenyakit` varchar(50) NOT NULL,
  `pengobatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`no`, `kodepenyakit`, `namapenyakit`, `pengobatan`) VALUES
(1, 'P01', 'Konjungtivitis', 'Mencuci tangan secara rutin dan tidak menyentuh mata secara langsung, terutama setelah bersalaman atau menyentuh penderita konjungtivitis, Tidak berbagi pemakaian kosmetik atau barang pribadi, seperti handuk, dengan orang lain\r\nTidak menggunakan obat'),
(2, 'P02', 'Blefaritis', 'Penderita blefaritis bisa mengompres mata dengan kompres basah yang hangat minimal selama 1 menit. Cara ini bertujuan untuk melunakkan kerak kotoran mata dan mencegah endapan minyak di kelopak mata. Penderita juga bisa membersihkan kelopak mata mengg'),
(3, 'P03', 'Dry Eye', 'Menjaga agar mata tidak secara langsung terkena angin dari pendingin ruangan, kipas angin, atau pengering rambut\r\nBerkedip secara teratur jika sedang membaca atau melihat layar komputer dalam jangka waktu yang lama\r\nMengistirahatkan mata atau memejam'),
(13, 'P04', 'Katarak', 'Memeriksakan mata secara teratur pada dokter spesialis mata.\r\nMelindungi mata dari benturan dan cahaya matahari yang terlalu lama, dengan menggunakan kacamata yang melindungi dari sinar ultraviolet baik UVA dan UVB.\r\nKelola masalah kesehatan lain, se'),
(14, 'P05', 'Ulkus Kornea', 'Mencuci tangan dan memastikan tangan kering sebelum menyentuh lensa\r\nTidak menggunakan air keran untuk membersihkan lensa kontak\r\nTidak menggunakan air liur untuk membersihkan lensa, karena air liur mengandung bakteri yang dapat melukai kornea\r\nMelep');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'ucup', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbpasien`
--

CREATE TABLE `tbpasien` (
  `idpasien` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `namaorangtua` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpasien`
--

INSERT INTO `tbpasien` (`idpasien`, `nama`, `kelamin`, `umur`, `alamat`, `noip`, `tanggal`, `pekerjaan`, `namaorangtua`) VALUES
(47, 'ridwan', 'Laki-laki', '3', 'Jogja', '::1', '2020-04-20', '', 'Jamila'),
(46, 'Ridwan', 'Laki-laki', '3', 'Jogja', '::1', '2020-04-14', '', 'Jamila'),
(45, 'Ridwan', 'Laki-laki', '3', 'Jogja', '::1', '2020-04-13', '', 'Jamila'),
(44, 'ridwan', 'Laki-laki', '3', 'Jogja', '::1', '2020-04-13', '', 'Jamila'),
(48, 'wqeqw', 'Wanita', '4', 'fddsf', '::1', '2022-10-09', '', 'sdfsdf'),
(49, 'wqeqw', '0', '4', 'dfsdfs', '::1', '2022-10-09', '', 'rtrtrt'),
(50, 'wqeqw', 'Laki-laki', '4', 'rtert', '::1', '2022-10-09', '', 'rterte'),
(51, 'as', 'Laki-laki', '4', 'sdas', '::1', '2022-10-11', '', 'dsad'),
(52, '45dfgd', '0', '34', 'hdfgncvn', '::1', '2022-10-26', '', 'dfhdfhd'),
(53, 'gdfgere', 'Laki-laki', '45', 'ghfgh', '::1', '2022-10-26', '', '4yydfy'),
(54, '45dfgd', 'Laki-laki', '45', '342sdgs', '::1', '2022-10-26', '', 'dfjhdfyd'),
(55, 'jfghj', 'Wanita', '56', 'dfgvbd', '::1', '2022-10-26', '', 'shsjfsf'),
(56, '45dfgd', 'Laki-laki', '56', 'gavadfga', '::1', '2022-10-26', '', 'cgsdfsd'),
(57, '45dfgd', 'Laki-laki', '56', 'gavadfga', '::1', '2022-10-26', '', 'cgsdfsd'),
(58, 'erte', 'Laki-laki', '56', 'sdfgsdhs', '::1', '2022-10-26', '', 'dfhdfhd'),
(59, 'jhjhkjdf', 'Laki-laki', '67', 'hsgfjhgjfg', '::1', '2022-10-26', '', 'dfhdjgfj'),
(60, '45dfgd', 'Wanita', '78', 'fghdfhdf', '::1', '2022-10-26', '', 'sd ndrajr'),
(61, 'rtyr', 'Wanita', '56', 'fgsfg', '::1', '2022-10-26', '', 'dfgsfgds'),
(62, 'nai', 'Laki-laki', '65', 'campa', '::1', '2022-10-26', '', 'cicci'),
(63, 'cvghjfg', 'Wanita', '45', 'fgjdfgj', '::1', '2022-10-26', '', 'dgsdfgs'),
(64, 'dfhdf', 'Laki-laki', '34', 'fhsfhsfdh', '::1', '2022-10-26', '', 'vgjkhgjk'),
(65, 'DFSDFS', 'Laki-laki', '45', 'FGSDFGD', '::1', '2022-10-26', '', 'ghjghjdg'),
(66, '454cvbdf', 'Laki-laki', '45', 'dfghsfh', '::1', '2022-10-27', '', 'gfjfghdf'),
(67, 'anti', 'Laki-laki', '56', 'dgsfhs', '::1', '2022-10-27', '', 'dsgadgadhgjg'),
(68, '45dfgd', 'Laki-laki', '34', 'hdfgncvn', '::1', '2022-10-27', '', 'eryey'),
(69, 'sdfgsdfg', 'Laki-laki', '34', 'dfgsdfg', '::1', '2022-10-27', '', 'ghkmfghhfadg'),
(70, 'anti', 'Laki-laki', '23', 'mambi', '::1', '2022-10-28', '', 'kaci'),
(71, 'dandi', 'Laki-laki', '23', 'sdghhzfz', '::1', '2022-10-28', '', 'xfdjdfhdfsdf'),
(72, 'alan', 'Laki-laki', '22', 'polman', '::1', '2022-10-28', '', 'cici'),
(73, 'gdfgddh', 'Laki-laki', '45', 'rhadfher', '::1', '2022-10-29', '', 'tustyeyue'),
(74, 'gdfgser', 'Laki-laki', '45', 'dfhsfhd', '::1', '2022-10-30', '', 'sdgDtst'),
(75, 'sdfas', 'Wanita', '43', 'fddgs', '::1', '2022-10-30', '', 'dfgsdftg'),
(76, 'djasgjkdghsj', 'Laki-laki', '56', 'sdbfkjadshkf', '::1', '2022-11-01', '', 'jhfklashdkfja'),
(77, 'FGHFG', 'Laki-laki', '34', 'DFHSFH', '::1', '2022-11-16', 'dfhdf', ''),
(78, 'YTDRE', 'Laki-laki', '45', 'FGHFGHDF', '::1', '2022-11-21', 'dfhdfhd', ''),
(79, 'anti', 'Laki-laki', '23', 'dgsdszd', '::1', '2022-11-22', 'fnxfxf', ''),
(80, 'dterte', 'Laki-laki', '45', 'dfghdfgd', '::1', '2022-11-25', 'afaf', ''),
(81, 'dterte', 'Wanita', '34', 'sedfasdfa', '::1', '2022-12-14', '', 'gsdfgsd'),
(82, 'dterte', 'Laki-laki', '32', '23safas', '::1', '2022-12-14', '', 'xvzxczx'),
(83, 'dterte', 'Laki-laki', '45', 'dfghdfgd', '::1', '2022-12-14', '', 'reyefg'),
(84, 'dterte', 'Laki-laki', '34', 'dfghdfgd', '::1', '2022-12-14', '', 'sdas'),
(85, 'asasfa', 'Laki-laki', '23', 'sdfsadga', '::1', '2022-12-15', 'asfagdg', ''),
(86, 'asasfa', 'Wanita', '23', 'sdasda', '::1', '2022-12-16', '', 'fewe'),
(87, 'sdfsdfs', 'Laki-laki', '45', 'dsadasda', '::1', '2022-12-21', '', 'xczxcx'),
(88, 'dfs', 'Wanita', '34', 'ewerwwe', '::1', '2023-01-17', '', 'dsfsd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idadmin` int(3) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE `tb_gejala` (
  `id` int(11) NOT NULL,
  `kdgejala` varchar(3) DEFAULT NULL,
  `gejala` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id`, `kdgejala`, `gejala`) VALUES
(11, 'G11', 'Mata mengeluarkan nanah'),
(10, 'G10', 'melihat lingkaran disekeliling cahaya'),
(9, 'G9', 'Pandangan kabur seperti berkabut'),
(8, 'G8', 'Mata sering mengeluarkan kotoran'),
(7, 'G7', 'Kelopak mata terasa gatal'),
(5, 'G5', 'Mata berair'),
(6, 'G6', 'Keluar cairan berwarna hijau atau putih dari mata'),
(4, 'G4', 'Kelopak mata bengkak'),
(2, 'G2', 'Mata terasa gatal dan terasa berpasir'),
(3, 'G3', 'Mata terasa sakit atau perih'),
(1, 'G1', 'Mata merah'),
(12, 'G12', 'Pandangan ganda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `idhasil` int(5) NOT NULL,
  `idpasien` int(5) NOT NULL,
  `kdpenyakit` varchar(4) NOT NULL,
  `persentase` double NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`idhasil`, `idpasien`, `kdpenyakit`, `persentase`, `tanggal`) VALUES
(182, 64, 'P5', 99.2, '2022-10-26 19:58:29'),
(253, 70, 'P5', 10.49, '2022-10-28 21:42:38'),
(254, 70, 'P2', 16.07, '2022-10-28 21:42:38'),
(255, 70, 'P3', 19.92, '2022-10-28 21:43:51'),
(256, 70, 'P2', 44.67, '2022-10-28 21:43:51'),
(257, 71, 'P3', 40.91, '2022-10-28 21:53:42'),
(258, 72, 'P3', 76.43, '2022-10-28 22:00:35'),
(259, 72, 'P3', 76.43, '2022-10-28 22:10:07'),
(260, 73, 'P3', 76.43, '2022-10-29 13:24:14'),
(261, 74, 'P3', 76.43, '2022-10-30 12:03:12'),
(262, 75, 'P2', 97.3, '2022-10-30 12:32:46'),
(263, 75, 'P2', 97.3, '2022-10-30 12:37:58'),
(264, 76, 'P2', 41.18, '2022-11-01 09:59:07'),
(265, 77, 'P3', 91.53, '2022-11-16 18:32:49'),
(266, 77, 'P5', 5.93, '2022-11-16 18:32:49'),
(267, 87, 'P1', 49, '2022-12-21 05:54:58'),
(268, 87, 'P1', 49, '2022-12-21 05:55:08'),
(269, 87, 'P4', 75.21, '2022-12-21 05:55:40'),
(270, 87, 'P5', 17.36, '2022-12-21 05:55:40'),
(271, 87, 'P4', 75.21, '2022-12-21 05:56:49'),
(272, 87, 'P5', 17.36, '2022-12-21 05:56:49'),
(273, 87, 'P4', 75.21, '2022-12-21 05:57:05'),
(274, 87, 'P5', 17.36, '2022-12-21 05:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE `tb_penyakit` (
  `id` int(11) NOT NULL,
  `kdpenyakit` varchar(3) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `definisi` text DEFAULT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id`, `kdpenyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
(1, 'P1', 'Konjungtivitis', 'Konjungtivitis (mata merah) adalah peradangan atau infeksi pada selaput transparan (konjungtiva) yang melapisi kelopak mata, dan menutupi bagian putih bola mata.', 'Mencuci tangan secara rutin dan tidak menyentuh mata secara langsung, terutama setelah bersalaman atau menyentuh penderita konjungtivitis, Tidak berbagi pemakaian kosmetik atau barang pribadi, seperti handuk, dengan orang lain\r\nTidak menggunakan obat tetes mata yang pernah dipakai untuk mata merah, guna menghindari penularan virus atau bakteri'),
(3, 'P3', 'Blefaritis', 'Blefaritis merupakan adanya penyumbatan pada kelenjar minyak yang terletak pada bagian dasar bulu mata yang menimbulkan merahnya mata dan iritasi.', 'Penderita blefaritis bisa mengompres mata dengan kompres basah yang hangat minimal selama 1 menit. Cara ini bertujuan untuk melunakkan kerak kotoran mata dan mencegah endapan minyak di kelopak mata. Penderita juga bisa membersihkan kelopak mata menggunakan sampo bayi dan air hangat.'),
(2, 'P2', 'Dry Eye', 'Dry Eye (Mata Kering) adalah kondisi ketika permukaan kornea dan konjungtiva mengalami kekeringan akibat air mata tidak dapat melumasi mata dengan baik.', 'Menjaga agar mata tidak secara langsung terkena angin dari pendingin ruangan, kipas angin, atau pengering rambut\r\nBerkedip secara teratur jika sedang membaca atau melihat layar komputer dalam jangka waktu yang lama\r\nMengistirahatkan mata atau memejamkan mata sebentar ketika bekerja dengan komputer atau menatap handphone\r\nMenggunakan pelembap udara di rumah atau di kantor\r\nMemakai kacamata hitam jika berada di luar ruangan, agar tidak terlalu banyak terpapar matahari dan udara kering\r\nMenghindari lingkungan yang lebih kering dari biasanya\r\nMinum air yang cukup\r\nTidur yang cukup dan teratur'),
(4, 'P4', 'Katarak', 'Katarak merupakan adanya kekeruhan pada lensa mata yang menyebabkan pandangan kabur, pada umumnya katarak menyerang lansia dan katarak dapat\r\nterjadi hanya pada sebelah mata ataupun kedua mata sekaligus.', 'Memeriksakan mata secara teratur pada dokter spesialis mata.\r\nMelindungi mata dari benturan dan cahaya matahari yang terlalu lama, dengan menggunakan kacamata yang melindungi dari sinar ultraviolet baik UVA dan UVB.\r\nKelola masalah kesehatan lain, seperti diabetes yang bisa meningkatkan risiko katarak.\r\nMembatasi kebiasaan menyetir di malam hari.\r\nMemperbaiki pencahayaan di rumah.\r\nMenggunakan kaca pembesar saat membaca.\r\nBerhenti merokok dan kurangi konsumsi alkohol\r\nTerapkan pola makan dengan memperbanyak buah-buahan dan sayuran.'),
(5, 'P5', 'Ulkus Kornea', 'lkus Kornea adalah suatu kondisi ketika terdapat luka terbuka pada kornea. Umumnya, hal ini disebabkan oleh infeksi pada kornea yang dikenal dengan\r\nistilah keratitis.', 'Mencuci tangan dan memastikan tangan kering sebelum menyentuh lensa\r\nTidak menggunakan air keran untuk membersihkan lensa kontak\r\nTidak menggunakan air liur untuk membersihkan lensa, karena air liur mengandung bakteri yang dapat melukai kornea\r\nMelepas lensa kontak sebelum tidur\r\nMelepas lensa kontak apabila terjadi iritasi mata dan tidak memakainya sebelum mata sembuh\r\nMembersihkan lensa kontak sebelum dan setelah dipakai\r\nMengganti lensa kontak sesuai waktu yang dianjurkan dokter');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rules`
--

CREATE TABLE `tb_rules` (
  `id_problem` int(11) DEFAULT NULL,
  `id_evidence` int(11) DEFAULT NULL,
  `cf` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rules`
--

INSERT INTO `tb_rules` (`id_problem`, `id_evidence`, `cf`) VALUES
(1, 6, 0.7),
(1, 4, 0.7),
(2, 1, 0.7),
(5, 11, 0.7),
(5, 5, 0.7),
(3, 5, 0.7),
(3, 4, 0.7),
(3, 2, 0.7),
(4, 12, 0.7),
(4, 10, 0.7),
(3, 7, 0.7),
(2, 8, 0.7),
(2, 3, 0.7),
(4, 9, 0.7),
(2, 2, 0.7),
(1, 3, 0.7),
(1, 2, 0.7),
(1, 1, 0.7),
(5, 4, 0.7),
(5, 2, 0.7),
(5, 1, 0.7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `laporan_diagnosa`
--
ALTER TABLE `laporan_diagnosa`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`idhasil`);

--
-- Indexes for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `laporan_diagnosa`
--
ALTER TABLE `laporan_diagnosa`
  MODIFY `id_laporan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbpasien`
--
ALTER TABLE `tbpasien`
  MODIFY `idpasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_gejala`
--
ALTER TABLE `tb_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `idhasil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `tb_penyakit`
--
ALTER TABLE `tb_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
