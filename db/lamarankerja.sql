-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 03:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamarankerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `ket_gaji` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `ket_gaji`) VALUES
(1, '< Rp 3.000.000'),
(2, 'Rp 3.000.000 - Rp 5.000.000'),
(3, 'Rp 5.000.000 - Rp. 10.000.000'),
(4, 'Rp 10.000.000 - Rp 25.000.000'),
(5, 'Rp 25.000.000 - Rp 50.000.000'),
(6, '> Rp 50.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `jenkel`
--

CREATE TABLE `jenkel` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenkel`
--

INSERT INTO `jenkel` (`id`, `jenis`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `lamar_pekerjaan`
--

CREATE TABLE `lamar_pekerjaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `posisi_id` int(11) NOT NULL,
  `file_data` varchar(120) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `cek` int(11) NOT NULL,
  `jenkel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamar_pekerjaan`
--

INSERT INTO `lamar_pekerjaan` (`id`, `nama`, `alamat`, `no_telp`, `email`, `perusahaan_id`, `posisi_id`, `file_data`, `status`, `cek`, `jenkel`) VALUES
(1, 'SYABAN', 'BANGKALAN', '085233408998', 'syabansim@gmail.com', 1, 2, 'aa59ed48e39c565f401f2dabf84fb5ee.pdf', 2, 0, 1),
(2, 'SYABAN', 'BANGKALAN', '085233408998', 'syabansim@gmail.com', 1, 4, 'b6fadc0b0cfbd409c395e8e1cdb2f292.pdf', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `perusahaan`) VALUES
(1, 'PT Jaya Usaha'),
(4, 'PT Maju'),
(7, 'PT Abadi'),
(11, 'PT Sentosa'),
(12, 'PT Darma'),
(14, 'PT Sudarmono');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `posisi` varchar(128) NOT NULL,
  `id_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id`, `posisi`, `id_gaji`) VALUES
