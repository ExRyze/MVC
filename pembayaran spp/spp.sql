-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2023 at 03:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delKelas` (IN `in_id_kelas` INT(11))   BEGIN
	DELETE FROM kelas WHERE kelas.id_kelas = in_id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delPembayaran` (IN `in_id_pembayaran` INT(11))   BEGIN
	DELETE FROM pembayaran WHERE pembayaran.id_pembayaran = in_id_pembayaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delPengguna` (IN `in_id_pengguna` INT(11))   BEGIN
	DELETE FROM pengguna WHERE pengguna.id_pengguna = in_id_pengguna;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delTransaksi` (IN `in_id_transaksi` INT(11))   BEGIN
	DELETE FROM transaksi WHERE transaksi.id_transaksi = in_id_transaksi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getKelas` (IN `in_nama_kelas` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
	SELECT * FROM kelas WHERE kelas.nama_kelas = in_nama_kelas && kelas.kompetensi_keahlian = in_kompetensi_keahlian;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPembayaran` (IN `in_tahun_ajaran` VARCHAR(9), IN `in_nominal` INT(11))   BEGIN
	SELECT * FROM pembayaran WHERE pembayaran.tahun_ajaran = in_tahun_ajaran && pembayaran.nominal = in_nominal;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPetugas` (IN `in_username` VARCHAR(25), IN `in_nama_petugas` VARCHAR(50))   BEGIN
	SELECT * FROM petugas a INNER JOIN pengguna p ON a.pengguna_id = p.id_pengguna WHERE a.nama_petugas = in_nama_petugas && p.username = in_username;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSiswa` (IN `in_nisn` INT(10), IN `in_nis` INT(5))   BEGIN
	SELECT * FROM siswa WHERE siswa.nisn = in_nisn && siswa.nis = in_nis;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTransaksi` (IN `in_siswa_id` INT(11), IN `in_bulan_dibayar` VARCHAR(9), IN `in_tahun_dibayar` INT(4))   BEGIN
	SELECT * FROM transaksi WHERE transaksi.siswa_id = in_siswa_id && transaksi.bulan_dibayar = in_bulan_dibayar && transaksi.tahun_dibayar = in_tahun_dibayar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insKelas` (IN `in_nama_kelas` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
	INSERT INTO kelas VALUES (null, in_nama_kelas, in_kompetensi_keahlian);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insPembayaran` (IN `in_tahun_ajaran` VARCHAR(9), IN `in_nominal` INT(11))   BEGIN
	INSERT INTO pembayaran VALUES (null, in_tahun_ajaran, in_nominal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insPengguna` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128), IN `in_role` ENUM('admin','petugas','siswa'))   BEGIN
	INSERT INTO pengguna VALUES (null, in_username, in_password, in_role);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insPetugas` (IN `in_nama_petugas` VARCHAR(50))   BEGIN
	INSERT INTO petugas VALUES (null, in_nama_petugas, LAST_INSERT_ID());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insSiswa` (IN `in_nisn` INT(10), IN `in_nis` INT(5), IN `in_nama_siswa` VARCHAR(50), IN `in_telepon` VARCHAR(14), IN `in_alamat` TEXT, IN `in_kelas_id` INT(11), IN `in_pembayaran_id` INT(11))   BEGIN
	INSERT INTO siswa VALUES (null, in_nisn, in_nis, in_nama_siswa, in_telepon, in_alamat, in_kelas_id, LAST_INSERT_ID(), in_pembayaran_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insTransaksi` (IN `in_tanggal_bayar` DATETIME, IN `in_bulan_dibayar` VARCHAR(9), IN `in_tahun_dibayar` INT(4), IN `in_siswa_id` INT(11), IN `in_petugas_id` INT(11), IN `in_pembayaran_id` INT(11))   BEGIN
	INSERT INTO transaksi VALUES (null, in_tanggal_bayar, in_bulan_dibayar, in_tahun_dibayar, in_siswa_id, in_petugas_id, in_pembayaran_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logPengguna` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128))   BEGIN
	SELECT * FROM pengguna WHERE pengguna.username = in_username && pengguna.password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logPetugas` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128))   BEGIN
	SELECT * FROM pengguna p
    INNER JOIN petugas a ON a.pengguna_id = p.id_pengguna
    WHERE p.username = in_username && p.password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `logSiswa` (IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128))   BEGIN
	SELECT * FROM pengguna p
    INNER JOIN siswa s ON s.pengguna_id = p.id_pengguna
    WHERE p.username = in_username && p.password = in_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updKelas` (IN `in_id_kelas` INT(11), IN `in_nama_kelas` VARCHAR(10), IN `in_kompetensi_keahlian` VARCHAR(50))   BEGIN
	UPDATE kelas SET kelas.nama_kelas = in_nama_kelas, kelas.kompetensi_keahlian = in_kompetensi_keahlian WHERE kelas.id_kelas = in_id_kelas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updPembayaran` (IN `in_id_pembayaran` INT(11), IN `in_tahun_ajaran` VARCHAR(9), IN `in_nominal` INT(11))   BEGIN
	UPDATE pembayaran SET pembayaran.tahun_ajaran = in_tahun_ajaran, pembayaran.nominal = in_nominal WHERE pembayaran.id_pembayaran = in_id_pembayaran;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updPetugas` (IN `in_id_petugas` INT(11), IN `in_username` VARCHAR(25), IN `in_password` VARCHAR(128), IN `in_role` ENUM('admin','petugas','siswa'), IN `in_nama_petugas` VARCHAR(50))   BEGIN
	UPDATE petugas a INNER JOIN pengguna p ON a.pengguna_id = p.id_pengguna SET p.username = in_username, p.password = in_password, p.role = in_role, a.nama_petugas = in_nama_petugas WHERE a.id_petugas = in_id_petugas;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updSiswa` (IN `in_id_siswa` INT(11), IN `in_password` VARCHAR(128), IN `in_nisn` INT(10), IN `in_nis` INT(5), IN `in_nama_siswa` VARCHAR(50), IN `in_telepon` VARCHAR(14), IN `in_alamat` TEXT, IN `in_kelas_id` INT(11), IN `in_pembayaran_id` INT(11))   BEGIN
	UPDATE siswa s INNER JOIN pengguna p ON s.pengguna_id = p.id_pengguna SET p.username = in_nis, p.password = in_password, s.nisn = in_nisn, s.nis = in_nis, s.nama_siswa = in_nama_siswa, s.telepon = in_telepon, s.alamat = in_alamat, s.kelas_id = in_kelas_id, s.pembayaran_id = in_pembayaran_id  WHERE s.id_siswa = in_id_siswa;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `kelas`
--
DELIMITER $$
CREATE TRIGGER `delKelasSiswa` BEFORE DELETE ON `kelas` FOR EACH ROW BEGIN
	DELETE pengguna, siswa FROM pengguna INNER JOIN siswa ON siswa.pengguna_id = pengguna.id_pengguna WHERE siswa.kelas_id = OLD.id_kelas;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nominal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `delPembayaranSiswa` BEFORE DELETE ON `pembayaran` FOR EACH ROW BEGIN
	DELETE pengguna, siswa FROM pengguna INNER JOIN siswa ON siswa.pengguna_id = pengguna.id_pengguna WHERE siswa.pembayaran_id = OLD.id_pembayaran;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` enum('admin','petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(1, 'Admin', '202cb962ac59075b964b07152d234b70QA1sx@Ed3fV$357', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `pengguna_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `pengguna_id`) VALUES
(1, 'ExRyze', 1);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nis` varchar(5) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `telepon` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `kelas_id` int NOT NULL,
  `pengguna_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `bulan_dibayar` varchar(9) NOT NULL,
  `tahun_dibayar` int NOT NULL,
  `siswa_id` int NOT NULL,
  `petugas_id` int NOT NULL,
  `pembayaran_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `kelas_id` (`kelas_id`,`pengguna_id`,`pembayaran_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`),
  ADD KEY `pengguna_id` (`pengguna_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `siswa_id` (`siswa_id`,`petugas_id`,`pembayaran_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `pembayaran_id` (`pembayaran_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
