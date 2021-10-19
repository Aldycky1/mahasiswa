-- Adminer 4.8.1 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(60) NOT NULL,
  `nip` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dosen` (`id`, `nama_dosen`, `nip`) VALUES
(4,	'Iga Vennya',	123456),
(5,	'Alifah Fadiyah',	567890),
(6,	'Alifiah ',	19072121),
(7,	'Bibil',	3432432);

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_mahasiswa` varchar(60) NOT NULL,
  `nim` int(10) NOT NULL,
  `id_dosen` int(3) NOT NULL,
  `id_matkul` int(3) NOT NULL,
  `nilai` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mahasiswa` (`id`, `nama_mahasiswa`, `nim`, `id_dosen`, `id_matkul`, `nilai`) VALUES
(8,	'Aldycky Bagus',	1907411012,	6,	2,	87);

DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE `mata_kuliah` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `mata_kuliah` (`id`, `nama_matkul`) VALUES
(2,	'P Web 2'),
(3,	'Probstat');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1,	'Herzi',	'admin',	'21232f297a57a5a743894a0e4a801fc3');

-- 2021-10-19 02:41:43