(1, 'Manager', 5),
(2, 'Direktur', 4),
(3, 'Karyawan', 2),
(4, 'Cleaning Service', 1),
(5, 'Management', 3),
(6, 'HRD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profile_perusahaan`
--

CREATE TABLE `profile_perusahaan` (
  `id` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `quotes` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_perusahaan`
--

INSERT INTO `profile_perusahaan` (`id`, `id_perusahaan`, `visi`, `misi`, `gambar`, `quotes`, `about`) VALUES
(1, 1, 'Menjadi perusahaan terbaik dalam pengolahan Data se-Asia hingga Dunia.', 'Menjadi perusahaan yang menjadi panutan dalam pengolahan Data bagi perusahaan lain.', 'bg_3.jpg', 'Menjaga Integritas dan Kemanan Data Anda', 'PT Jaya Usaha merupakan perusahaan yang bergerak dibidang pengolahan Data dan Statistik untuk keperluan pengambilan keputusan baik bagi perusahaan besar maupun kecil.');

-- --------------------------------------------------------

--
-- Table structure for table `status_user`
--

CREATE TABLE `status_user` (
  `id` int(11) NOT NULL,
  `ket_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_user`
--

INSERT INTO `status_user` (`id`, `ket_status`) VALUES
(1, 'Menunggu'),
(2, 'Diterima'),
(3, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level_id` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `gambar`, `username`, `password`, `level_id`, `tgl_buat`) VALUES
(5, 'syaban', 'syabansim@gmail.com', 'sbn_sma.jpg', 'syaban', '$2y$10$478ts55kncoTgKYHt4bq0.OgS1RyNcefHfMgcdPh4L0lHsM3r7TTu', 3, 1575294363),
(7, 'PT Jaya Usaha', '', 'default.jpg', 'jayausaha', '$2y$10$xZnX6OZFEwD/1e4JlCBwSOtyKFHZMsET8YuUNGQ2hUyeCXiTaAO/i', 2, 1575338076),
(8, 'PT Maju', '', 'default.jpg', 'ptmaju', '$2y$10$5UMoQtR9qxfiR/e76B0tfOTEdrylKrwDPW6cDA42QSlmjPGLti1Pu', 2, 1575349999),
(9, 'PT Abadi', '', 'default.jpg', 'ptabadi', '$2y$10$6N7ArMO4l6T3DwYi9f0dZei8kMzoePT4pIBzoFEO2kG5vbdB9JIrW', 2, 1575350169),
(10, 'Admin', '', 'default.jpg', 'admin', '$2y$10$767Bljk87AuX8FfgmOqQueZM//HrCJFj6YT/2zayHftCRga9kx9Ym', 1, 1575713148),
(15, 'syaban', 'syabansim@ymail.com', 'default.jpg', 'syaban22', '$2y$10$04rrgTssAoWvPB1r3YQOKOdLnmzLaN3kJxL2I2wLQi7UEETu/UWYS', 3, 1576580641);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(4, 2, 2),
(5, 3, 3),
(25, 1, 4),
(42, 1, 3),
(45, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`) VALUES
(1, 'admin'),
(2, 'perusahaan'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Perusahaan'),
(3, 'User'),
(4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Home', 'user', 'fa fa-user fa-fw', 1),
(3, 3, 'My Profile', 'user/profile', 'fas fa-fw fa-user', 1),
(4, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'SubMenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 2, 'Detail Perusahaan', 'perusahaan', 'fa fa-fw fa-building', 1),
(9, 1, 'Level', 'admin/level', 'fas fa-fw fa-user-tie', 1),
(10, 3, 'Daftar Perusahaan', 'user/perusahaan', 'fas fa-fw fa-book', 1),
(11, 1, 'Perusahaan', 'admin/perusahaan', 'fas fa-fw fa-file', 1),
(12, 3, 'Lamar Pekerjaan', 'user/lamarPekerjaan', 'fas fa-fw fa-user-md', 0),
(13, 2, 'Posisi', 'perusahaan/posisi', 'fas fa-fw fa-address-book', 1),
(14, 2, 'List Pelamar', 'perusahaan/getPelamar', 'fas fa-fw fa-clipboard-list', 1),
(19, 1, 'User Lists', 'admin/getUserlist', 'fas fa-fw fa-user', 0),
(22, 3, 'Status', 'user/getStatus', 'fa fa-user fa-fw', 1),
(23, 2, 'Edit Profile', 'perusahaan/EditProfile', 'fa fa-user fa-fw', 1),
(24, 2, 'Preview Web', 'perusahaan/PreView', 'fa fa-fw fa-home', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenkel`
--
ALTER TABLE `jenkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamar_pekerjaan`
--
ALTER TABLE `lamar_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`),
  ADD KEY `posisi_id` (`posisi_id`),
  ADD KEY `status` (`status`),
  ADD KEY `jenkel` (`jenkel`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indexes for table `profile_perusahaan`
--
ALTER TABLE `profile_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `user_access_menu_ibfk_2` (`role_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenkel`
--
ALTER TABLE `jenkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lamar_pekerjaan`
--
ALTER TABLE `lamar_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profile_perusahaan`
--
ALTER TABLE `profile_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lamar_pekerjaan`
--
ALTER TABLE `lamar_pekerjaan`
  ADD CONSTRAINT `lamar_pekerjaan_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lamar_pekerjaan_ibfk_2` FOREIGN KEY (`posisi_id`) REFERENCES `posisi` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lamar_pekerjaan_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status_user` (`id`),
  ADD CONSTRAINT `lamar_pekerjaan_ibfk_4` FOREIGN KEY (`jenkel`) REFERENCES `jenkel` (`id`);

--
-- Constraints for table `posisi`
--
ALTER TABLE `posisi`
  ADD CONSTRAINT `posisi_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `gaji` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `profile_perusahaan`
--
ALTER TABLE `profile_perusahaan`
  ADD CONSTRAINT `profile_perusahaan_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `user_level` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `user_level` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
