/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-03-20 01:47:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_anggaran
-- ----------------------------
DROP TABLE IF EXISTS `t_anggaran`;
CREATE TABLE `t_anggaran` (
`ang_kode`  varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`ang_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`ang_deleted`  int(255) NULL DEFAULT 0 ,
`ang_date_input`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
PRIMARY KEY (`ang_kode`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_anggaran
-- ----------------------------
BEGIN;
INSERT INTO `t_anggaran` VALUES ('12345', 'Anggaran pendapatan negara', '0', '2015-11-18 22:30:57'), ('54321', 'Anggaran baru', '0', '2015-11-18 23:11:09');
COMMIT;

-- ----------------------------
-- Table structure for t_departemen
-- ----------------------------
DROP TABLE IF EXISTS `t_departemen`;
CREATE TABLE `t_departemen` (
`dpt_id`  int(11) NOT NULL AUTO_INCREMENT ,
`dpt_nama`  varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dpt_parent`  int(11) NULL DEFAULT '-99' ,
`dpt_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`dpt_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=18

;

-- ----------------------------
-- Records of t_departemen
-- ----------------------------
BEGIN;
INSERT INTO `t_departemen` VALUES ('1', 'Bagian TU Pimpinan', '0', '0'), ('2', 'Bagian Rumah Tangga', '0', '0'), ('3', 'Bagian Perlengkapan', '0', '0'), ('4', 'Bagian Tata Usaha dan Persuratan', '0', '0'), ('5', 'Subbagian Protokol', '1', '0'), ('6', 'Subbagian TU Menteri', '1', '0'), ('7', 'Subbagian TU Sekretariat Jenderal', '1', '0'), ('8', 'Subbagian Urusan Dalam', '2', '0'), ('9', 'Subbagian ANGKAMDAL', '2', '0'), ('10', 'Subbagian Kesejahteraan', '2', '0'), ('11', 'Subbagian Perencanaan dan Pemanfaatan', '3', '0'), ('12', 'Subbagian Inventarisasi dan Penghapusan', '3', '0'), ('13', 'Subbagian Pengadaan dan Penyaluran', '3', '0'), ('14', 'Subbagian Persuratan', '4', '0'), ('15', 'Subbagian Arsip', '4', '0'), ('16', 'Subbagian Tata Usaha Biro', '4', '0'), ('17', 'Biro Umum', '-99', '0');
COMMIT;

-- ----------------------------
-- Table structure for t_detail_konsultan1
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_konsultan1`;
CREATE TABLE `t_detail_konsultan1` (
`dtk_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`dtk_pgd`  bigint(255) NULL DEFAULT NULL ,
`dtk_jabatan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk_kualifikasi_pendidikan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk_jml_org`  int(255) NULL DEFAULT NULL ,
`dtk_jml_bln`  decimal(65,2) NULL DEFAULT NULL ,
`dtk_intensitas`  decimal(65,2) NULL DEFAULT NULL ,
`dtk_kuantitas`  decimal(65,2) NULL DEFAULT NULL ,
`dtk_satuan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk_biaya_personil_hps`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_jml_biaya_hps`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_biaya_personil_pnr`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_jml_biaya_pnr`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_biaya_personil_fix`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_jml_biaya_fix`  decimal(65,0) NULL DEFAULT 0 ,
`dtk_sub_judul`  bigint(255) NULL DEFAULT '-99' ,
PRIMARY KEY (`dtk_id`),
FOREIGN KEY (`dtk_pgd`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_dtk_pgd` (`dtk_pgd`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=17

;

-- ----------------------------
-- Records of t_detail_konsultan1
-- ----------------------------
BEGIN;
INSERT INTO `t_detail_konsultan1` VALUES ('7', '46', 'sas', 'dfa', '3', '2.00', '1.00', '6.00', 'aas', '40000', '240000', '1', '6', '1', '6', '4'), ('8', '46', 'asaew', 'd3', '3', '2.00', '1.00', '6.00', 'qwq', '35000', '210000', '2', '12', '1', '6', '4'), ('9', '46', 'romanda', 'era', '4', '4.00', '2.00', '32.00', 'trt', '1000', '32000', '3', '96', '1', '32', '1'), ('10', '46', 'gg', 'gg', '4', '4.00', '3.00', '48.00', 'as', '3000', '144000', '4', '192', '1', '48', '1'), ('16', '46', 'sadf', '33', '2', '2.50', '3.20', '16.00', 'tr', '4000', '64000', '5', '80', '1', '16', '-99');
COMMIT;

-- ----------------------------
-- Table structure for t_detail_konsultan2
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_konsultan2`;
CREATE TABLE `t_detail_konsultan2` (
`dtk2_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`dtk2_pengadaan`  bigint(25) NULL DEFAULT NULL ,
`dtk2_pekerjaan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk2_spesifikasi`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk2_volume`  decimal(65,2) NULL DEFAULT NULL ,
`dtk2_satuan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtk2_hargasatuan_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_jumlahharga_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_hargasatuan_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_jumlahharga_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_hargasatuan_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_jumlahharga_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtk2_sub_judul`  bigint(255) NULL DEFAULT '-99' COMMENT 'kalau -99 berarti tidak pake sub judul' ,
`dtk2_file`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'url lokasi file gambar' ,
PRIMARY KEY (`dtk2_id`),
FOREIGN KEY (`dtk2_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_dtp_pengadaan` (`dtk2_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=21

;

-- ----------------------------
-- Records of t_detail_konsultan2
-- ----------------------------
BEGIN;
INSERT INTO `t_detail_konsultan2` VALUES ('20', '46', 'goo', 'hau', '3.00', 'unit', '4000.00', '12000.00', '2000.00', '6000.00', '1.00', '3.00', '3', 'Untitled_Page9.png');
COMMIT;

-- ----------------------------
-- Table structure for t_detail_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_detail_pengadaan`;
CREATE TABLE `t_detail_pengadaan` (
`dtp_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`dtp_pengadaan`  bigint(25) NULL DEFAULT NULL ,
`dtp_pekerjaan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtp_spesifikasi`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtp_volume`  decimal(65,2) NULL DEFAULT NULL ,
`dtp_satuan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dtp_hargasatuan_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_jumlahharga_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_hargasatuan_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_jumlahharga_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_hargasatuan_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_jumlahharga_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`dtp_sub_judul`  bigint(255) NULL DEFAULT '-99' COMMENT 'kalau -99 berarti tidak pake sub judul' ,
`dtp_file`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'url lokasi file gambar' ,
PRIMARY KEY (`dtp_id`),
FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_dtp_pengadaan` (`dtp_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=161

;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_detail_pengadaan` VALUES ('38', '22', 'Kayu', 'Panjang\nJati', '4.00', 'unit', '4000.00', '16000.00', '3000.00', '12000.00', '3000.00', '12000.00', null, null), ('39', '22', 'Besi', 'pendek\nkuat', '3.00', 'unit', '1000.00', '3000.00', '909.00', '2727.00', '300.00', '900.00', null, null), ('42', '19', 'permen', '-manis\n-asam', '3.00', 'unit', '400.00', '1200.00', '0.00', '0.00', '0.00', '0.00', null, null), ('43', '20', 'xx', 'ete', '3.00', 'xx', '100.00', '300.00', '50.00', '150.00', '50.00', '150.00', null, null), ('44', '20', 'yy', 'tyt', '6.00', 'yt', '6000.00', '36000.00', '1000.00', '6000.00', '500.00', '3000.00', null, null), ('45', '21', 'Baju', '- wol\n- Katun', '4.00', 'unit', '5000.00', '20000.00', '6000.00', '24000.00', '0.00', '0.00', null, null), ('46', '21', 'Celana', '- jeans\n- panjang', '1.00', 'unit', '4000.00', '4000.00', '100.00', '100.00', '0.00', '0.00', null, null), ('47', '21', 'Kemeja', 'hahaha', '2.00', 'm3', '2000.00', '4000.00', '100.00', '200.00', '0.00', '0.00', null, null), ('48', '21', 'haha', 'ytty', '1.50', 'mh', '3000.00', '4500.00', '200.00', '300.00', '0.00', '0.00', null, null), ('49', '23', 'Membersihkan Lantai 1', '- Pake Lap\n- Pake shampoo', '100.00', 'm2', '500.00', '50000.00', '450.00', '45000.00', '450.00', '45000.00', null, null), ('50', '23', 'Membersihkan lantai 2', '- Lantai pavin block\n- disedot', '150.00', 'm2', '800.00', '120000.00', '750.00', '112500.00', '700.00', '105000.00', null, null), ('51', '24', 'Membersihkan taman depan', '- Disemprot\n- Dipotong', '500.00', 'm2', '500.00', '250000.00', '500.00', '250000.00', '0.00', '0.00', null, null), ('52', '25', 'susu', 'susu enak', '10.00', 'liter', '150000.00', '1500000.00', '0.00', '0.00', '0.00', '0.00', null, null), ('53', '15', 'Pembersihan Kaca luar gedung', 'gondola safety equipment sabun dan bahan kimia pembersih lap dan peralatan pembersih', '6843.00', 'm2', '2000.00', '13686000.00', '11.00', '75273.00', '11.00', '75273.00', null, null), ('54', '15', 'plate sitting dan angkur ( pasang baru di top roof)', '', '3.00', 'unit', '2500.00', '7500.00', '111.00', '333.00', '11.00', '33.00', null, null), ('55', '15', 'Silent kaca yang bocor', '', '79.00', 'm\'', '1500.00', '118500.00', '111.00', '8769.00', '11.00', '869.00', null, null), ('119', '26', 'Barang A', 'esa', '3.00', 'unit', '30000.00', '90000.00', '500.00', '1500.00', '0.00', '0.00', '-99', 'Untitled_Page6.png'), ('127', '26', 'wow', 'faf', '500.00', 'unit', '5000.00', '2500000.00', '100.00', '50000.00', '0.00', '0.00', '-99', ''), ('128', '27', 'gaga', 'sdfa', '5.00', 'unit', '50000.00', '250000.00', '6.00', '30.00', '5.00', '25.00', '-99', 'Untitled_Page8.png'), ('129', '27', 'fafa', 'asfdfsa', '4.00', 'unit', '3000.00', '12000.00', '6.00', '24.00', '1.00', '4.00', '-99', ''), ('132', '30', 'af', 'fsg', '5.00', 'fg', '555.00', '2775.00', '8.00', '40.00', '0.00', '0.00', '-99', ''), ('133', '30', 'gsgs', 'hshhshs', '6.00', 'fsdg', '4444.00', '26664.00', '8.00', '48.00', '0.00', '0.00', '-99', ''), ('134', '31', 'x', 'sds', '3.00', 'ds', '5.00', '15.00', '0.00', '0.00', '0.00', '0.00', '-99', ''), ('135', '31', 'sd', 'dsaf', '3.00', 'dd', '4.00', '12.00', '0.00', '0.00', '0.00', '0.00', '-99', ''), ('136', '32', 'Kursi Kayu', '1. Kayu Jati\r\n2. Panjang\r\n3. Kokoh', '5.00', 'unit', '500000.00', '2500000.00', '50000.00', '250000.00', '30000.00', '150000.00', '-99', 'Untitled_Page9.png'), ('137', '32', 'Kursi Besi', '1. Besi lebur\r\n2. kokoh', '2.00', 'unit', '700000.00', '1400000.00', '70000.00', '140000.00', '30000.00', '60000.00', '-99', 'raja-ampat21.jpg'), ('138', '33', 'Jasa Pel', '1. Semua Kaca\r\n2. Semua lantai', '5.00', 'gedung', '1000000.00', '5000000.00', '1000000.00', '5000000.00', '30000.00', '150000.00', '-99', 'Untitled_Page10.png'), ('140', '33', 'Jasa sapu', '1. Harus Bersih\r\n2. Sapu ijuk', '6.00', 'Lantai Gedung', '5500000.00', '33000000.00', '4000000.00', '24000000.00', '10000.00', '60000.00', '-99', ''), ('141', '34', 'Cuci baju', '', '5.00', 'unit', '5000.00', '25000.00', '0.00', '0.00', '0.00', '0.00', '-99', ''), ('142', '37', 'xxxx', 'dsdsds', '12.00', 'd', '10000.00', '120000.00', '0.00', '0.00', '0.00', '0.00', '-99', ''), ('149', null, null, null, null, null, null, null, '0.00', null, '0.00', null, '0', ''), ('150', null, null, null, null, null, null, null, '0.00', null, '0.00', null, '0', ''), ('151', '41', '1', '1', '1.00', '1', '1.00', '1.00', '1.00', '1.00', '1.00', '1.00', '-99', 'Untitled_Page5.png'), ('152', '41', 'gaga', '3', '3.00', '3', '3.00', '9.00', '1.00', '3.00', '1.00', '3.00', '-99', 'Untitled_Page6.png'), ('154', '41', 'ada', '2', '2.00', '2', '2.00', '4.00', '1.00', '2.00', '1.00', '2.00', '6', ''), ('155', '41', 'gaga', '3', '3.00', '3', '3.00', '9.00', '1.00', '3.00', '1.00', '3.00', '6', ''), ('157', '42', 'awaw', 'haha\r\noy', '2.00', '2', '2.00', '4.00', '1.00', '2.00', '1.00', '2.00', '7', ''), ('158', '42', 'nasa', '3', '3.00', '3', '3.00', '9.00', '1.00', '3.00', '1.00', '3.00', '7', 'raja-ampat22.jpg'), ('159', '42', 'ga', '3', '3.00', '3', '3.00', '9.00', '1.00', '3.00', '1.00', '3.00', '-99', ''), ('160', '42', 'hh', '2', '2.00', '2', '2.00', '4.00', '1.00', '2.00', '1.00', '2.00', '7', '');
COMMIT;

-- ----------------------------
-- Table structure for t_dipa
-- ----------------------------
DROP TABLE IF EXISTS `t_dipa`;
CREATE TABLE `t_dipa` (
`dipa_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`dipa_nomor`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dipa_nomorsk`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dipa_deleted`  int(20) NULL DEFAULT 0 ,
`dipa_tanggal`  date NULL DEFAULT NULL ,
PRIMARY KEY (`dipa_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of t_dipa
-- ----------------------------
BEGIN;
INSERT INTO `t_dipa` VALUES ('3', 'DIP.245766768688', 'SK.1212121211111', '0', '2016-01-09'), ('4', 'DIP.345766768688', 'SK.111111111111', '0', '2016-01-10');
COMMIT;

-- ----------------------------
-- Table structure for t_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
`jbt_id`  int(11) NOT NULL AUTO_INCREMENT ,
`jbt_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`jbt_departemen`  int(11) NULL DEFAULT NULL ,
`jbt_deleted`  int(255) NULL DEFAULT NULL ,
PRIMARY KEY (`jbt_id`),
FOREIGN KEY (`jbt_departemen`) REFERENCES `t_departemen` (`dpt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_jabatan_departemen` (`jbt_departemen`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=34

;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
BEGIN;
INSERT INTO `t_jabatan` VALUES ('1', 'Kabag TU Pimpinan', '1', null), ('2', 'Kabag Rumah Tangga', '2', null), ('3', 'Kabag Perlengkapan', '3', null), ('4', 'Kabag Tata Usaha dan Persuratan', '4', null), ('5', 'Kasubbag Protokol', '5', null), ('6', 'Kasubbag TU Menteri', '6', null), ('7', 'Kasubbag TU Sekretariat Jenderal', '7', null), ('8', 'Kasubbag Urusan Dalam', '8', null), ('9', 'Kasubbag ANGKAMDAL', '9', null), ('10', 'Kasubbag Kesejahteraan', '10', null), ('11', 'Kasubbag Perencanaan dan Pemanfaatan', '11', null), ('12', 'Kasubbag Inventarisasi dan Penghapusan', '12', null), ('13', 'Kasubbag Pengadaan dan Penyaluran', '13', null), ('14', 'Kasubbag Persuratan', '14', null), ('15', 'Kasubbag Arsip', '15', null), ('16', 'Kasubbag Tata Usaha Biro', '16', null), ('17', 'Staff Pelaksana Protokol', '5', null), ('18', 'Staff Pelaksana TU Menteri', '6', null), ('19', 'Staff Pelaksana TU Sekretariat Jenderal', '7', null), ('20', 'Staff Pelaksana Urusan Dalam', '8', null), ('21', 'Staff Pelaksana ANGKAMDAL', '9', null), ('22', 'Staff Pelaksana Kesejahteraan', '10', null), ('23', 'Staff Perencanaan dan Pemanfaatan', '11', null), ('24', 'Staff Pelaksana Inventarisasi dan Penghapusan', '12', null), ('25', 'Staff Pelaksana Pengadaan dan Penyaluran', '13', null), ('26', 'Staff Pelaksana Persuratan', '14', null), ('27', 'Staff Pelaksana Arsip', '15', null), ('28', 'Staff Pelaksana Tata Usaha Biro', '16', null), ('29', 'Bendahara  Pengeluaran', '0', null), ('30', 'Pejabat Pengadaan Barang Jasa', '0', null), ('31', 'Pejabat Penandatangan SPM', '0', null), ('32', 'Kepala Biro Umum', '0', null), ('33', 'Pejabat Pembuat Komitmen', '17', null);
COMMIT;

-- ----------------------------
-- Table structure for t_konten
-- ----------------------------
DROP TABLE IF EXISTS `t_konten`;
CREATE TABLE `t_konten` (
`knt_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`knt_id`  int(100) NOT NULL ,
PRIMARY KEY (`knt_id`),
INDEX `knt_id` (`knt_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_konten
-- ----------------------------
BEGIN;
INSERT INTO `t_konten` VALUES ('Dari', '1'), ('Kepada', '2'), ('Tanggal', '3'), ('lampiran', '4'), ('Nomor', '9'), ('tanggal mulai pekerjaan', '10'), ('tanggal akhir pekerjaan', '11'), ('dipa', '12'), ('perwakilan', '13'), ('Nomor Keputusan Kuasa Pengguna Anggaran', '14'), ('Tanggal  Keputusan Kuasa Pengguna Anggaran', '15');
COMMIT;

-- ----------------------------
-- Table structure for t_master_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `t_master_penyusun`;
CREATE TABLE `t_master_penyusun` (
`msp_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`msp_sk`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`msp_tgl_input`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
`msp_ketua`  bigint(255) NULL DEFAULT NULL ,
`msp_anggota1`  bigint(255) NULL DEFAULT NULL ,
`msp_anggota2`  bigint(255) NULL DEFAULT NULL ,
`msp_anggota3`  bigint(255) NULL DEFAULT NULL ,
`msp_anggota4`  bigint(255) NULL DEFAULT NULL ,
`msp_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`msp_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of t_master_penyusun
-- ----------------------------
BEGIN;
INSERT INTO `t_master_penyusun` VALUES ('1', 'SK-123513412ADADEH', '2015-12-28 14:03:19', '21', '4', '5', '6', '24', '0');
COMMIT;

-- ----------------------------
-- Table structure for t_metode
-- ----------------------------
DROP TABLE IF EXISTS `t_metode`;
CREATE TABLE `t_metode` (
`mtd_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`mtd_unp`  bigint(255) NULL DEFAULT NULL ,
`mtd_kd_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`mtd_nm_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`mtd_penilaian`  char(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`mtd_nilai`  int(255) NULL DEFAULT NULL ,
`mtd_bobot`  decimal(65,2) NULL DEFAULT NULL ,
`mtd_jml_nilai`  decimal(65,2) NULL DEFAULT NULL ,
PRIMARY KEY (`mtd_id`),
FOREIGN KEY (`mtd_unp`) REFERENCES `t_unsur_penilaian` (`unp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_mtd_uns` (`mtd_unp`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=57

;

-- ----------------------------
-- Records of t_metode
-- ----------------------------
BEGIN;
INSERT INTO `t_metode` VALUES ('15', '2', 'PEM', 'pemahaman atas jasa layanan yang tercantum dalam KAK', 'B', '80', '0.30', '24.00'), ('16', '2', 'KET', 'ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan', 'C', '60', '0.07', '4.20'), ('17', '2', 'KON', 'konsistensi antara metodologi dengan  rencana kerja', 'A', '100', '0.04', '3.50'), ('18', '2', 'APR', 'apresiasi terhadap inovasi', 'C', '60', '0.04', '2.10'), ('19', '2', 'DUK', 'dukungan data yang tersedia terhadap KAK', 'B', '80', '0.04', '2.80'), ('20', '2', 'URA', 'uraian tugas', 'C', '60', '0.04', '2.10'), ('21', '2', 'JAN', 'jangka waktu pelaksanaan', 'B', '80', '0.04', '2.80'), ('22', '2', 'PRO', 'program kerja, jadwal pekerjaan, dan jadwal penugasan', 'A', '100', '0.04', '3.50'), ('23', '2', 'ORG', 'organisasi', 'A', '100', '0.04', '3.50'), ('24', '2', 'KEB', 'kebutuhan fasilitas penunjang', 'B', '80', '0.04', '2.80'), ('25', '2', 'PENA', 'penyajian analisis dan gambar-gambar kerja', 'A', '100', '0.04', '3.50'), ('26', '2', 'PENST', 'penyajian spesifikasi teknis dan perhitungan teknis', 'A', '100', '0.04', '3.50'), ('27', '2', 'PENL', 'penyajian laporan-laporan', 'A', '100', '0.03', '3.00'), ('28', '2', 'GAG', 'gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK', 'A', '100', '0.25', '25.00'), ('29', '2', 'PEM', 'pemahaman atas jasa layanan yang tercantum dalam KAK', 'B', '80', '0.30', '24.00'), ('30', '2', 'KET', 'ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan', 'C', '60', '0.07', '4.20'), ('31', '2', 'KON', 'konsistensi antara metodologi dengan  rencana kerja', 'A', '100', '0.04', '3.50'), ('32', '2', 'APR', 'apresiasi terhadap inovasi', 'C', '60', '0.04', '2.10'), ('33', '2', 'DUK', 'dukungan data yang tersedia terhadap KAK', 'B', '80', '0.04', '2.80'), ('34', '2', 'URA', 'uraian tugas', 'C', '60', '0.04', '2.10'), ('35', '2', 'JAN', 'jangka waktu pelaksanaan', 'B', '80', '0.04', '2.80'), ('36', '2', 'PRO', 'program kerja, jadwal pekerjaan, dan jadwal penugasan', 'A', '100', '0.04', '3.50'), ('37', '2', 'ORG', 'organisasi', 'A', '100', '0.04', '3.50'), ('38', '2', 'KEB', 'kebutuhan fasilitas penunjang', 'B', '80', '0.04', '2.80'), ('39', '2', 'PENA', 'penyajian analisis dan gambar-gambar kerja', 'A', '100', '0.04', '3.50'), ('40', '2', 'PENST', 'penyajian spesifikasi teknis dan perhitungan teknis', 'A', '100', '0.04', '3.50'), ('41', '2', 'PENL', 'penyajian laporan-laporan', 'A', '100', '0.03', '3.00'), ('42', '2', 'GAG', 'gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK', 'F', '0', '0.25', '0.00'), ('43', '2', 'PEM', 'pemahaman atas jasa layanan yang tercantum dalam KAK', 'B', '80', '0.30', '24.00'), ('44', '2', 'KET', 'ketepatan analisa yang disampaikan dan langkah pemecahan yang diusulkan', 'C', '60', '0.07', '4.20'), ('45', '2', 'KON', 'konsistensi antara metodologi dengan  rencana kerja', 'A', '100', '0.04', '3.50'), ('46', '2', 'APR', 'apresiasi terhadap inovasi', 'C', '60', '0.04', '2.10'), ('47', '2', 'DUK', 'dukungan data yang tersedia terhadap KAK', 'B', '80', '0.04', '2.80'), ('48', '2', 'URA', 'uraian tugas', 'C', '60', '0.04', '2.10'), ('49', '2', 'JAN', 'jangka waktu pelaksanaan', 'B', '80', '0.04', '2.80'), ('50', '2', 'PRO', 'program kerja, jadwal pekerjaan, dan jadwal penugasan', 'A', '100', '0.04', '3.50'), ('51', '2', 'ORG', 'organisasi', 'A', '100', '0.04', '3.50'), ('52', '2', 'KEB', 'kebutuhan fasilitas penunjang', 'B', '80', '0.04', '2.80'), ('53', '2', 'PENA', 'penyajian analisis dan gambar-gambar kerja', 'A', '100', '0.04', '3.50'), ('54', '2', 'PENST', 'penyajian spesifikasi teknis dan perhitungan teknis', 'A', '100', '0.04', '3.50'), ('55', '2', 'PENL', 'penyajian laporan-laporan', 'F', '0', '0.03', '0.00'), ('56', '2', 'GAG', 'gagasan baru yang diajukan oleh peserta untuk meningkatkan kualitas keluaran yang diinginkan dalam KAK', 'F', '0', '0.25', '0.00');
COMMIT;

-- ----------------------------
-- Table structure for t_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
`pgw_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`pgw_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgw_jabatan`  int(20) NULL DEFAULT NULL ,
`pgw_nip`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`pgw_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgw_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`pgw_id`),
FOREIGN KEY (`pgw_jabatan`) REFERENCES `t_jabatan` (`jbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `pgw_id` (`pgw_id`) USING BTREE ,
INDEX `fk_pegawai_jabatan` (`pgw_jabatan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=25

;

-- ----------------------------
-- Records of t_pegawai
-- ----------------------------
BEGIN;
INSERT INTO `t_pegawai` VALUES ('4', 'tets1', '17', '212121212121', '12121111111111111111', '0'), ('5', 'Admin', '17', '33333333333333333', '111111111111111111', '0'), ('6', 'Sukijan', '17', '999999999', '111111111122222', '0'), ('7', 'Prijaambodo Mardianto', '30', '19680325 199403 1 007', '08129454602', '0'), ('8', 'Riyani Indarti', '33', '19571118 198403 2 001', '08111907102', '0'), ('9', 'Drama Panca Putra', '1', '19730930 200112 1 001', '08129066507', '0'), ('10', 'Jaulim Sirait', '2', '19631231 198508 1 001', '0811106625', '0'), ('11', 'Gun Yanto', '3', '19610817 198703 1 001', '082112923699', '0'), ('12', 'Bastian Siri', '4', '19590329 198603 1 001', '081398447159', '0'), ('13', 'Mahfudl Umar', '5', '19810308 200604 1 005', '081318573945', '0'), ('14', 'Ety Dwi Wijayanti', '6', '19701015 199903 2 002', '082114194660', '0'), ('15', 'Arif Budiman', '7', '19781208 200312 1 005', '08111346285', '0'), ('16', 'Abadi Yanto', '8', '19660401 198603 1 001', '081297221881', '0'), ('17', 'Andrian Ernanto', '9', '19670731 199903  1 001', '081381041775', '0'), ('18', 'Veramon', '10', '19710401 199803 1 004', '08111991971', '0'), ('19', 'Suko Hariyanto', '11', '19640220 198603 1 001', '08161387429', '0'), ('20', 'Ferry Hardiyanto', '12', '19780119 200312 1 003', '08159744595', '0'), ('21', 'Achmad Al Farisi', '14', '19790215 200502 1 001', '08179800413', '0'), ('22', 'Sunarto', '15', '19631008 198603 1 004', '085717722245', '0'), ('23', 'Triono Probo Pangesti', '16', '19750308 199903 1 001 ', '081295964578', '0'), ('24', 'Onny', '26', '198304172009011004', '085642504390', '0');
COMMIT;

-- ----------------------------
-- Table structure for t_pengadaan
-- ----------------------------
DROP TABLE IF EXISTS `t_pengadaan`;
CREATE TABLE `t_pengadaan` (
`pgd_id`  bigint(25) NOT NULL AUTO_INCREMENT ,
`pgd_perihal`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgd_deleted`  int(255) NULL DEFAULT 0 ,
`pgd_uraian_pekerjaan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgd_tanggal_input`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ,
`pgd_anggaran`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgd_user_update`  bigint(20) NULL DEFAULT NULL ,
`pgd_lama_pekerjaan`  int(255) NULL DEFAULT NULL ,
`pgd_lama_penawaran`  int(255) NULL DEFAULT NULL ,
`pgd_tgl_mulai_pengadaan`  date NULL DEFAULT NULL COMMENT 'tanggal dimulai pengadaan' ,
`pgd_penyusun`  bigint(255) NULL DEFAULT NULL COMMENT 'id penyusun' ,
`pgd_jml_sblm_ppn_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_sblm_ppn_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_sblm_ppn_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_wkt_awal_penawaran`  timestamp NULL DEFAULT NULL COMMENT 'waktu awal pemasukkan dokumen penawaran' ,
`pgd_wkt_akhir_penawaran`  timestamp NULL DEFAULT NULL COMMENT 'waktu akhir pemasukkan dokumen penawaran' ,
`pgd_tipe_pengadaan`  int(255) NULL DEFAULT NULL COMMENT '0 : Barang 1:Jasa 2:Konsultan' ,
`pgd_status_pengadaan`  int(255) NULL DEFAULT 0 COMMENT '0:HPS 1:penawaran 2:fix 3:pengumuman 4:spk 5:selesai' ,
`pgd_status_selesai`  int(2) NULL DEFAULT 0 COMMENT 'status pengadaan telah selesai' ,
`pgd_supplier`  int(255) NULL DEFAULT NULL ,
`pgd_dgn_pajak`  int(255) NULL DEFAULT NULL COMMENT 'status dengan pajak atau tidak. 0 tanpa pajak, 1 dengan pajak' ,
`pgd_smbr_dana`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'sumber pendanaan (seperti tahun 2015,2016,2017)' ,
`pgd_tgl_pemasukkan_pnr`  timestamp NULL DEFAULT NULL COMMENT 'tanggal pemasukan penawaran' ,
`pgd_no_srt_penawaran`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' COMMENT 'nomor surat penawaran' ,
`pgd_perwakilan_spl`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' COMMENT 'nama perwakilan supplier' ,
`pgd_jbt_perwakilan_spl`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '' COMMENT 'Jabatan perwakilan supplier' ,
`pnc_kesesuaian_ttd`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_alamat_spl`  int(255) NULL DEFAULT 0 ,
`pnc_srt_penawaran`  int(255) NULL DEFAULT 0 ,
`pnc_daftar_knts_hrg`  int(255) NULL DEFAULT 0 ,
`pnc_dok_pnr_teknis`  int(255) NULL DEFAULT 0 ,
`pnc_isian_kualifikasi`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_spec_teknis`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_jdwl_kerja`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_identitas`  int(255) NULL DEFAULT 0 ,
`pnc_evaluasi_teknis_konsultan`  int(255) NULL DEFAULT 0 ,
`pgd_pembukaan_dok_pnr`  timestamp NULL DEFAULT NULL COMMENT 'pembukaan dokumen penawaran' ,
`pgd_klr_teknis_nego_hrg`  timestamp NULL DEFAULT NULL COMMENT 'Klarifikasi Teknis dan Negoisasi Harga' ,
`pgd_penandatangan_spk`  date NULL DEFAULT NULL ,
`pgd_nama_ppk`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgd_nama_pejpeng`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`pgd_id`),
FOREIGN KEY (`pgd_penyusun`) REFERENCES `t_master_penyusun` (`msp_id`) ON DELETE SET NULL ON UPDATE SET NULL,
FOREIGN KEY (`pgd_supplier`) REFERENCES `t_supplier` (`spl_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`pgd_anggaran`) REFERENCES `t_anggaran` (`ang_kode`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`pgd_user_update`) REFERENCES `t_user` (`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_pgd_ang` (`pgd_anggaran`) USING BTREE ,
INDEX `fk_pgd_usr` (`pgd_user_update`) USING BTREE ,
INDEX `sdfs` (`pgd_supplier`) USING BTREE ,
INDEX `pgd_penyusun` (`pgd_penyusun`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=47

;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_pengadaan` VALUES ('15', 'Pekerjaan Pembersihan dan Silent Kaca Luar Gedung GMB III', '0', 'Melakukan pemeliharaan gedung dengan melakukan pembersihan kaca luar gedung yang sudah kotor dan melakukan silent kaca yang telah bocor', '2015-04-07 11:54:02', '12345', '1', '45', '30', '2015-11-21', '1', '13812000.00', '15193200.02', '84375.00', '92812.50', '76175.00', '83792.50', '2015-12-05 10:03:49', '2015-12-19 10:03:49', '1', '4', '0', '1', '0', null, '2016-01-05 23:21:25', 'b21.31121212', 'Sugiri', 'Direktur', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2015-12-19 11:44:47', '2015-12-21 11:45:03', '2016-01-21', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('19', 'Pengadaan barang yyy', '0', 'PEngadaan barang bagus yyy', '2015-09-16 07:26:15', '12345', '1', '30', '4', '2015-11-25', null, '1200.00', '1320.00', '0.00', '0.00', '0.00', '0.00', null, null, '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('20', 'dfshaasdasdas', '1', 're', '2015-12-17 11:50:24', '12345', '1', '3', '5', '2015-11-25', null, '36300.00', '39930.00', '6150.00', '6765.00', '3150.00', '3465.00', null, null, '0', '2', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('21', 'Pengadaan keempat dsd', '1', 'asdff xxx', '2015-12-17 11:50:25', '54321', '1', '3', '45', '2015-12-02', null, '32500.00', '35750.00', '24600.00', '27060.00', '0.00', '0.00', null, null, '0', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('22', 'Pengadaan kelima', '1', '444', '2015-12-17 11:50:26', '54321', '1', '5', '5', '2015-12-02', null, '19000.00', '20900.00', '14727.00', '16199.70', '12900.00', '14190.00', null, null, '0', '2', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('23', 'Pekerjaan pembersihan lantai xxx', '1', 'Membersihkan lantai semuanya', '2015-12-17 11:50:27', '54321', '1', '6', '6', '2015-12-02', null, '170000.00', '187000.00', '157500.00', '173250.00', '150000.00', '165000.00', null, null, '1', '2', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('24', 'Pekerjaan pembersihan taman ccc', '1', 'Membersihkan taman depan gedung', '2015-12-17 11:50:28', '12345', '1', '4', '4', '2015-12-02', null, '250000.00', '275000.00', '250000.00', '275000.00', '0.00', '0.00', null, null, '1', '1', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('25', 'pengadaan susu murni', '1', 'pengadaan susu murni sepesial maknyosss', '2015-12-17 11:50:29', '54321', '3', '45', '45', '2015-12-13', null, '1500000.00', '1650000.00', '0.00', '0.00', '0.00', '0.00', '2015-12-13 07:20:00', '2015-12-19 19:39:00', '0', '0', '0', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('26', 'Pengaadaan celana panjang', '1', 'Pengadaan baju oh yea', '2016-01-17 11:11:12', '12345', '1', '40', '50', null, '1', '2590000.00', '2849000.00', '51500.00', '56650.00', '0.00', '0.00', '2016-01-17 00:00:00', '2016-01-24 00:00:00', '0', '0', '0', '1', '1', '2016', null, null, null, null, null, null, null, null, null, null, null, null, null, '0', null, null, null, null, null), ('27', 'Pengadaan Makanan', '0', 'fasfsd', '2016-01-22 23:04:07', '12345', '1', '5', '4', null, '1', '262000.00', '262000.00', '54.00', '54.00', '29.00', '29.00', '2016-01-14 05:00:00', '2016-01-29 07:00:00', '0', '5', '1', '1', '1', '2016', '2016-01-24 00:00:00', 'we', 'fr', 'frf', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2016-01-22 00:00:00', '2016-01-23 08:14:00', '2016-01-23', null, null), ('30', 'pengadaan jasa minuman', '1', 'gagaga', '2016-01-23 01:32:09', '12345', '1', '5', '5', null, '1', '29439.00', '32382.90', '88.00', '96.80', '0.00', '0.00', '2016-01-15 00:00:00', '2016-01-30 08:00:00', '1', '0', '-1', '1', '0', '2016', '2016-01-29 00:00:00', 'gdf', 'dfg', 'dfg', '1', '1', '1', '1', '1', '1', '1', '1', null, '0', '2016-01-30 00:00:00', '2016-01-23 05:19:00', '2016-01-24', null, null), ('31', 'gaga', '1', '4', '2016-01-23 01:36:48', '12345', '1', '4', '4', null, '1', '27.00', '29.70', '0.00', '0.00', '0.00', '0.00', '2016-01-23 00:00:00', '2016-01-30 00:00:00', '1', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-01-23 00:00:00', '2016-01-29 00:00:00', '2016-01-23', null, null), ('32', 'Pengadaan Kursi A', '0', 'Pengadaan Kursi panjang', '2016-01-23 19:59:00', '12345', '1', '5', '10', null, '1', '3900000.00', '4290000.01', '390000.00', '429000.00', '210000.00', '231000.00', '2016-01-21 05:00:00', '2016-01-31 18:00:00', '0', '5', '1', '1', '0', '2016', '2016-01-28 00:00:00', '555gfgs', 'Esa', 'Ganteng', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2016-01-23 00:00:00', '2016-01-30 13:00:00', '2016-01-23', null, null), ('33', 'Pengadaan Jasa pembersihan', '0', 'pembersihan gedung', '2016-01-23 20:53:13', '12345', '1', '5', '8', null, '1', '38000000.00', '38000000.00', '29000000.00', '29000000.00', '210000.00', '210000.00', '2016-01-21 06:00:00', '2016-01-30 10:00:00', '1', '5', '1', '1', '1', '2016', '2016-01-28 00:00:00', 'gfd', 'Esa', 'haha', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2016-01-22 00:00:00', '2016-01-31 10:00:00', '2016-01-28', null, null), ('34', 'Pengadaan Cuci baju', '0', 'afadfsdf', '2016-01-23 22:38:45', '12345', '1', '4', '4', null, '1', '25000.00', '27500.00', '0.00', '0.00', '0.00', '0.00', '2016-01-23 00:00:00', '2016-01-31 00:00:00', '1', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-01-23 00:00:00', '2016-01-23 00:00:00', '2016-01-23', null, null), ('35', 'AAAAA', '0', 'AAAAAA', '2016-01-24 07:45:35', '12345', '1', '12', '12', null, '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2016-01-16 00:00:00', '2016-01-22 00:00:00', '1', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-01-09 00:00:00', '2016-01-22 00:00:00', '2016-01-23', null, null), ('36', 'aaa', '0', 'aaaa', '2016-01-24 07:56:59', '12345', '1', '1', '1', null, '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2016-01-24 00:00:00', '2016-01-24 00:00:00', '0', '0', '0', '3', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-01-22 00:00:00', '2016-01-23 00:00:00', '2016-01-24', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('37', 'Pengadaan Nopa', '0', 'blb bla bla', '2016-02-06 07:37:00', '12345', '1', '12', '12', null, '1', '120000.00', '132000.00', '0.00', '0.00', '0.00', '0.00', '2016-02-06 00:00:00', '2016-02-13 00:00:00', '0', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-02-06 00:00:00', '2016-02-14 00:00:00', '2016-02-14', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('38', 'Pengadaan Konsultasi Desain Interior', '0', 'Konsultasi desaign ', '2016-02-23 18:39:59', '12345', '1', '5', '5', null, '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2016-02-23 05:43:00', '2016-02-23 06:38:00', '2', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-02-26 13:31:00', '2016-02-23 07:28:00', '2016-02-26', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('39', 'da', '0', '55', '2016-03-03 19:55:42', '12345', '1', '5', '5', null, '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '2016-03-03 00:00:00', '2016-03-10 00:00:00', '2', '0', '0', '1', '0', '2016', null, '', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2016-03-03 00:00:00', '2016-03-17 00:00:00', '2016-03-03', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('41', 'Pengadaan April1as', '0', 'Hahhahaha', '2016-03-16 19:34:14', '12345', '1', '5000', '4', null, '1', '23.00', '23.00', '9.00', '9.00', '9.00', '9.00', '2016-03-16 00:00:00', '2016-03-20 00:00:00', '0', '1', '0', '3', '1', '2016', '2016-03-18 00:00:00', '4343', 'haha', 'hahah', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2016-03-17 00:00:00', '2016-03-24 00:00:00', '2016-03-17', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('42', 'Jasajasafa', '0', '5fafasfa', '2016-03-16 22:21:31', '54321', '1', '1000', '2', null, '1', '26.00', '28.60', '10.00', '11.00', '10.00', '11.00', '2016-03-17 00:00:00', '2016-03-31 00:00:00', '1', '0', '0', '1', '0', '2016', '2016-03-17 00:00:00', 'afdaf', '323', '2r32', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '2016-03-25 00:00:00', '2016-03-26 00:00:00', '2016-03-24', 'Riyani Indarti', 'Prijaambodo Mardianto'), ('46', 'wawawa', '0', 'adfs', '2016-03-17 18:52:23', '12345', '1', '2', '3', null, '1', '702000.00', '772200.00', '6386.00', '7024.60', '111.00', '122.10', '2016-03-17 00:00:00', '2016-03-31 00:00:00', '2', '0', '0', '1', '0', '2016', '2016-03-17 00:00:00', 'dsf', 'fgs', 'sdg', '1', '1', '1', '1', '1', '1', null, null, null, '1', '2016-03-24 00:00:00', '2016-03-31 00:00:00', '2016-03-31', 'Riyani Indarti', 'Prijaambodo Mardianto');
COMMIT;

-- ----------------------------
-- Table structure for t_pengalaman_kerja
-- ----------------------------
DROP TABLE IF EXISTS `t_pengalaman_kerja`;
CREATE TABLE `t_pengalaman_kerja` (
`pnk_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`pnk_psi`  bigint(255) NULL DEFAULT NULL ,
`pnk_uraian_pengalaman`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnk_jangka_wkt_bln`  decimal(65,2) NULL DEFAULT NULL ,
`pnk_kesesuaian_pekerjaan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnk_nilai_pekerjaan`  decimal(65,2) NULL DEFAULT 0.00 ,
`pnk_kesesuaian_posisi`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnk_nilai_posisi`  decimal(65,2) NULL DEFAULT 0.00 ,
`pnk_perhitungan_bln_kerja`  decimal(65,2) NULL DEFAULT 0.00 ,
PRIMARY KEY (`pnk_id`),
FOREIGN KEY (`pnk_psi`) REFERENCES `t_personal_inti` (`psi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_pnk_psi` (`pnk_psi`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=21

;

-- ----------------------------
-- Records of t_pengalaman_kerja
-- ----------------------------
BEGIN;
INSERT INTO `t_pengalaman_kerja` VALUES ('17', '19', 'gaga', '5.00', 'M', '0.50', 'TA', '0.00', '0.00'), ('18', '19', 'fasdf', '4.00', 'M', '0.50', 'TS', '0.50', '1.00'), ('19', '23', 'gaga', '3.00', 'M', '0.50', 'S', '1.00', '1.50'), ('20', '23', 'gag', '4.00', 'S', '1.00', 'S', '1.00', '4.00');
COMMIT;

-- ----------------------------
-- Table structure for t_pengalaman_prs
-- ----------------------------
DROP TABLE IF EXISTS `t_pengalaman_prs`;
CREATE TABLE `t_pengalaman_prs` (
`pnp_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`pnp_unp`  bigint(255) NULL DEFAULT NULL ,
`pnp_kd_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnp_nm_sub`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pnp_jml_sub`  decimal(65,0) NULL DEFAULT NULL ,
`pnp_bobot`  decimal(65,3) NULL DEFAULT NULL ,
`pnp_nilai`  decimal(65,3) NULL DEFAULT NULL ,
PRIMARY KEY (`pnp_id`),
FOREIGN KEY (`pnp_unp`) REFERENCES `t_unsur_penilaian` (`unp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_pnp_unp` (`pnp_unp`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=37

;

-- ----------------------------
-- Records of t_pengalaman_prs
-- ----------------------------
BEGIN;
INSERT INTO `t_pengalaman_prs` VALUES ('13', '2', 'NP', 'Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)', '1', '40.000', '40.000'), ('14', '2', 'NPL', 'Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)', '1', '15.000', '15.000'), ('15', '2', 'NPLF', 'Pengalaman sebagai lead firm (NPLF)', '1', '6.667', '6.667'), ('16', '2', 'NPK', 'Pengalaman mengelola kontrak (NPK)', '1', '6.667', '6.667'), ('17', '2', 'NFU', 'Ketersediaan fasilitas utama (NFU)', '1', '6.667', '6.667'), ('18', '2', 'KP', 'Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)', '1', '25.000', '25.000'), ('19', '2', 'NP', 'Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)', '2', '40.000', '40.000'), ('20', '2', 'NPL', 'Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)', '1', '15.000', '15.000'), ('21', '2', 'NPLF', 'Pengalaman sebagai lead firm (NPLF)', '1', '6.667', '6.667'), ('22', '2', 'NPK', 'Pengalaman mengelola kontrak (NPK)', '1', '6.667', '6.667'), ('23', '2', 'NFU', 'Ketersediaan fasilitas utama (NFU)', '1', '6.667', '6.667'), ('24', '2', 'KP', 'Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)', '1', '25.000', '25.000'), ('25', '2', 'NP', 'Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)', '2', '40.000', '40.000'), ('26', '2', 'NPL', 'Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)', '1', '15.000', '15.000'), ('27', '2', 'NPLF', 'Pengalaman sebagai lead firm (NPLF)', '1', '6.667', '6.667'), ('28', '2', 'NPK', 'Pengalaman mengelola kontrak (NPK)', '1', '6.667', '6.667'), ('29', '2', 'NFU', 'Ketersediaan fasilitas utama (NFU)', '1', '6.667', '6.667'), ('30', '2', 'KP', 'Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)', '1', '25.000', '25.000'), ('31', '2', 'NP', 'Sub unsur pengalaman melaksanakan kegiatan sejenis (NP)', '2', '40.000', '40.000'), ('32', '2', 'NPL', 'Sub unsur pengalaman melaksanakan di lokasi kegiatan (NPL)', '1', '15.000', '15.000'), ('33', '2', 'NPLF', 'Pengalaman sebagai lead firm (NPLF)', '1', '6.667', '6.667'), ('34', '2', 'NPK', 'Pengalaman mengelola kontrak (NPK)', '1', '6.667', '6.667'), ('35', '2', 'NFU', 'Ketersediaan fasilitas utama (NFU)', '1', '6.667', '6.667'), ('36', '2', 'KP', 'Sub unsur kapasitas perusahaan dengan memperhatikan jumlah tenaga ahli tetap (KP)', '1', '25.000', '25.000');
COMMIT;

-- ----------------------------
-- Table structure for t_personal_inti
-- ----------------------------
DROP TABLE IF EXISTS `t_personal_inti`;
CREATE TABLE `t_personal_inti` (
`psi_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`psi_uns`  bigint(255) NULL DEFAULT NULL ,
`psi_dtk`  bigint(255) NULL DEFAULT NULL ,
`psi_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`psi_bobot`  decimal(65,2) NULL DEFAULT NULL ,
`psi_kesesuaian_ijasah`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`psi_nilai_ks_ijasah`  int(255) NULL DEFAULT 0 ,
`psi_jml_nilai_ks_ijasah`  decimal(65,2) NULL DEFAULT 0.00 ,
`psi_masa_kerja`  decimal(65,2) NULL DEFAULT 0.00 ,
`psi_nilai_kerja`  int(255) NULL DEFAULT 0 ,
`psi_jml_nilai_kerja`  decimal(65,2) NULL DEFAULT 0.00 ,
`psi_memiliki_sertifikat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`psi_nilai_sertifikat`  int(255) NULL DEFAULT 0 ,
`psi_jml_nilai_sertifikat`  decimal(65,2) NULL DEFAULT 0.00 ,
`psi_nilai`  decimal(65,0) NULL DEFAULT NULL ,
`psi_jumlah`  decimal(65,0) NULL DEFAULT NULL ,
`psi_jangka_wkt_pro`  decimal(65,0) NULL DEFAULT NULL ,
PRIMARY KEY (`psi_id`),
FOREIGN KEY (`psi_dtk`) REFERENCES `t_detail_konsultan1` (`dtk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`psi_uns`) REFERENCES `t_unsur_penilaian` (`unp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_psi_uns` (`psi_uns`) USING BTREE ,
INDEX `fk_psi_dtk` (`psi_dtk`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=24

;

-- ----------------------------
-- Records of t_personal_inti
-- ----------------------------
BEGIN;
INSERT INTO `t_personal_inti` VALUES ('19', '2', '8', 'wd', '2.00', 'S', '100', '40.00', '0.08', '50', '20.00', 'M', '100', '20.00', '80', '160', null), ('23', '2', '9', 'tata', '10.00', 'SB', '75', '30.00', '0.46', '50', '20.00', 'TM', '0', '0.00', '50', '500', null);
COMMIT;

-- ----------------------------
-- Table structure for t_sub_judul
-- ----------------------------
DROP TABLE IF EXISTS `t_sub_judul`;
CREATE TABLE `t_sub_judul` (
`sjd_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`sjd_sub_judul`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sjd_jenis`  int(255) NULL DEFAULT NULL COMMENT '0 : barang 1: jasa 2: konsultan' ,
PRIMARY KEY (`sjd_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=8

;

-- ----------------------------
-- Records of t_sub_judul
-- ----------------------------
BEGIN;
INSERT INTO `t_sub_judul` VALUES ('1', 'ad', '2'), ('2', 'test', '0'), ('3', 'testsa', '2'), ('4', 'haha', '2'), ('5', 'hjh', '2'), ('6', 'sub barang', '0'), ('7', 'sub jasa1', '1');
COMMIT;

-- ----------------------------
-- Table structure for t_supplier
-- ----------------------------
DROP TABLE IF EXISTS `t_supplier`;
CREATE TABLE `t_supplier` (
`spl_id`  int(25) NOT NULL AUTO_INCREMENT ,
`spl_NPWP`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_alamat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_deleted`  int(255) NULL DEFAULT 0 ,
`spl_rekening`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_bank`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`spl_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of t_supplier
-- ----------------------------
BEGIN;
INSERT INTO `t_supplier` VALUES ('1', '02-248.853.0-039.000', '11111', 'Jalan Parahyangan', 'PT. Merdeka', '0', '0198882772177178', 'BNI'), ('2', null, null, null, null, '1', null, null), ('3', '232423423', '022-7343243', ' Jalan Pedes banget', 'PT. Gabus', '0', '4234  432423 4234234', null);
COMMIT;

-- ----------------------------
-- Table structure for t_surat
-- ----------------------------
DROP TABLE IF EXISTS `t_surat`;
CREATE TABLE `t_surat` (
`srt_id`  int(11) NOT NULL ,
`srt_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`srt_id`),
INDEX `srt_id` (`srt_id`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_surat
-- ----------------------------
BEGIN;
INSERT INTO `t_surat` VALUES ('1', 'Memorandum'), ('2', 'HPS'), ('3', 'Daftar Harga'), ('4', 'Spesifikasi Teknis'), ('5', 'LDP'), ('6', 'Undangan'), ('7', 'Berita Acara Pemasukan'), ('8', 'Berita Acara Evaluasi Administrasi'), ('9', 'Berita Acara Evaluasi Harga'), ('10', 'Berita Acara Evaluasi Teknis'), ('11', 'Berita Acara Evaluasi Kualifikasi'), ('12', 'Berita Acara Klarifikasi'), ('13', 'Berita Acara Hasil Pengadaan Langsung'), ('14', 'Penetapan Penyedia Barang dan Jasa'), ('15', 'Pengumuman Penyedia Barang dan Jasa'), ('16', 'Memorandum II'), ('17', 'Memorandum III'), ('18', 'Surat Perintah Kerja'), ('19', 'Surat Perintah Mulai Kerja');
COMMIT;

-- ----------------------------
-- Table structure for t_suratizin
-- ----------------------------
DROP TABLE IF EXISTS `t_suratizin`;
CREATE TABLE `t_suratizin` (
`siz_id`  int(25) NOT NULL AUTO_INCREMENT ,
`siz_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`siz_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`siz_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=10

;

-- ----------------------------
-- Records of t_suratizin
-- ----------------------------
BEGIN;
INSERT INTO `t_suratizin` VALUES ('1', 'Surat Izin Usaha Perdangangan (SIUP) Kecil', '0'), ('2', 'TDP', '0'), ('3', 'PKP', '0'), ('4', 'Akta Perusahaan', '0'), ('5', 'NPWP', '0'), ('6', 'KTP Direksi', '0'), ('7', 'Pakta Integritas', '0'), ('8', 'Keterangan Domisili', '0'), ('9', 'Rekening Koran', '0');
COMMIT;

-- ----------------------------
-- Table structure for t_unsur_penilaian
-- ----------------------------
DROP TABLE IF EXISTS `t_unsur_penilaian`;
CREATE TABLE `t_unsur_penilaian` (
`unp_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`unp_pgd`  bigint(255) NULL DEFAULT NULL ,
`unp_bobot_png_prs`  decimal(65,2) NULL DEFAULT 0.20 COMMENT 'bobot pengalaman perusahaan' ,
`unp_nilai_png_prs`  decimal(65,2) NULL DEFAULT 0.00 ,
`unp_jml_png_prs`  decimal(65,2) NULL DEFAULT 0.00 ,
`unp_bobot_pnd_mtd`  decimal(65,2) NULL DEFAULT 0.20 ,
`unp_nilai_pnd_mtd`  decimal(65,2) NULL DEFAULT 0.00 ,
`unp_jml_pnd_mtd`  decimal(65,2) NULL DEFAULT 0.00 ,
`unp_bobot_kua_tna`  decimal(65,2) NULL DEFAULT 0.60 ,
`unp_nilai_kua_tna`  decimal(65,2) NULL DEFAULT 0.00 ,
`unp_jml_kua_tna`  decimal(65,2) NULL DEFAULT 0.00 ,
PRIMARY KEY (`unp_id`),
FOREIGN KEY (`unp_pgd`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_unp_pgd` (`unp_pgd`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of t_unsur_penilaian
-- ----------------------------
BEGIN;
INSERT INTO `t_unsur_penilaian` VALUES ('2', '46', '0.20', '100.00', '20.00', '0.20', '58.30', '11.66', '0.60', '660.00', '396.00');
COMMIT;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
`usr_role`  int(11) NULL DEFAULT NULL ,
`usr_pegawai`  bigint(25) NULL DEFAULT NULL ,
`usr_id`  bigint(2) NOT NULL AUTO_INCREMENT ,
`usr_username`  varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_password`  varchar(75) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`usr_email`  varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`usr_deleted`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`usr_id`),
FOREIGN KEY (`usr_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_user_pegawai` (`usr_pegawai`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', '6', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '0'), ('2', '4', '3', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0'), ('1', '5', '4', 'Susis', 'e807f1fcf82d132f9bb018ca6738a19f', 'falih32@gmail.com', '1'), ('1', '5', '5', 'Admin32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0'), ('1', '4', '6', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0');
COMMIT;

-- ----------------------------
-- Table structure for tr_detail_konten
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail_konten`;
CREATE TABLE `tr_detail_konten` (
`dknt_isi`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`dknt_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`dknt_idkonten`  int(255) NOT NULL ,
`dknt_detailsurat`  bigint(255) NOT NULL ,
PRIMARY KEY (`dknt_id`),
FOREIGN KEY (`dknt_idkonten`) REFERENCES `t_konten` (`knt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`dknt_detailsurat`) REFERENCES `tr_detail_surat` (`dsrt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_dknten_idkonten` (`dknt_idkonten`) USING BTREE ,
INDEX `tr_detailsurat` (`dknt_detailsurat`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=231

;

-- ----------------------------
-- Records of tr_detail_konten
-- ----------------------------
BEGIN;
INSERT INTO `tr_detail_konten` VALUES ('9', '93', '1', '46'), ('11', '94', '2', '46'), ('2015-12-02', '95', '3', '46'), ('2015-12-03', '96', '3', '47'), ('1066/PPK.5/VI/2015', '97', '9', '47'), ('2015-12-03', '98', '3', '48'), ('114.7/PPK.5/VI/2015', '99', '9', '48'), ('2016-01-03', '100', '3', '49'), ('2016-01-01', '101', '3', '50'), ('2016-01-02', '102', '3', '52'), ('udg.114.8/ppk.5/vI/20015', '103', '9', '53'), ('2016-01-02', '104', '3', '53'), ('2', '105', '4', '53'), ('2016-01-07', '106', '3', '54'), ('BA.118.6/PPK.5/VI/2015', '107', '9', '54'), ('2016-01-01', '108', '3', '55'), ('BAEA.118.7/PPK.5/VI/2015', '109', '9', '55'), ('2016-01-01', '110', '3', '56'), ('BAET.118.8/PPK.5/VI/2015', '111', '9', '56'), ('2016-01-01', '112', '3', '57'), ('BAEH.118.9/PPK.5/VI/2015', '113', '9', '57'), ('2016-01-01', '114', '3', '58'), ('BAEK.118.10/PPK.5/VI/2015', '115', '9', '58'), ('2016-01-01', '116', '3', '59'), ('BAH.119.10/PPK.5/VI/2015', '117', '9', '59'), ('2016-01-01', '118', '3', '60'), ('SP.119.11/PPK.5/VI/2015', '119', '9', '60'), ('2016-01-02', '120', '3', '61'), ('SPeng.119.12/PPK.5/VI/2015', '121', '9', '61'), ('BAK.12112121221', '127', '9', '63'), ('2016-01-02', '128', '3', '63'), ('SKP.asasaasas', '129', '14', '63'), ('2016-01-03', '130', '15', '63'), ('2016-01-17', '135', '3', '65'), ('SPMK.12344543', '136', '9', '65'), ('2016-01-01', '137', '3', '66'), ('SPK.2222222111', '138', '9', '66'), ('2016-01-05', '139', '10', '66'), ('2016-01-24', '140', '11', '66'), ('DIP.345766768688', '141', '12', '66'), ('4', '142', '1', '67'), ('5', '143', '2', '67'), ('2016-01-23', '144', '3', '67'), ('2016-01-23', '145', '3', '68'), ('567576576576', '146', '9', '68'), ('2016-01-23', '147', '3', '69'), ('578575757587', '148', '9', '69'), ('2016-01-23', '149', '3', '70'), ('7', '150', '1', '71'), ('4', '151', '2', '71'), ('2016-01-05', '152', '3', '71'), ('2016-01-28', '153', '3', '72'), ('gdfgdgdf', '154', '9', '72'), ('2016-01-22', '155', '3', '73'), ('fsdfsdfsdsdf', '156', '9', '73'), ('2016-01-23', '157', '3', '74'), ('2016-01-23', '158', '3', '75'), ('2016-01-22', '159', '3', '76'), ('sdfdsf', '160', '9', '77'), ('2016-01-23', '161', '3', '77'), ('2', '162', '4', '77'), ('2016-01-22', '163', '3', '78'), ('2016-01-23', '164', '3', '79'), ('ddsfs', '165', '9', '80'), ('2016-01-23', '166', '3', '80'), ('2', '167', '4', '80'), ('2016-01-23', '168', '3', '81'), ('567576576', '169', '9', '81'), ('2016-01-23', '170', '3', '82'), ('gfg66666', '171', '9', '82'), ('2016-01-24', '172', '3', '83'), ('fhgfhfhgf', '173', '9', '83'), ('2016-01-23', '174', '3', '84'), ('gffjhgfh', '175', '9', '84'), ('2016-01-23', '176', '3', '85'), ('ghjgjhg', '177', '9', '85'), ('2016-01-23', '178', '3', '86'), ('32342efef', '179', '9', '86'), ('2016-01-07', '180', '3', '87'), ('fafaa', '181', '9', '87'), ('2016-01-24', '182', '3', '88'), ('fadfdasffas', '183', '9', '88'), ('2016-01-23', '184', '3', '89'), ('fasdaf', '185', '9', '89'), ('2016-01-23', '186', '3', '90'), ('ggg', '187', '9', '90'), ('dfasf', '188', '9', '91'), ('2016-01-23', '189', '3', '91'), ('fdf44', '190', '14', '91'), ('2016-01-23', '191', '15', '91'), ('2016-01-23', '192', '3', '92'), ('gjgjg', '193', '9', '92'), ('2016-01-23', '194', '3', '93'), ('t665656', '195', '9', '93'), ('2016-01-23', '196', '3', '94'), ('55555545', '197', '9', '94'), ('2016-01-23', '198', '3', '95'), ('gsgfds', '199', '9', '95'), ('2016-01-21', '200', '10', '95'), ('2016-01-30', '201', '11', '95');
INSERT INTO `tr_detail_konten` VALUES ('DIP.345766768688', '202', '12', '95'), ('2016-01-23', '203', '3', '96'), ('4444rr4r', '204', '9', '96'), ('gdfg', '205', '9', '97'), ('2016-01-07', '206', '3', '97'), ('sdfgsg', '207', '14', '97'), ('2016-01-24', '208', '15', '97'), ('2016-01-24', '209', '3', '98'), ('5454', '210', '9', '98'), ('2016-01-23', '211', '3', '99'), ('454', '212', '9', '99'), ('2016-01-23', '213', '3', '100'), ('hdfgh', '214', '9', '100'), ('2016-01-24', '215', '3', '101'), ('twetw', '216', '9', '101'), ('2016-01-24', '217', '10', '101'), ('2016-01-21', '218', '11', '101'), ('DIP.345766768688', '219', '12', '101'), ('2016-01-24', '220', '3', '102'), ('dadasda', '221', '9', '102'), ('21', '222', '1', '103'), ('22', '223', '2', '103'), ('2016-02-07', '224', '3', '103'), ('2016-02-07', '225', '3', '104'), ('1066/PPK.5/VI/2015', '226', '9', '104'), ('2016-02-07', '227', '3', '105'), ('1067/PPK.6/VI/2015', '228', '9', '105'), ('2016-02-06', '230', '3', '107');
COMMIT;

-- ----------------------------
-- Table structure for tr_detail_surat
-- ----------------------------
DROP TABLE IF EXISTS `tr_detail_surat`;
CREATE TABLE `tr_detail_surat` (
`dsrt_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`dsrt_jenis_surat`  int(11) NOT NULL ,
`dsrt_tgl_cetak`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`dsrt_pencetak`  int(255) NOT NULL ,
`dsrt_idpengadaan`  bigint(255) NOT NULL ,
PRIMARY KEY (`dsrt_id`),
FOREIGN KEY (`dsrt_idpengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`dsrt_jenis_surat`) REFERENCES `t_surat` (`srt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_dsrt_jenis_surat` (`dsrt_jenis_surat`) USING BTREE ,
INDEX `dsrt_idkntsrt` (`dsrt_id`) USING BTREE ,
INDEX `fk_pgd_dsrt` (`dsrt_idpengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=108

;

-- ----------------------------
-- Records of tr_detail_surat
-- ----------------------------
BEGIN;
INSERT INTO `tr_detail_surat` VALUES ('46', '1', '2016-01-05 11:50:16', '1', '15'), ('47', '16', '2016-01-05 11:50:40', '1', '15'), ('48', '17', '2016-01-05 11:50:58', '1', '15'), ('49', '2', '2016-02-06 07:59:33', '1', '15'), ('50', '3', '2016-02-06 08:11:16', '1', '15'), ('51', '5', '2016-01-05 12:54:54', '1', '15'), ('52', '4', '2016-01-05 12:55:01', '1', '15'), ('53', '6', '2016-01-05 13:12:02', '1', '15'), ('54', '7', '2016-01-05 22:48:06', '1', '15'), ('55', '8', '2016-01-05 22:48:54', '1', '15'), ('56', '10', '2016-01-05 23:13:05', '1', '15'), ('57', '9', '2016-01-05 23:13:39', '1', '15'), ('58', '11', '2016-01-05 23:14:14', '1', '15'), ('59', '13', '2016-01-05 23:15:44', '1', '15'), ('60', '14', '2016-01-05 23:17:13', '1', '15'), ('61', '15', '2016-01-05 23:17:31', '1', '15'), ('63', '12', '2016-02-05 18:38:19', '1', '15'), ('65', '19', '2016-01-09 20:55:32', '1', '15'), ('66', '18', '2016-02-06 08:05:26', '1', '15'), ('67', '1', '2016-01-23 20:29:41', '1', '32'), ('68', '16', '2016-01-23 20:43:43', '1', '32'), ('69', '17', '2016-01-23 20:43:56', '1', '32'), ('70', '2', '2016-01-23 20:44:30', '1', '32'), ('71', '1', '2016-01-23 21:53:29', '1', '33'), ('72', '16', '2016-01-23 21:53:41', '1', '33'), ('73', '17', '2016-01-23 21:53:55', '1', '33'), ('74', '2', '2016-01-23 21:54:14', '1', '33'), ('75', '3', '2016-01-23 21:55:29', '1', '33'), ('76', '4', '2016-01-23 21:57:57', '1', '33'), ('77', '6', '2016-01-23 21:58:38', '1', '33'), ('78', '3', '2016-01-23 21:59:27', '1', '32'), ('79', '4', '2016-01-23 21:59:33', '1', '32'), ('80', '6', '2016-01-23 22:00:08', '1', '32'), ('81', '7', '2016-01-23 22:40:21', '1', '32'), ('82', '8', '2016-01-23 22:41:06', '1', '32'), ('83', '10', '2016-01-23 22:41:32', '1', '32'), ('84', '9', '2016-01-23 22:42:55', '1', '32'), ('85', '11', '2016-01-23 22:43:21', '1', '32'), ('86', '7', '2016-01-23 22:46:28', '1', '33'), ('87', '8', '2016-01-23 22:46:48', '1', '33'), ('88', '10', '2016-01-23 22:47:19', '1', '33'), ('89', '9', '2016-01-23 22:47:34', '1', '33'), ('90', '11', '2016-01-23 22:47:49', '1', '33'), ('91', '12', '2016-01-23 23:34:45', '1', '32'), ('92', '13', '2016-01-23 23:36:49', '1', '32'), ('93', '14', '2016-01-23 23:37:17', '1', '32'), ('94', '15', '2016-01-23 23:37:45', '1', '32'), ('95', '18', '2016-01-23 23:40:54', '1', '32'), ('96', '19', '2016-01-23 23:41:32', '1', '32'), ('97', '12', '2016-01-24 00:35:22', '1', '33'), ('98', '13', '2016-01-24 00:35:33', '1', '33'), ('99', '14', '2016-01-24 00:35:42', '1', '33'), ('100', '15', '2016-01-24 00:35:57', '1', '33'), ('101', '18', '2016-01-24 00:38:03', '1', '33'), ('102', '19', '2016-01-24 00:38:11', '1', '33'), ('103', '1', '2016-02-06 07:48:57', '1', '36'), ('104', '16', '2016-02-06 07:49:41', '1', '36'), ('105', '17', '2016-02-06 07:50:00', '1', '36'), ('107', '2', '2016-02-06 07:59:00', '1', '36');
COMMIT;

-- ----------------------------
-- Table structure for tr_pgd_suratizin
-- ----------------------------
DROP TABLE IF EXISTS `tr_pgd_suratizin`;
CREATE TABLE `tr_pgd_suratizin` (
`psr_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`psr_pengadaan`  bigint(25) NOT NULL ,
`psr_surat_izin`  int(25) NOT NULL ,
`psr_status_penawaran`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`psr_id`),
FOREIGN KEY (`psr_surat_izin`) REFERENCES `t_suratizin` (`siz_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
FOREIGN KEY (`psr_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_sip_pengadaan` (`psr_pengadaan`) USING BTREE ,
INDEX `fk_psr_srz` (`psr_surat_izin`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=105

;

-- ----------------------------
-- Records of tr_pgd_suratizin
-- ----------------------------
BEGIN;
INSERT INTO `tr_pgd_suratizin` VALUES ('8', '22', '1', '1'), ('10', '19', '1', '0'), ('11', '20', '1', '1'), ('12', '21', '1', '1'), ('13', '23', '1', '1'), ('14', '24', '1', '1'), ('15', '25', '1', '0'), ('16', '15', '1', '1'), ('18', '26', '1', '1'), ('19', '27', '1', '1'), ('20', '27', '5', '1'), ('21', '27', '4', '1'), ('25', '30', '9', '1'), ('26', '30', '8', '1'), ('27', '30', '1', '1'), ('28', '31', '9', '0'), ('29', '31', '7', '0'), ('33', '32', '1', '1'), ('34', '32', '5', '1'), ('35', '32', '7', '1'), ('39', '33', '9', '1'), ('40', '33', '7', '1'), ('41', '33', '6', '1'), ('42', '34', '9', '0'), ('43', '37', '8', '0'), ('44', '37', '6', '0'), ('83', '42', '9', '0'), ('84', '42', '5', '0'), ('99', '46', '9', '1'), ('100', '46', '6', '1'), ('101', '46', '7', '1'), ('102', '41', '8', '1'), ('103', '41', '9', '1'), ('104', '41', '5', '1');
COMMIT;

-- ----------------------------
-- Procedure structure for sum_total_pengadaan
-- ----------------------------
DROP PROCEDURE IF EXISTS `sum_total_pengadaan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sum_total_pengadaan`(IN v_pgd_id BIGINT, IN v_pajak FLOAT)
BEGIN
	DECLARE v_total_hps DECIMAL;
	DECLARE v_total_pnr DECIMAL;
	DECLARE v_total_fix DECIMAL;
	
	SELECT IFNULL(SUM(dtp_jumlahharga_hps),'0') INTO v_total_hps FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtp_jumlahharga_pnr),'0') INTO v_total_pnr FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtp_jumlahharga_fix),'0') INTO v_total_fix FROM t_detail_pengadaan WHERE dtp_pengadaan = v_pgd_id;
	UPDATE t_pengadaan
	SET pgd_jml_sblm_ppn_hps = v_total_hps,
		pgd_jml_sblm_ppn_pnr = v_total_pnr,
		pgd_jml_sblm_ppn_fix = v_total_fix,
		pgd_jml_ssdh_ppn_hps = (v_total_hps+(v_total_hps*v_pajak)),
		pgd_jml_ssdh_ppn_pnr = (v_total_pnr+(v_total_pnr*v_pajak)),
		pgd_jml_ssdh_ppn_fix = (v_total_fix+(v_total_fix*v_pajak))
	WHERE pgd_id = v_pgd_id;
	SELECT v_pajak FROM DUAL ;
		SELECT v_total_hps FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_pnr FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_fix FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for sum_total_pengadaan_konsultan
-- ----------------------------
DROP PROCEDURE IF EXISTS `sum_total_pengadaan_konsultan`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sum_total_pengadaan_konsultan`(IN v_pgd_id BIGINT, IN v_pajak FLOAT)
BEGIN
	DECLARE v_total_hps DECIMAL;
	DECLARE v_total_pnr DECIMAL;
	DECLARE v_total_fix DECIMAL;
	
	DECLARE v_total_hps1 DECIMAL;
	DECLARE v_total_pnr1 DECIMAL;
	DECLARE v_total_fix1 DECIMAL;
	
	SELECT IFNULL(SUM(dtk_jml_biaya_hps),0) INTO v_total_hps FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	SELECT IFNULL(SUM(dtk_jml_biaya_pnr),0) INTO v_total_pnr FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	SELECT IFNULL(SUM(dtk_jml_biaya_fix),0) INTO v_total_fix FROM t_detail_konsultan1 WHERE dtk_pgd = v_pgd_id ;
	
	SELECT IFNULL(SUM(dtk2_jumlahharga_hps),0) INTO v_total_hps1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtk2_jumlahharga_pnr),0) INTO v_total_pnr1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	SELECT IFNULL(SUM(dtk2_jumlahharga_fix),0) INTO v_total_fix1 FROM t_detail_konsultan2 WHERE dtk2_pengadaan = v_pgd_id;
	
	UPDATE t_pengadaan
	SET pgd_jml_sblm_ppn_hps = (v_total_hps+v_total_hps1),
		pgd_jml_sblm_ppn_pnr = (v_total_pnr+v_total_pnr1),
		pgd_jml_sblm_ppn_fix = (v_total_fix+v_total_fix1),
		pgd_jml_ssdh_ppn_hps = ((v_total_hps+v_total_hps1)+((v_total_hps+v_total_hps1)*v_pajak)),
		pgd_jml_ssdh_ppn_pnr = ((v_total_pnr+v_total_pnr1)+((v_total_pnr+v_total_pnr1)*v_pajak)),
		pgd_jml_ssdh_ppn_fix = ((v_total_fix+v_total_fix1)+((v_total_fix+v_total_fix1)*v_pajak))
	WHERE pgd_id = v_pgd_id;
	SELECT v_pajak FROM DUAL ;
		SELECT v_total_hps FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_pnr FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
		SELECT v_total_fix FROM DUAL ;
		SELECT v_total_hps*v_pajak FROM DUAL ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for sum_unsur_penilaian_by_pengalaman_personal
-- ----------------------------
DROP PROCEDURE IF EXISTS `sum_unsur_penilaian_by_pengalaman_personal`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sum_unsur_penilaian_by_pengalaman_personal`(IN v_pnk_psi FLOAT)
BEGIN
	DECLARE v_total_perhitungan_bln_kerja DECIMAL(65,2);
	DECLARE v_pengalaman_nilai DECIMAL(65,2);
	DECLARE v_pengalaman_nilai_jumlah DECIMAL(65,2);
	
	SELECT IFNULL((SUM(pnk_perhitungan_bln_kerja)/12),0) INTO v_total_perhitungan_bln_kerja FROM t_pengalaman_kerja WHERE pnk_psi = v_pnk_psi ;
	IF v_total_perhitungan_bln_kerja >= 4 THEN 
		SET v_pengalaman_nilai = 100;
    ELSE 
		SET v_pengalaman_nilai = 50;
    END IF;
	
	
	SET v_pengalaman_nilai_jumlah = v_pengalaman_nilai*0.4;
	UPDATE t_personal_inti
	SET psi_masa_kerja = v_total_perhitungan_bln_kerja,
	psi_nilai_kerja = v_pengalaman_nilai,
	psi_jml_nilai_kerja = v_pengalaman_nilai_jumlah,
	psi_nilai = psi_jml_nilai_ks_ijasah+v_pengalaman_nilai_jumlah+psi_jml_nilai_sertifikat,
	psi_jumlah = (psi_jml_nilai_ks_ijasah+v_pengalaman_nilai_jumlah+psi_jml_nilai_sertifikat)*psi_bobot
	WHERE psi_id = v_pnk_psi;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for sum_unsur_penilaian_by_personal_inti
-- ----------------------------
DROP PROCEDURE IF EXISTS `sum_unsur_penilaian_by_personal_inti`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sum_unsur_penilaian_by_personal_inti`(IN v_psi_uns FLOAT)
BEGIN
	DECLARE v_total_all DECIMAL(65,2);
	DECLARE v_total_uns DECIMAL(65,2);
	DECLARE v_total DECIMAL(65,2);
	SELECT IFNULL(unp_bobot_kua_tna,0) INTO v_total_uns FROM t_unsur_penilaian WHERE unp_id = v_psi_uns ;
	SELECT IFNULL(SUM(psi_jumlah),0) INTO v_total_all FROM t_personal_inti WHERE psi_uns = v_psi_uns ;
	SET v_total = (v_total_uns)*(v_total_all);
	UPDATE t_unsur_penilaian
	SET unp_nilai_kua_tna = v_total_all,
	unp_jml_kua_tna = v_total
	WHERE unp_id = v_psi_uns;
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_departemen
-- ----------------------------
ALTER TABLE `t_departemen` AUTO_INCREMENT=18;
DROP TRIGGER IF EXISTS `insert_detail_konsultan1`;
DELIMITER ;;
CREATE TRIGGER `insert_detail_konsultan1` BEFORE INSERT ON `t_detail_konsultan1` FOR EACH ROW BEGIN
	SET NEW.dtk_jml_biaya_hps = NEW.dtk_biaya_personil_hps*NEW.dtk_kuantitas;
	SET NEW.dtk_jml_biaya_pnr = NEW.dtk_biaya_personil_pnr*NEW.dtk_kuantitas;
	SET NEW.dtk_jml_biaya_fix = NEW.dtk_biaya_personil_fix*NEW.dtk_kuantitas;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_detail_konsultan1`;
DELIMITER ;;
CREATE TRIGGER `update_detail_konsultan1` BEFORE UPDATE ON `t_detail_konsultan1` FOR EACH ROW BEGIN		
	IF (NEW.dtk_biaya_personil_hps <> OLD.dtk_biaya_personil_hps) THEN
		SET NEW.dtk_jml_biaya_hps = NEW.dtk_biaya_personil_hps*NEW.dtk_kuantitas;
	END IF;
	IF (NEW.dtk_biaya_personil_pnr <> OLD.dtk_biaya_personil_pnr) THEN
		SET NEW.dtk_jml_biaya_pnr = NEW.dtk_biaya_personil_pnr*NEW.dtk_kuantitas;
	END IF;
	IF (NEW.dtk_biaya_personil_fix <> OLD.dtk_biaya_personil_fix) THEN
		SET NEW.dtk_jml_biaya_fix = NEW.dtk_biaya_personil_fix*NEW.dtk_kuantitas;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_detail_konsultan1
-- ----------------------------
ALTER TABLE `t_detail_konsultan1` AUTO_INCREMENT=17;
DROP TRIGGER IF EXISTS `insert_detail_konsultan2`;
DELIMITER ;;
CREATE TRIGGER `insert_detail_konsultan2` BEFORE INSERT ON `t_detail_konsultan2` FOR EACH ROW BEGIN
	SET NEW.dtk2_jumlahharga_hps = NEW.dtk2_hargasatuan_hps*NEW.dtk2_volume;
	SET NEW.dtk2_jumlahharga_pnr = NEW.dtk2_hargasatuan_pnr*NEW.dtk2_volume;
	SET NEW.dtk2_jumlahharga_fix = NEW.dtk2_hargasatuan_fix*NEW.dtk2_volume;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_detail_konsultan2`;
DELIMITER ;;
CREATE TRIGGER `update_detail_konsultan2` BEFORE UPDATE ON `t_detail_konsultan2` FOR EACH ROW BEGIN		
	IF (NEW.dtk2_hargasatuan_hps <> OLD.dtk2_hargasatuan_hps) THEN
		SET NEW.dtk2_jumlahharga_hps = NEW.dtk2_hargasatuan_hps*NEW.dtk2_volume;
	END IF;
	IF (NEW.dtk2_hargasatuan_pnr <> OLD.dtk2_hargasatuan_pnr) THEN
		SET NEW.dtk2_jumlahharga_pnr = NEW.dtk2_hargasatuan_pnr*NEW.dtk2_volume;
	END IF;
	IF (NEW.dtk2_hargasatuan_fix <> OLD.dtk2_hargasatuan_fix) THEN
		SET NEW.dtk2_jumlahharga_fix = NEW.dtk2_hargasatuan_fix*NEW.dtk2_volume;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_detail_konsultan2
-- ----------------------------
ALTER TABLE `t_detail_konsultan2` AUTO_INCREMENT=21;
DROP TRIGGER IF EXISTS `insert_detail_pengadaan`;
DELIMITER ;;
CREATE TRIGGER `insert_detail_pengadaan` BEFORE INSERT ON `t_detail_pengadaan` FOR EACH ROW BEGIN
	SET NEW.dtp_jumlahharga_hps = NEW.dtp_hargasatuan_hps*NEW.dtp_volume;
	SET NEW.dtp_jumlahharga_pnr = NEW.dtp_hargasatuan_pnr*NEW.dtp_volume;
	SET NEW.dtp_jumlahharga_fix = NEW.dtp_hargasatuan_fix*NEW.dtp_volume;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_detail_pengadaan`;
DELIMITER ;;
CREATE TRIGGER `update_detail_pengadaan` BEFORE UPDATE ON `t_detail_pengadaan` FOR EACH ROW BEGIN		
	IF (NEW.dtp_hargasatuan_hps <> OLD.dtp_hargasatuan_hps) THEN
		SET NEW.dtp_jumlahharga_hps = NEW.dtp_hargasatuan_hps*NEW.dtp_volume;
	END IF;
	IF (NEW.dtp_hargasatuan_pnr <> OLD.dtp_hargasatuan_pnr) THEN
		SET NEW.dtp_jumlahharga_pnr = NEW.dtp_hargasatuan_pnr*NEW.dtp_volume;
	END IF;
	IF (NEW.dtp_hargasatuan_fix <> OLD.dtp_hargasatuan_fix) THEN
		SET NEW.dtp_jumlahharga_fix = NEW.dtp_hargasatuan_fix*NEW.dtp_volume;
	END IF;

END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_detail_pengadaan
-- ----------------------------
ALTER TABLE `t_detail_pengadaan` AUTO_INCREMENT=161;

-- ----------------------------
-- Auto increment value for t_dipa
-- ----------------------------
ALTER TABLE `t_dipa` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for t_jabatan
-- ----------------------------
ALTER TABLE `t_jabatan` AUTO_INCREMENT=34;

-- ----------------------------
-- Auto increment value for t_master_penyusun
-- ----------------------------
ALTER TABLE `t_master_penyusun` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for t_metode
-- ----------------------------
ALTER TABLE `t_metode` AUTO_INCREMENT=57;

-- ----------------------------
-- Auto increment value for t_pegawai
-- ----------------------------
ALTER TABLE `t_pegawai` AUTO_INCREMENT=25;

-- ----------------------------
-- Auto increment value for t_pengadaan
-- ----------------------------
ALTER TABLE `t_pengadaan` AUTO_INCREMENT=47;
DROP TRIGGER IF EXISTS `insert_ApengalamanPersonal`;
DELIMITER ;;
CREATE TRIGGER `insert_ApengalamanPersonal` AFTER INSERT ON `t_pengalaman_kerja` FOR EACH ROW BEGIN
	CALL sum_unsur_penilaian_by_pengalaman_personal(NEW.pnk_psi);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_pengalamanPersonal`;
DELIMITER ;;
CREATE TRIGGER `delete_pengalamanPersonal` AFTER DELETE ON `t_pengalaman_kerja` FOR EACH ROW BEGIN
	CALL sum_unsur_penilaian_by_pengalaman_personal(OLD.pnk_psi);
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_pengalaman_kerja
-- ----------------------------
ALTER TABLE `t_pengalaman_kerja` AUTO_INCREMENT=21;

-- ----------------------------
-- Auto increment value for t_pengalaman_prs
-- ----------------------------
ALTER TABLE `t_pengalaman_prs` AUTO_INCREMENT=37;
DROP TRIGGER IF EXISTS `insert_BkualifikasiPersonal`;
DELIMITER ;;
CREATE TRIGGER `insert_BkualifikasiPersonal` BEFORE INSERT ON `t_personal_inti` FOR EACH ROW BEGIN
	DECLARE v_total_nilai DECIMAL;
	DECLARE v_total_jumlah DECIMAL;
	DECLARE v_total_all DECIMAL;
	SET v_total_nilai = NEW.psi_jml_nilai_ks_ijasah+NEW.psi_jml_nilai_kerja+NEW.psi_jml_nilai_sertifikat;
	SET NEW.psi_nilai = v_total_nilai;
	SET v_total_jumlah = v_total_nilai*NEW.psi_bobot;
	SET NEW.psi_jumlah = v_total_jumlah;

END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_AkualifikasiPersonal`;
DELIMITER ;;
CREATE TRIGGER `insert_AkualifikasiPersonal` AFTER INSERT ON `t_personal_inti` FOR EACH ROW BEGIN
	CALL sum_unsur_penilaian_by_personal_inti(NEW.psi_uns);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `update_kualifikasiPersonal`;
DELIMITER ;;
CREATE TRIGGER `update_kualifikasiPersonal` AFTER UPDATE ON `t_personal_inti` FOR EACH ROW BEGIN
	CALL sum_unsur_penilaian_by_personal_inti(NEW.psi_uns);
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `delete_kualifikasiPersonal`;
DELIMITER ;;
CREATE TRIGGER `delete_kualifikasiPersonal` AFTER DELETE ON `t_personal_inti` FOR EACH ROW BEGIN
	CALL sum_unsur_penilaian_by_personal_inti(OLD.psi_uns);
END
;;
DELIMITER ;

-- ----------------------------
-- Auto increment value for t_personal_inti
-- ----------------------------
ALTER TABLE `t_personal_inti` AUTO_INCREMENT=24;

-- ----------------------------
-- Auto increment value for t_sub_judul
-- ----------------------------
ALTER TABLE `t_sub_judul` AUTO_INCREMENT=8;

-- ----------------------------
-- Auto increment value for t_supplier
-- ----------------------------
ALTER TABLE `t_supplier` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for t_suratizin
-- ----------------------------
ALTER TABLE `t_suratizin` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for t_unsur_penilaian
-- ----------------------------
ALTER TABLE `t_unsur_penilaian` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for t_user
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for tr_detail_konten
-- ----------------------------
ALTER TABLE `tr_detail_konten` AUTO_INCREMENT=231;

-- ----------------------------
-- Auto increment value for tr_detail_surat
-- ----------------------------
ALTER TABLE `tr_detail_surat` AUTO_INCREMENT=108;

-- ----------------------------
-- Auto increment value for tr_pgd_suratizin
-- ----------------------------
ALTER TABLE `tr_pgd_suratizin` AUTO_INCREMENT=105;
