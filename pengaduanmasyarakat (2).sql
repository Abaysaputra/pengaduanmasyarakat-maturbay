-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 06:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduanmasyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int(5) NOT NULL,
  `pengaduan` varchar(999) NOT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `gambar` varchar(123) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `pengaduan`, `tgl_pengaduan`, `gambar`, `id_pengguna`, `status`) VALUES
(135, 'ydhgjgkchggfxhhgjhfmhvggj', '2022-02-18', 'BG1.jpg', 21, 'Selesai'),
(136, 'fjbsb,ajbfushbnadbldcfsgsgdsgshshdsgsfsajabndbhjhvaghvdhvjhvjbvtdfyfjcggfjmhfhgfjhghgdxnhfhfdxghcjhajbajkndkjbchbadbjkbcfhvfhbsjbchfshcnbdnasbcbahbdcjbadjkhcvdvkacljfbdsblc', '2022-02-19', 'Admin.png', 21, 'Diproses'),
(137, 'hjalbasjvsgabhja', '2022-02-19', 'Avatar.png', 21, 'Diproses'),
(138, 'hvhjabdhcdajavhdvad', '2022-02-19', 'contoh 3.jpg', 21, 'Diproses'),
(139, 'jasjbahdvajgcdahdgahvdja', '2022-02-19', 'Admin.png', 21, 'Diterima'),
(140, 'hvajnahvdagdg,jagah', '2022-02-19', 'Admin.png', 21, 'Diterima'),
(143, 'havfjkkafhvashfasf', '2022-02-19', 'Avatar.png', 24, 'Selesai'),
(145, 'lkhjhfskfbsjf', '2022-03-13', 'Admin.png', 21, 'Diproses'),
(147, 'kskdsmkmakdkmkmskmmkmkmkmmmkkm', '2022-03-15', 'Avatar.png', 21, 'Selesai'),
(150, 'adadakdal', '2022-11-04', 'Screenshot_20221102_113521.png', 27, 'Diterima'),
(151, 'anu', '2023-01-26', 'dimas1.jpeg', 29, 'Selesai'),
(152, 'Jalan di gayam gronjal gronjal', '2023-01-26', '2021-11-26.jpg', 30, 'Selesai'),
(158, 'Thamrin meh enek festival jo kyok e', '2023-02-04', 'BG1.jpg', 1, 'Selesai'),
(159, 'aku lesu', '2023-02-06', 'bgm.jpg', 29, 'Selesai'),
(160, 'Gabut oi', '2023-02-13', 'contoh 3.jpg', 27, 'Diterima'),
(161, 'Tutor Pro kak', '2023-02-26', 'Screenshot 2022-11-09 131507.png', 29, 'Selesai'),
(162, 'Aku sakit', '2023-02-26', '2021-11-26.jpg', 31, 'Selesai'),
(163, 'sacca', '2023-02-27', 'dimas1.jpeg', 44, 'Selesai'),
(164, 'diproses', '2023-02-27', 'dimas3.jpeg', 44, 'Diterima'),
(165, 'Selesai', '2023-02-27', '2021-11-26.jpg', 44, 'Selesai'),
(166, 'yguyhj', '2023-03-01', 'dimas3.jpeg', 29, 'Diterima'),
(167, 'aww', '2023-03-03', 'dimas3.jpeg', 29, 'Diterima'),
(168, 'asas', '2023-03-05', 'PXL_20220516_050028853.NIGHT.jpg', 33, 'Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(5) NOT NULL,
  `nik` int(9) NOT NULL,
  `nama` varchar(123) NOT NULL,
  `level` varchar(15) NOT NULL,
  `Status` varchar(123) NOT NULL,
  `no_hp` varchar(112) NOT NULL,
  `username` varchar(123) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nik`, `nama`, `level`, `Status`, `no_hp`, `username`, `password`) VALUES
(1, 1, 'Admin', 'Admin', 'Petugas/pengatur web dan data pengaduan', '085561835330', 'admin', 'admin'),
(21, 159781232, 'Dimas', 'User', 'Masyarakat', '087346157861', 'idk', '12345'),
(24, 1535367333, 'Riski', 'User', 'Masyarakat', '0866757487', '111', '54321'),
(27, 9, 'kok', 'User', 'Masyarakat', '12', 'ok', 'ok'),
(28, 9, 'adsadadasds', 'User', 'Masyarakat', '12123423', 'sui', '1'),
(29, 1212, 'adi', 'User', 'Masyarakat', '11111', 'adi', '1'),
(30, 2147483647, 'abay', 'User', 'Masyarakat', '085850503992', 'abaysaputra', '123'),
(31, 2147483647, 'Novi Dwi Arianti', 'User', 'Masyarakat', '082141365006', 'novi', '123'),
(33, 21, 'awakdewe', 'User', 'Masyarakat', '082141365006', 'test', '1'),
(34, 212, 'ac', 'User', 'Masyarakat', 'w', '12', '1'),
(35, 2121, 's', 'User', 'Masyarakat', 'w2', 'w', 'q'),
(36, 2121, 's', 'User', 'Masyarakat', 'w2', 'w', 'q'),
(37, 2121, 's', 'User', 'Masyarakat', 'w2', 'w', 'q'),
(38, 2121, 's', 'User', 'Masyarakat', 'w2', 'w', 'q'),
(39, 221, 'wd', 'User', 'Masyarakat', 'dwq', 'qdw', 'dwq'),
(40, 2121, 'dwq', 'User', 'Masyarakat', 'qwd', 'qwd', 'dwq'),
(41, 21, '2d', 'User', 'Masyarakat', 'd2', 'd2', 'd2'),
(42, 1212, '1qdw', 'User', 'Masyarakat', 'csaasc', 'acsxac', 'acsac'),
(43, 2, 'wdq', 'User', 'Masyarakat', 'sa', 'sc', 'sc'),
(44, 111, '1', 'User', 'Masyarakat', '1', '1', '1'),
(45, 212, 'sxa', 'User', 'Masyarakat', 'axs', 'asxz', 'sxz'),
(46, 21, 'wqd', 'User', 'Masyarakat', '1111', 'wdq', 'cs'),
(47, 21, 'wqd', 'User', 'Masyarakat', '1111', 'wdq', 'cs'),
(48, 122, 'dwq', 'User', 'Masyarakat', '2121', '112', '112'),
(50, 2121, 'csaasc', 'User', 'Masyarakat', '1313131', 'wq', 'd21'),
(51, 21, 'sxa', 'User', 'Masyarakat', 'sawa', 'wsca', 'as'),
(52, 212, 'wq', 'User', 'Masyarakat', 'dwq', 'dwq', 'wdq'),
(53, 21, '2wqs', 'User', 'Masyarakat', 'as', 'das', 'as'),
(54, 2147483647, 'Abay', 'User', 'Masyarakat', '272727', 'Sofyan', '1'),
(59, 2121, 'adi', 'User', 'Masyarakat', '12999', 'adiio', '2919'),
(60, 22, 'wq', 'User', 'Masyarakat', 'wq', 'ws', 'ws'),
(62, 12, 'aade', 'User', 'Masyarakat', '1313131a', 'afaf', 'afaff'),
(67, 3222, 'qws', 'User', 'Masyarakat', 'aq', 'qws', 'qws'),
(69, 12, '13', 'User', 'Masyarakat', 'ad', 'ad', 'adad'),
(70, 12, '13', 'User', 'Masyarakat', 'ad', 'ad', 'adad'),
(71, 12, '13', 'User', 'Masyarakat', 'ad', 'ad', 'adad'),
(72, 322121, 'Testing', 'User', 'Masyarakat', '0983988', 'test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_respon`
--

CREATE TABLE `tb_respon` (
  `id_respon` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `respon` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `nik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_respon`
--

INSERT INTO `tb_respon` (`id_respon`, `id_pengaduan`, `id_pengguna`, `respon`, `date`, `nik`) VALUES
(568, 135, 1, ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus ipsam modi delectus error totam dolore, molestiae culpa quaerat, animi nisi aliquid sint? Iusto eveniet accusamus a soluta cum consectetur excepturi.', '2022-03-19 08:54:06', NULL),
(569, 147, NULL, 'asdsadads', '2022-03-19 09:00:38', 159781232),
(570, 147, 1, 'soksodoskdo', '2022-03-19 09:05:59', NULL),
(571, 149, NULL, 'Jalan Desa Sukorejo berlubang kapan bisa ditanggapi ', '2022-03-20 01:17:22', 159781232),
(572, 149, 1, 'Kami akan secepatnya mangatasi masalah tersebut', '2022-03-20 01:26:23', NULL),
(573, 152, 1, 'Otw diaspalt masseh', '2023-01-26 16:02:28', NULL),
(574, 151, NULL, 'piye min', '2023-01-26 16:08:15', 1212),
(575, 151, 1, 'seng sabar masseh', '2023-01-26 16:09:02', NULL),
(576, 151, NULL, 'okeh min dang digarap', '2023-01-26 16:09:17', 1),
(577, 151, 1, 'shap', '2023-01-26 16:09:29', NULL),
(578, 151, NULL, 'as', '2023-01-26 16:09:39', 1),
(579, 151, 1, 'okeh\r\n', '2023-01-27 02:37:38', NULL),
(580, 147, 1, 'dfssfd', '2023-01-27 10:45:46', NULL),
(581, 151, NULL, 'asas', '2023-01-27 11:40:39', 1212),
(582, 155, NULL, 'pie min', '2023-02-01 07:05:52', 1212),
(583, 155, 1, 'santai masseh\r\n', '2023-02-01 07:08:27', NULL),
(584, 151, NULL, 'dw', '2023-02-04 04:16:08', 1212),
(585, 151, NULL, 'piye e\r\n', '2023-02-04 04:16:29', 1212),
(586, 151, 1, 'Sek santai', '2023-02-04 04:17:08', NULL),
(587, 151, NULL, 'Oke lurr', '2023-02-04 04:17:21', 1),
(588, 156, 1, 'ac', '2023-02-05 07:40:51', NULL),
(589, 156, 1, 'dc', '2023-02-05 07:40:55', NULL),
(590, 158, 1, 'ww', '2023-02-06 02:12:55', NULL),
(591, 158, 1, 'sa', '2023-02-06 02:14:08', NULL),
(592, 158, 1, 'as', '2023-02-06 02:15:23', NULL),
(593, 158, 1, 'aku sayang novi dwi arianti', '2023-02-06 03:31:30', NULL),
(594, 158, 1, 'csa', '2023-02-06 03:36:25', NULL),
(595, 158, 1, 'w', '2023-02-06 03:41:39', NULL),
(596, 158, 1, 'wq', '2023-02-06 03:41:44', NULL),
(597, 158, 1, 'dqed', '2023-02-06 03:42:00', NULL),
(598, 158, 1, 'w', '2023-02-06 03:42:33', NULL),
(599, 158, 1, 'wq', '2023-02-06 03:42:36', NULL),
(600, 158, 1, 'as', '2023-02-06 03:42:45', NULL),
(601, 158, 1, 'as', '2023-02-06 03:42:48', NULL),
(602, 158, 1, 'as', '2023-02-06 03:42:52', NULL),
(603, 151, NULL, 'ca', '2023-02-06 03:43:54', 1212),
(604, 156, 1, 'ac', '2023-02-06 03:44:39', NULL),
(605, 157, 1, 'sca', '2023-02-06 03:45:53', NULL),
(606, 159, NULL, 'mj\r\n', '2023-02-06 03:47:16', 1212),
(607, 159, NULL, 'pripun min', '2023-02-06 03:47:24', 1212),
(608, 159, 1, 'oke\r\n', '2023-02-06 04:17:33', NULL),
(609, 159, 1, 'asc', '2023-02-06 08:05:15', NULL),
(610, 159, 1, 'wqwxa', '2023-02-06 08:22:41', NULL),
(611, 159, 1, 'dd', '2023-02-06 08:26:35', NULL),
(612, 156, 1, 'sac', '2023-02-06 14:00:24', NULL),
(613, 159, NULL, '0o\r\n', '2023-02-06 18:34:51', 1212),
(614, 157, 1, 'vsv', '2023-02-08 02:59:37', NULL),
(615, 156, 1, 'qwddwq', '2023-02-09 14:30:06', NULL),
(616, 156, 1, 'ce', '2023-02-12 13:03:39', NULL),
(617, 161, 1, 'Belajar terus dek\r\n', '2023-02-26 04:18:04', NULL),
(618, 162, 1, 'test', '2023-02-28 07:44:25', NULL),
(619, 166, NULL, 'gas', '2023-03-02 03:51:41', 1212),
(620, 166, 1, 'Laporan anda segera diproses Harap tunggu!!!', '2023-03-02 05:40:39', NULL),
(621, 166, NULL, 'Oke Min :<', '2023-03-02 05:40:53', 1212),
(622, 138, 1, 'Terima Kasih,Laporan kamu akan segera kami proses', '2023-03-02 13:31:56', NULL),
(623, 138, NULL, 'Baik Min ', '2023-03-02 13:33:22', 159781232),
(624, 138, 1, 'Laporan sudah kami ajukan,kami anggap selesai yaa \r\nHappy Good day', '2023-03-02 13:33:58', NULL),
(625, 138, NULL, 'Siap min Terima kasih', '2023-03-02 13:34:10', 159781232),
(626, 167, NULL, 'sfv', '2023-03-04 14:33:43', 1212),
(627, 158, 1, 'asc', '2023-03-04 18:56:10', NULL),
(628, 163, 1, 'sa', '2023-03-06 06:16:06', NULL),
(629, 163, 1, 'sa', '2023-03-06 06:16:10', NULL),
(630, 163, 1, 'oioioioiioi', '2023-03-06 06:16:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_respon`
--
ALTER TABLE `tb_respon`
  ADD PRIMARY KEY (`id_respon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_respon`
--
ALTER TABLE `tb_respon`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
