/*
Navicat MySQL Data Transfer

Source Server         : zieg
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-11-04 14:15:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tr_draft
-- ----------------------------
DROP TABLE IF EXISTS `tr_draft`;
CREATE TABLE `tr_draft` (
  `drf_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `drf_pengadaan` bigint(255) DEFAULT NULL,
  `drf_jumlah_sesudahppn` double(255,0) DEFAULT NULL,
  `drf_jumlah_sebelumppn` double(255,0) DEFAULT NULL,
  `drf_tanggal_input` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drf_id`),
  KEY `fk_draft_pengadaan` (`drf_pengadaan`),
  CONSTRAINT `fk_draft_pengadaan` FOREIGN KEY (`drf_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_draft
-- ----------------------------

-- ----------------------------
-- Table structure for tr_pengadaan_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tr_pengadaan_supplier`;
CREATE TABLE `tr_pengadaan_supplier` (
  `pgs_pengadaan` bigint(255) DEFAULT NULL,
  `pgs_supplier` int(255) DEFAULT NULL,
  KEY `fk_pgs_supplier` (`pgs_supplier`),
  KEY `fk_pgs_pengadaan` (`pgs_pengadaan`),
  CONSTRAINT `fk_pgs_pengadaan` FOREIGN KEY (`pgs_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pgs_supplier` FOREIGN KEY (`pgs_supplier`) REFERENCES `t_supplier` (`spl_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pengadaan_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for tr_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `tr_penyusun`;
CREATE TABLE `tr_penyusun` (
  `pys_jabatan` varchar(20) NOT NULL,
  `pys_draft` bigint(25) NOT NULL,
  `pys_pegawai` bigint(25) NOT NULL,
  PRIMARY KEY (`pys_pegawai`,`pys_draft`),
  KEY `fk_penyusun_draft` (`pys_draft`),
  CONSTRAINT `fk_penyusun_draft` FOREIGN KEY (`pys_draft`) REFERENCES `tr_draft` (`drf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_penyusun_pegawai` FOREIGN KEY (`pys_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_penyusun
-- ----------------------------

-- ----------------------------
-- Table structure for tr_suratizin_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `tr_suratizin_pengadaan`;
CREATE TABLE `tr_suratizin_pengadaan` (
  `sip_pengadaan` bigint(25) NOT NULL,
  `sip_surat_izin` int(25) NOT NULL,
  PRIMARY KEY (`sip_surat_izin`,`sip_pengadaan`),
  KEY `fk_sip_pengadaan` (`sip_pengadaan`),
  CONSTRAINT `fk_sip_pengadaan` FOREIGN KEY (`sip_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sip_suratizin` FOREIGN KEY (`sip_surat_izin`) REFERENCES `t_suratizin` (`siz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_suratizin_pengadaan
-- ----------------------------

-- ----------------------------
-- Table structure for t_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `t_anggaran`;
CREATE TABLE `t_anggaran` (
  `ang_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ang_nama` varchar(255) DEFAULT NULL,
  `ang_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`ang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_anggaran
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_pengadaan`;
CREATE TABLE `t_detail_pengadaan` (
  `dtp_jumlahharga` double(255,0) DEFAULT NULL,
  `dtp_hargasatuan` double(255,0) DEFAULT NULL,
  `dtp_volume` varchar(255) DEFAULT NULL,
  `dtp_spec_pekerjaan` varchar(255) DEFAULT NULL,
  `dtp_pekerjaan` varchar(255) DEFAULT NULL,
  `dtp_pengadaan` bigint(25) DEFAULT NULL,
  `dtp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`dtp_id`),
  KEY `fk_dtp_pengadaan` (`dtp_pengadaan`),
  CONSTRAINT `fk_dtp_pengadaan` FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------

-- ----------------------------
-- Table structure for t_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
  `jbt_id` int(20) NOT NULL AUTO_INCREMENT,
  `jbt_nama` varchar(255) DEFAULT NULL,
  `jbt_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`jbt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
INSERT INTO `t_jabatan` VALUES ('1', 'Kepala', '0');
INSERT INTO `t_jabatan` VALUES ('2', 'Wakil Kepala 1', '1');
INSERT INTO `t_jabatan` VALUES ('3', 'Wakil kepala 1', '0');

-- ----------------------------
-- Table structure for t_memorandum
-- ----------------------------
DROP TABLE IF EXISTS `t_memorandum`;
CREATE TABLE `t_memorandum` (
  `mmr_tgl` date DEFAULT NULL,
  `mmr_level` int(1) DEFAULT NULL,
  `mmr_id` bigint(25) NOT NULL AUTO_INCREMENT,
  `mmr_pengadaan` bigint(255) DEFAULT NULL,
  `mmr_tgl_cetak` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `mmr_nomor` varchar(255) DEFAULT NULL,
  `mmr_dari` bigint(255) DEFAULT NULL,
  `mmr_kepada` bigint(255) DEFAULT NULL,
  `mmr_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`mmr_id`),
  KEY `fk_memo_pengadaan` (`mmr_pengadaan`),
  KEY `fk_memo_dari` (`mmr_dari`),
  KEY `fk_memo_kepada` (`mmr_kepada`),
  CONSTRAINT `fk_memo_dari` FOREIGN KEY (`mmr_dari`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_memo_kepada` FOREIGN KEY (`mmr_kepada`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_memo_pengadaan` FOREIGN KEY (`mmr_pengadaan`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_memorandum
-- ----------------------------

-- ----------------------------
-- Table structure for t_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
  `pgw_nama` varchar(255) DEFAULT NULL,
  `pgw_jabatan` int(20) DEFAULT NULL,
  `pgw_nip` varchar(25) NOT NULL,
  `pgw_telp` varchar(255) DEFAULT NULL,
  `pgw_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pgw_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`pgw_id`),
  KEY `pgw_id` (`pgw_id`),
  KEY `fk_pegawai_jabatan` (`pgw_jabatan`),
  CONSTRAINT `fk_pegawai_jabatan` FOREIGN KEY (`pgw_jabatan`) REFERENCES `t_jabatan` (`jbt_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pegawai
-- ----------------------------
INSERT INTO `t_pegawai` VALUES ('Mas Nopa', '1', '212121212121', '12121111111111111111', '4', '0');
INSERT INTO `t_pegawai` VALUES ('Masnopa ika', '3', '33333333333333333', '111111111111111111', '5', '0');

-- ----------------------------
-- Table structure for t_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_pengadaan`;
CREATE TABLE `t_pengadaan` (
  `pgd_kode_anggaran` varchar(255) DEFAULT NULL,
  `pgd_perihal` varchar(255) DEFAULT NULL,
  `pgd_id` bigint(25) NOT NULL AUTO_INCREMENT,
  `pgd_user_by` bigint(20) DEFAULT NULL,
  `pgd_time_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pgd_deleted` int(255) DEFAULT '0',
  `pgd_anggaran` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`pgd_id`),
  KEY `fk_pengadaan_user` (`pgd_user_by`),
  KEY `fk_pengadaan_anggaran` (`pgd_anggaran`),
  CONSTRAINT `fk_pengadaan_anggaran` FOREIGN KEY (`pgd_anggaran`) REFERENCES `t_anggaran` (`ang_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pengadaan_user` FOREIGN KEY (`pgd_user_by`) REFERENCES `t_user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------

-- ----------------------------
-- Table structure for t_perwakilan
-- ----------------------------
DROP TABLE IF EXISTS `t_perwakilan`;
CREATE TABLE `t_perwakilan` (
  `pws_telp` varchar(255) DEFAULT NULL,
  `pws_idsup` int(25) DEFAULT NULL,
  `pws_nama` varchar(255) DEFAULT NULL,
  `pws_id` int(25) NOT NULL,
  `pws_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`pws_id`),
  KEY `idsupfk` (`pws_idsup`),
  CONSTRAINT `idsupfk` FOREIGN KEY (`pws_idsup`) REFERENCES `t_supplier` (`spl_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_perwakilan
-- ----------------------------

-- ----------------------------
-- Table structure for t_supplier
-- ----------------------------
DROP TABLE IF EXISTS `t_supplier`;
CREATE TABLE `t_supplier` (
  `spl_telp` varchar(255) DEFAULT NULL,
  `spl_alamat` varchar(255) DEFAULT NULL,
  `spl_nama` varchar(255) DEFAULT NULL,
  `spl_id` int(25) NOT NULL,
  `spl_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`spl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for t_suratizin
-- ----------------------------
DROP TABLE IF EXISTS `t_suratizin`;
CREATE TABLE `t_suratizin` (
  `siz_nama` varchar(255) NOT NULL,
  `siz_id` int(25) NOT NULL AUTO_INCREMENT,
  `siz_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`siz_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_suratizin
-- ----------------------------

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `usr_role` int(11) DEFAULT NULL,
  `usr_pegawai` bigint(25) DEFAULT NULL,
  `usr_id` bigint(2) NOT NULL AUTO_INCREMENT,
  `usr_username` varchar(15) NOT NULL,
  `usr_password` varchar(75) NOT NULL,
  `usr_email` varchar(100) DEFAULT NULL,
  `usr_deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`usr_id`),
  KEY `fk_user_pegawai` (`usr_pegawai`),
  CONSTRAINT `fk_user_pegawai` FOREIGN KEY (`usr_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (null, null, '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '0');
INSERT INTO `t_user` VALUES ('1', '4', '3', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0');
INSERT INTO `t_user` VALUES ('1', '5', '4', 'Susis', 'e807f1fcf82d132f9bb018ca6738a19f', 'falih32@gmail.com', '1');
