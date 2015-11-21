/*
Navicat MySQL Data Transfer

Source Server         : zieg
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-11-21 23:36:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tr_detail_konten
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail_konten`;
CREATE TABLE `tr_detail_konten` (
  `dknt_isi` varchar(255) DEFAULT NULL,
  `dknt_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `dknt_idkonten` int(255) NOT NULL,
  `dknt_detailsurat` bigint(255) NOT NULL,
  PRIMARY KEY (`dknt_id`),
  KEY `fk_dknten_idkonten` (`dknt_idkonten`) USING BTREE,
  KEY `tr_detailsurat` (`dknt_detailsurat`) USING BTREE,
  CONSTRAINT `tr_detail_konten_ibfk_1` FOREIGN KEY (`dknt_idkonten`) REFERENCES `t_konten` (`knt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_detail_konten_ibfk_2` FOREIGN KEY (`dknt_detailsurat`) REFERENCES `tr_detail_surat` (`dsrt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_detail_konten
-- ----------------------------

-- ----------------------------
-- Table structure for tr_detail_surat
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail_surat`;
CREATE TABLE `tr_detail_surat` (
  `dsrt_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `dsrt_jenis_surat` int(11) NOT NULL,
  `dsrt_tgl_cetak` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dsrt_pencetak` int(255) NOT NULL,
  `dsrt_idpengadaan` bigint(255) NOT NULL,
  PRIMARY KEY (`dsrt_id`),
  KEY `fk_dsrt_jenis_surat` (`dsrt_jenis_surat`) USING BTREE,
  KEY `dsrt_idkntsrt` (`dsrt_id`) USING BTREE,
  KEY `fk_pgd_dsrt` (`dsrt_idpengadaan`) USING BTREE,
  CONSTRAINT `tr_detail_surat_ibfk_1` FOREIGN KEY (`dsrt_idpengadaan`) REFERENCES `t_pengadaan` (`pgd_id`),
  CONSTRAINT `tr_detail_surat_ibfk_2` FOREIGN KEY (`dsrt_jenis_surat`) REFERENCES `t_surat` (`srt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_detail_surat
-- ----------------------------

-- ----------------------------
-- Table structure for tr_pgd_suratizin
-- ----------------------------
DROP TABLE IF EXISTS `tr_pgd_suratizin`;
CREATE TABLE `tr_pgd_suratizin` (
  `psr_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `psr_pengadaan` bigint(25) NOT NULL,
  `psr_surat_izin` int(25) NOT NULL,
  PRIMARY KEY (`psr_id`),
  KEY `fk_sip_pengadaan` (`psr_pengadaan`) USING BTREE,
  KEY `fk_psr_srz` (`psr_surat_izin`) USING BTREE,
  CONSTRAINT `tr_pgd_suratizin_ibfk_1` FOREIGN KEY (`psr_surat_izin`) REFERENCES `t_suratizin` (`siz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_pgd_suratizin_ibfk_2` FOREIGN KEY (`psr_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pgd_suratizin
-- ----------------------------
INSERT INTO `tr_pgd_suratizin` VALUES ('1', '15', '1');
INSERT INTO `tr_pgd_suratizin` VALUES ('2', '15', '2');

-- ----------------------------
-- Table structure for t_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `t_anggaran`;
CREATE TABLE `t_anggaran` (
  `ang_kode` varchar(20) NOT NULL,
  `ang_nama` varchar(255) DEFAULT NULL,
  `ang_deleted` int(255) DEFAULT '0',
  `ang_date_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ang_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_anggaran
-- ----------------------------
INSERT INTO `t_anggaran` VALUES ('12345', 'Anggaran pendapatan negara', '0', '2015-11-18 22:30:57');
INSERT INTO `t_anggaran` VALUES ('12345s', 'jlj', '0', '2015-11-18 23:18:41');
INSERT INTO `t_anggaran` VALUES ('54321', 'Anggaran baru', '0', '2015-11-18 23:11:09');
INSERT INTO `t_anggaran` VALUES ('esa', 'esa', '0', '2015-11-18 22:30:57');
INSERT INTO `t_anggaran` VALUES ('esas', 'esa', '0', '2015-11-18 22:30:57');
INSERT INTO `t_anggaran` VALUES ('haha', 'esa', '0', '2015-11-18 22:30:57');

-- ----------------------------
-- Table structure for t_departemen
-- ----------------------------
DROP TABLE IF EXISTS `t_departemen`;
CREATE TABLE `t_departemen` (
  `dpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dpt_nama` varchar(200) DEFAULT NULL,
  `dpt_parent` int(11) DEFAULT '-99',
  `dpt_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`dpt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_departemen
-- ----------------------------
INSERT INTO `t_departemen` VALUES ('1', 'Bagian TU Pimpinan', '0', '0');
INSERT INTO `t_departemen` VALUES ('2', 'Bagian Rumah Tangga', '0', '0');
INSERT INTO `t_departemen` VALUES ('3', 'Bagian Perlengkapan', '0', '0');
INSERT INTO `t_departemen` VALUES ('4', 'Bagian Tata Usaha dan Persuratan', '0', '0');
INSERT INTO `t_departemen` VALUES ('5', 'Subbagian Protokol', '1', '0');
INSERT INTO `t_departemen` VALUES ('6', 'Subbagian TU Menteri', '1', '0');
INSERT INTO `t_departemen` VALUES ('7', 'Subbagian TU Sekretariat Jenderal', '1', '0');
INSERT INTO `t_departemen` VALUES ('8', 'Subbagian Urusan Dalam', '2', '0');
INSERT INTO `t_departemen` VALUES ('9', 'Subbagian ANGKAMDAL', '2', '0');
INSERT INTO `t_departemen` VALUES ('10', 'Subbagian Kesejahteraan', '2', '0');
INSERT INTO `t_departemen` VALUES ('11', 'Subbagian Perencanaan dan Pemanfaatan', '3', '0');
INSERT INTO `t_departemen` VALUES ('12', 'Subbagian Inventarisasi dan Penghapusan', '3', '0');
INSERT INTO `t_departemen` VALUES ('13', 'Subbagian Pengadaan dan Penyaluran', '3', '0');
INSERT INTO `t_departemen` VALUES ('14', 'Subbagian Persuratan', '4', '0');
INSERT INTO `t_departemen` VALUES ('15', 'Subbagian Arsip', '4', '0');
INSERT INTO `t_departemen` VALUES ('16', 'Subbagian Tata Usaha Biro', '4', '0');
INSERT INTO `t_departemen` VALUES ('17', 'Biro Umum', '-99', '0');

-- ----------------------------
-- Table structure for t_detail_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_pengadaan`;
CREATE TABLE `t_detail_pengadaan` (
  `dtp_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `dtp_pengadaan` bigint(25) DEFAULT NULL,
  `dtp_pekerjaan` varchar(255) DEFAULT NULL,
  `dtp_spesifikasi` varchar(255) DEFAULT NULL,
  `dtp_volume` decimal(65,2) DEFAULT NULL,
  `dtp_satuan` varchar(255) DEFAULT NULL,
  `dtp_hargasatuan_hps` decimal(65,2) DEFAULT NULL,
  `dtp_jumlahharga_hps` decimal(65,2) DEFAULT NULL,
  `dtp_hargasatuan_pnr` decimal(65,2) DEFAULT NULL,
  `dtp_jumlahharga_pnr` decimal(65,2) DEFAULT NULL,
  `dtp_hargasatuan_fix` decimal(65,2) DEFAULT NULL,
  `dtp_jumlahharga_fix` decimal(65,2) DEFAULT NULL,
  PRIMARY KEY (`dtp_id`),
  KEY `fk_dtp_pengadaan` (`dtp_pengadaan`) USING BTREE,
  CONSTRAINT `t_detail_pengadaan_ibfk_1` FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------
INSERT INTO `t_detail_pengadaan` VALUES ('18', '15', 'Pembersihan Kaca luar gedung', 'gondola safety equipment sabun dan bahan kimia pembersih lap dan peralatan pembersih', '6843.00', 'm2', '15500.00', '106066500.00', null, null, null, null);
INSERT INTO `t_detail_pengadaan` VALUES ('19', '15', 'plate sitting dan angkur ( pasang baru di top roof)', null, '3.00', 'unit', '1567000.00', '4701000.00', null, null, null, null);
INSERT INTO `t_detail_pengadaan` VALUES ('20', '15', 'Silent kaca yang bocor', null, '79.00', 'm\'', '30000.00', '2370000.00', null, null, null, null);

-- ----------------------------
-- Table structure for t_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
  `jbt_id` int(11) NOT NULL AUTO_INCREMENT,
  `jbt_nama` varchar(255) DEFAULT NULL,
  `jbt_departemen` int(11) DEFAULT NULL,
  `jbt_deleted` int(255) DEFAULT NULL,
  PRIMARY KEY (`jbt_id`),
  KEY `fk_jabatan_departemen` (`jbt_departemen`) USING BTREE,
  CONSTRAINT `t_jabatan_ibfk_1` FOREIGN KEY (`jbt_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
INSERT INTO `t_jabatan` VALUES ('1', 'Kabag TU Pimpinan', '1', null);
INSERT INTO `t_jabatan` VALUES ('2', 'Kabag Rumah Tangga', '2', null);
INSERT INTO `t_jabatan` VALUES ('3', 'Kabag Perlengkapan', '3', null);
INSERT INTO `t_jabatan` VALUES ('4', 'Kabag Tata Usaha dan Persuratan', '4', null);
INSERT INTO `t_jabatan` VALUES ('5', 'Kasubbag Protokol', '5', null);
INSERT INTO `t_jabatan` VALUES ('6', 'Kasubbag TU Menteri', '6', null);
INSERT INTO `t_jabatan` VALUES ('7', 'Kasubbag TU Sekretariat Jenderal', '7', null);
INSERT INTO `t_jabatan` VALUES ('8', 'Kasubbag Urusan Dalam', '8', null);
INSERT INTO `t_jabatan` VALUES ('9', 'Kasubbag ANGKAMDAL', '9', null);
INSERT INTO `t_jabatan` VALUES ('10', 'Kasubbag Kesejahteraan', '10', null);
INSERT INTO `t_jabatan` VALUES ('11', 'Kasubbag Perencanaan dan Pemanfaatan', '11', null);
INSERT INTO `t_jabatan` VALUES ('12', 'Kasubbag Inventarisasi dan Penghapusan', '12', null);
INSERT INTO `t_jabatan` VALUES ('13', 'Kasubbag Pengadaan dan Penyaluran', '13', null);
INSERT INTO `t_jabatan` VALUES ('14', 'Kasubbag Persuratan', '14', null);
INSERT INTO `t_jabatan` VALUES ('15', 'Kasubbag Arsip', '15', null);
INSERT INTO `t_jabatan` VALUES ('16', 'Kasubbag Tata Usaha Biro', '16', null);
INSERT INTO `t_jabatan` VALUES ('17', 'Staff Pelaksana Protokol', '5', null);
INSERT INTO `t_jabatan` VALUES ('18', 'Staff Pelaksana TU Menteri', '6', null);
INSERT INTO `t_jabatan` VALUES ('19', 'Staff Pelaksana TU Sekretariat Jenderal', '7', null);
INSERT INTO `t_jabatan` VALUES ('20', 'Staff Pelaksana Urusan Dalam', '8', null);
INSERT INTO `t_jabatan` VALUES ('21', 'Staff Pelaksana ANGKAMDAL', '9', null);
INSERT INTO `t_jabatan` VALUES ('22', 'Staff Pelaksana Kesejahteraan', '10', null);
INSERT INTO `t_jabatan` VALUES ('23', 'Staff Perencanaan dan Pemanfaatan', '11', null);
INSERT INTO `t_jabatan` VALUES ('24', 'Staff Pelaksana Inventarisasi dan Penghapusan', '12', null);
INSERT INTO `t_jabatan` VALUES ('25', 'Staff Pelaksana Pengadaan dan Penyaluran', '13', null);
INSERT INTO `t_jabatan` VALUES ('26', 'Staff Pelaksana Persuratan', '14', null);
INSERT INTO `t_jabatan` VALUES ('27', 'Staff Pelaksana Arsip', '15', null);
INSERT INTO `t_jabatan` VALUES ('28', 'Staff Pelaksana Tata Usaha Biro', '16', null);
INSERT INTO `t_jabatan` VALUES ('29', 'Bendahara  Pengeluaran', '0', null);
INSERT INTO `t_jabatan` VALUES ('30', 'Pejabat Pengadaan Barang Jasa', '0', null);
INSERT INTO `t_jabatan` VALUES ('31', 'Pejabat Penandatangan SPM', '0', null);
INSERT INTO `t_jabatan` VALUES ('32', 'Kepala Biro Umum', '0', null);
INSERT INTO `t_jabatan` VALUES ('33', 'Pejabat Pembuat Komitmen', '17', null);

-- ----------------------------
-- Table structure for t_kelompok_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `t_kelompok_penyusun`;
CREATE TABLE `t_kelompok_penyusun` (
  `klp_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `klp_pengadaan` bigint(255) DEFAULT NULL,
  `klp_terpilih` int(255) DEFAULT NULL,
  `klp_tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`klp_id`),
  KEY `fk_drp_pgd` (`klp_pengadaan`) USING BTREE,
  CONSTRAINT `t_kelompok_penyusun_ibfk_1` FOREIGN KEY (`klp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_kelompok_penyusun
-- ----------------------------
INSERT INTO `t_kelompok_penyusun` VALUES ('1', '15', '0', '2015-11-21 22:50:46');

-- ----------------------------
-- Table structure for t_konten
-- ----------------------------
DROP TABLE IF EXISTS `t_konten`;
CREATE TABLE `t_konten` (
  `knt_nama` varchar(255) DEFAULT NULL,
  `knt_id` int(100) NOT NULL,
  PRIMARY KEY (`knt_id`),
  KEY `knt_id` (`knt_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_konten
-- ----------------------------
INSERT INTO `t_konten` VALUES ('Dari', '1');
INSERT INTO `t_konten` VALUES ('Kepada', '2');
INSERT INTO `t_konten` VALUES ('Tanggal', '3');
INSERT INTO `t_konten` VALUES ('ttdmemo1', '4');
INSERT INTO `t_konten` VALUES ('nomormemo2', '5');
INSERT INTO `t_konten` VALUES ('ttdmemo2', '6');
INSERT INTO `t_konten` VALUES ('nomormemo3', '7');
INSERT INTO `t_konten` VALUES ('ttdmemo3', '8');

-- ----------------------------
-- Table structure for t_list_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `t_list_penyusun`;
CREATE TABLE `t_list_penyusun` (
  `lsp_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `lsp_pegawai` bigint(25) NOT NULL,
  `lsp_kelompok` bigint(25) NOT NULL,
  `lsp_jabatan` int(20) NOT NULL,
  PRIMARY KEY (`lsp_id`),
  KEY `fk_penyusun_draft` (`lsp_kelompok`) USING BTREE,
  KEY `fk_pys_pgw` (`lsp_pegawai`) USING BTREE,
  CONSTRAINT `t_list_penyusun_ibfk_1` FOREIGN KEY (`lsp_kelompok`) REFERENCES `t_kelompok_penyusun` (`klp_id`),
  CONSTRAINT `t_list_penyusun_ibfk_2` FOREIGN KEY (`lsp_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_list_penyusun
-- ----------------------------
INSERT INTO `t_list_penyusun` VALUES ('1', '4', '1', '0');
INSERT INTO `t_list_penyusun` VALUES ('2', '6', '1', '1');
INSERT INTO `t_list_penyusun` VALUES ('4', '5', '1', '1');

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
  KEY `pgw_id` (`pgw_id`) USING BTREE,
  KEY `fk_pegawai_jabatan` (`pgw_jabatan`) USING BTREE,
  CONSTRAINT `t_pegawai_ibfk_1` FOREIGN KEY (`pgw_jabatan`) REFERENCES `t_jabatan` (`jbt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pegawai
-- ----------------------------
INSERT INTO `t_pegawai` VALUES ('Mas Nopa', '1', '212121212121', '12121111111111111111', '4', '0');
INSERT INTO `t_pegawai` VALUES ('Masnopa ika', '3', '33333333333333333', '111111111111111111', '5', '0');
INSERT INTO `t_pegawai` VALUES ('Sukijan', '3', '1212121212', '111111111122222', '6', '0');

-- ----------------------------
-- Table structure for t_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_pengadaan`;
CREATE TABLE `t_pengadaan` (
  `pgd_id` bigint(25) NOT NULL AUTO_INCREMENT,
  `pgd_perihal` varchar(255) DEFAULT NULL,
  `pgd_deleted` int(255) DEFAULT '0',
  `pgd_uraian_pekerjaan` varchar(255) DEFAULT NULL,
  `pgd_tanggal_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pgd_anggaran` varchar(255) DEFAULT NULL,
  `pgd_user_update` bigint(20) DEFAULT NULL,
  `pgd_lama_pekerjaan` int(255) DEFAULT NULL,
  `pgd_lama_penawaran` int(255) DEFAULT NULL,
  `pgd_tgl_mulai_pengadaan` date DEFAULT NULL,
  `pgd_supplier` int(255) DEFAULT NULL,
  `pgd_jml_sblm_ppn_hps` decimal(65,2) DEFAULT NULL,
  `pgd_jml_ssdh_ppn_hps` decimal(65,2) DEFAULT NULL,
  `pgd_jml_sblm_ppn_pnr` decimal(65,2) DEFAULT NULL,
  `pgd_jml_ssdh_ppn_pnr` decimal(65,2) DEFAULT NULL,
  `pgd_jml_sblm_ppn_fix` decimal(65,2) DEFAULT NULL,
  `pgd_jml_ssdh_ppn_fix` decimal(65,2) DEFAULT NULL,
  PRIMARY KEY (`pgd_id`),
  KEY `fk_pgd_ang` (`pgd_anggaran`) USING BTREE,
  KEY `fk_pgd_usr` (`pgd_user_update`) USING BTREE,
  KEY `fk_pgd_spl` (`pgd_supplier`) USING BTREE,
  CONSTRAINT `t_pengadaan_ibfk_1` FOREIGN KEY (`pgd_anggaran`) REFERENCES `t_anggaran` (`ang_kode`),
  CONSTRAINT `t_pengadaan_ibfk_2` FOREIGN KEY (`pgd_supplier`) REFERENCES `t_supplier` (`spl_id`),
  CONSTRAINT `t_pengadaan_ibfk_3` FOREIGN KEY (`pgd_user_update`) REFERENCES `t_user` (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------
INSERT INTO `t_pengadaan` VALUES ('15', 'Pekerjaan Pembersihan dan Silent Kaca Luar Gedung GMB III', '0', 'Melakukan pemeliharaan gedung dengan melakukan pembersihan kaca luar gedung yang sudah kotor dan melakukan silent kaca yang telah bocor', '2015-11-21 22:27:33', '12345', '1', '45', '30', '2015-11-21', '0', '113137500.00', '124451250.00', null, null, null, null);

-- ----------------------------
-- Table structure for t_perwakilan_supplier
-- ----------------------------
DROP TABLE IF EXISTS `t_perwakilan_supplier`;
CREATE TABLE `t_perwakilan_supplier` (
  `pws_telp` varchar(255) DEFAULT NULL,
  `pws_idsup` int(25) DEFAULT NULL,
  `pws_nama` varchar(255) DEFAULT NULL,
  `pws_id` int(25) NOT NULL,
  `pws_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`pws_id`),
  KEY `idsupfk` (`pws_idsup`) USING BTREE,
  CONSTRAINT `t_perwakilan_supplier_ibfk_1` FOREIGN KEY (`pws_idsup`) REFERENCES `t_supplier` (`spl_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_perwakilan_supplier
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
INSERT INTO `t_supplier` VALUES ('11111', 'Jalan Parahyangan', 'PT. Merdeka', '0', '0');

-- ----------------------------
-- Table structure for t_surat
-- ----------------------------
DROP TABLE IF EXISTS `t_surat`;
CREATE TABLE `t_surat` (
  `srt_id` int(11) NOT NULL,
  `srt_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`srt_id`),
  KEY `srt_id` (`srt_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_surat
-- ----------------------------
INSERT INTO `t_surat` VALUES ('1', 'Memorandum');
INSERT INTO `t_surat` VALUES ('2', 'HPS');

-- ----------------------------
-- Table structure for t_suratizin
-- ----------------------------
DROP TABLE IF EXISTS `t_suratizin`;
CREATE TABLE `t_suratizin` (
  `siz_nama` varchar(255) NOT NULL,
  `siz_id` int(25) NOT NULL AUTO_INCREMENT,
  `siz_deleted` int(255) DEFAULT '0',
  PRIMARY KEY (`siz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_suratizin
-- ----------------------------
INSERT INTO `t_suratizin` VALUES ('Surat Izin Usaha Perdangangan (SIUP) Kecil', '1', '0');
INSERT INTO `t_suratizin` VALUES ('Surat Izin Mengemudi', '2', '0');

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
  KEY `fk_user_pegawai` (`usr_pegawai`) USING BTREE,
  CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`usr_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (null, null, '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '0');
INSERT INTO `t_user` VALUES ('1', '4', '3', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0');
INSERT INTO `t_user` VALUES ('1', '5', '4', 'Susis', 'e807f1fcf82d132f9bb018ca6738a19f', 'falih32@gmail.com', '1');
