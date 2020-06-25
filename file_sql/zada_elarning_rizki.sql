/*
Navicat MySQL Data Transfer

Source Server         : DATABASE-ENDRA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : zada_elarning_rizki

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-25 13:02:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', 'admin', '1');

-- ----------------------------
-- Table structure for `guru`
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru` (
  `nip` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` char(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of guru
-- ----------------------------

-- ----------------------------
-- Table structure for `kelas`
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(25) NOT NULL,
  `jenjang` int(2) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas
-- ----------------------------

-- ----------------------------
-- Table structure for `mata_pelajaran`
-- ----------------------------
DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  PRIMARY KEY (`id_mapel`),
  KEY `FK_KELAS` (`id_kelas`),
  KEY `FK_GURU` (`id_guru`),
  CONSTRAINT `FK_GURU` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_KELAS` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mata_pelajaran
-- ----------------------------

-- ----------------------------
-- Table structure for `siswa`
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  PRIMARY KEY (`nis`),
  KEY `FK_KELAS_2` (`id_kelas`),
  CONSTRAINT `FK_KELAS_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of siswa
-- ----------------------------

-- ----------------------------
-- Table structure for `tugas`
-- ----------------------------
DROP TABLE IF EXISTS `tugas`;
CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `nama_tugas` varchar(50) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tugas`),
  CONSTRAINT `FK_MAPEL_TUGAS` FOREIGN KEY (`id_tugas`) REFERENCES `mata_pelajaran` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tugas
-- ----------------------------

-- ----------------------------
-- Table structure for `tugas_detail`
-- ----------------------------
DROP TABLE IF EXISTS `tugas_detail`;
CREATE TABLE `tugas_detail` (
  `nis` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `nilai` float NOT NULL,
  KEY `FK_NIS` (`nis`),
  KEY `FK_TUGAS` (`id_tugas`),
  CONSTRAINT `FK_NIS` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TUGAS` FOREIGN KEY (`id_tugas`) REFERENCES `tugas` (`id_tugas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tugas_detail
-- ----------------------------
