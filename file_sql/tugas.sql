/*
Navicat MySQL Data Transfer

Source Server         : DATABASE-ENDRA
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : zada_elarning_rizki

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-02 12:22:59
*/

SET FOREIGN_KEY_CHECKS=0;

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
  KEY `FK_MAPEL_TUGAS` (`id_mapel`),
  CONSTRAINT `FK_MAPEL_TUGAS` FOREIGN KEY (`id_mapel`) REFERENCES `mata_pelajaran` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tugas
-- ----------------------------
