/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-12-02 07:27:05
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
INSERT INTO `t_anggaran` VALUES ('12345', 'Anggaran pendapatan negara', '0', '2015-11-18 22:30:57'), ('12345s', 'jlj', '0', '2015-11-18 23:18:41'), ('54321', 'Anggaran baru', '0', '2015-11-18 23:11:09'), ('esa', 'esa', '0', '2015-11-18 22:30:57'), ('esas', 'esa', '0', '2015-11-18 22:30:57'), ('haha', 'esa', '0', '2015-11-18 22:30:57');
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
PRIMARY KEY (`dtp_id`),
FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_dtp_pengadaan` (`dtp_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=52

;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_detail_pengadaan` VALUES ('18', '15', 'Pembersihan Kaca luar gedung', 'gondola safety equipment sabun dan bahan kimia pembersih lap dan peralatan pembersih', '6843.00', 'm2', '2000.00', '13686000.00', null, null, null, null), ('19', '15', 'plate sitting dan angkur ( pasang baru di top roof)', null, '3.00', 'unit', '2500.00', '7500.00', null, null, null, null), ('20', '15', 'Silent kaca yang bocor', null, '79.00', 'm\'', '1500.00', '118500.00', null, null, null, null), ('38', '22', 'Kayu', 'Panjang\nJati', '4.00', 'unit', '4000.00', '16000.00', '0.00', '0.00', '0.00', '0.00'), ('39', '22', 'Besi', 'pendek\nkuat', '3.00', 'unit', '1000.00', '3000.00', '0.00', '0.00', '0.00', '0.00'), ('42', '19', 'permen', '-manis\n-asam', '3.00', 'unit', '400.00', '1200.00', '0.00', '0.00', '0.00', '0.00'), ('43', '20', 'xx', 'ete', '3.00', 'xx', '100.00', '300.00', '50.00', '150.00', '50.00', '150.00'), ('44', '20', 'yy', 'tyt', '6.00', 'yt', '6000.00', '36000.00', '1000.00', '6000.00', '500.00', '3000.00'), ('45', '21', 'Baju', '- wol\n- Katun', '4.00', 'unit', '5000.00', '20000.00', '6000.00', '24000.00', '0.00', '0.00'), ('46', '21', 'Celana', '- jeans\n- panjang', '1.00', 'unit', '4000.00', '4000.00', '100.00', '100.00', '0.00', '0.00'), ('47', '21', 'Kemeja', 'hahaha', '2.00', 'm3', '2000.00', '4000.00', '100.00', '200.00', '0.00', '0.00'), ('48', '21', 'haha', 'ytty', '1.50', 'mh', '3000.00', '4500.00', '200.00', '300.00', '0.00', '0.00'), ('49', '23', 'Membersihkan Lantai 1', '- Pake Lap\n- Pake shampoo', '100.00', 'm2', '500.00', '50000.00', '450.00', '45000.00', '450.00', '45000.00'), ('50', '23', 'Membersihkan lantai 2', '- Lantai pavin block\n- disedot', '150.00', 'm2', '800.00', '120000.00', '750.00', '112500.00', '700.00', '105000.00'), ('51', '24', 'Membersihkan taman depan', '- Disemprot\n- Dipotong', '500.00', 'm2', '500.00', '250000.00', '500.00', '250000.00', '0.00', '0.00');
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
AUTO_INCREMENT=33

;

-- ----------------------------
-- Records of t_jabatan
-- ----------------------------
BEGIN;
INSERT INTO `t_jabatan` VALUES ('1', 'Kabag TU Pimpinan', '1', null), ('2', 'Kabag Rumah Tangga', '2', null), ('3', 'Kabag Perlengkapan', '3', null), ('4', 'Kabag Tata Usaha dan Persuratan', '4', null), ('5', 'Kasubbag Protokol', '5', null), ('6', 'Kasubbag TU Menteri', '6', null), ('7', 'Kasubbag TU Sekretariat Jenderal', '7', null), ('8', 'Kasubbag Urusan Dalam', '8', null), ('9', 'Kasubbag ANGKAMDAL', '9', null), ('10', 'Kasubbag Kesejahteraan', '10', null), ('11', 'Kasubbag Perencanaan dan Pemanfaatan', '11', null), ('12', 'Kasubbag Inventarisasi dan Penghapusan', '12', null), ('13', 'Kasubbag Pengadaan dan Penyaluran', '13', null), ('14', 'Kasubbag Persuratan', '14', null), ('15', 'Kasubbag Arsip', '15', null), ('16', 'Kasubbag Tata Usaha Biro', '16', null), ('17', 'Staff Pelaksana Protokol', '5', null), ('18', 'Staff Pelaksana TU Menteri', '6', null), ('19', 'Staff Pelaksana TU Sekretariat Jenderal', '7', null), ('20', 'Staff Pelaksana Urusan Dalam', '8', null), ('21', 'Staff Pelaksana ANGKAMDAL', '9', null), ('22', 'Staff Pelaksana Kesejahteraan', '10', null), ('23', 'Staff Perencanaan dan Pemanfaatan', '11', null), ('24', 'Staff Pelaksana Inventarisasi dan Penghapusan', '12', null), ('25', 'Staff Pelaksana Pengadaan dan Penyaluran', '13', null), ('26', 'Staff Pelaksana Persuratan', '14', null), ('27', 'Staff Pelaksana Arsip', '15', null), ('28', 'Staff Pelaksana Tata Usaha Biro', '16', null), ('29', 'Bendahara  Pengeluaran', '0', null), ('30', 'Pejabat Pengadaan Barang Jasa', '0', null), ('31', 'Pejabat Penandatangan SPM', '0', null), ('32', 'Kepala Biro Umum', '0', null);
COMMIT;

-- ----------------------------
-- Table structure for t_kelompok_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `t_kelompok_penyusun`;
CREATE TABLE `t_kelompok_penyusun` (
`klp_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`klp_pengadaan`  bigint(255) NULL DEFAULT NULL ,
`klp_terpilih`  int(255) NULL DEFAULT NULL ,
`klp_tanggal_input`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
PRIMARY KEY (`klp_id`),
FOREIGN KEY (`klp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_drp_pgd` (`klp_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=18

;

-- ----------------------------
-- Records of t_kelompok_penyusun
-- ----------------------------
BEGIN;
INSERT INTO `t_kelompok_penyusun` VALUES ('1', '15', '1', '2015-11-21 23:12:09'), ('10', '22', '1', '2015-12-02 04:19:34'), ('13', '19', '1', '2015-12-02 04:58:34'), ('14', '20', '1', '2015-12-02 05:36:50'), ('15', '21', '1', '2015-12-02 05:52:58'), ('16', '23', '1', '2015-12-02 07:08:19'), ('17', '24', '1', '2015-12-02 07:13:51');
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
INSERT INTO `t_konten` VALUES ('Dari', '1'), ('Kepada', '2'), ('Tanggal', '3'), ('ttdmemo1', '4'), ('nomormemo2', '5'), ('ttdmemo2', '6'), ('nomormemo3', '7'), ('ttdmemo3', '8');
COMMIT;

-- ----------------------------
-- Table structure for t_list_penyusun
-- ----------------------------
DROP TABLE IF EXISTS `t_list_penyusun`;
CREATE TABLE `t_list_penyusun` (
`lsp_id`  bigint(255) NOT NULL AUTO_INCREMENT ,
`lsp_pegawai`  bigint(25) NOT NULL ,
`lsp_kelompok`  bigint(25) NOT NULL ,
`lsp_jabatan`  int(20) NOT NULL ,
PRIMARY KEY (`lsp_id`),
FOREIGN KEY (`lsp_kelompok`) REFERENCES `t_kelompok_penyusun` (`klp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`lsp_pegawai`) REFERENCES `t_pegawai` (`pgw_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_penyusun_draft` (`lsp_kelompok`) USING BTREE ,
INDEX `fk_pys_pgw` (`lsp_pegawai`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=32

;

-- ----------------------------
-- Records of t_list_penyusun
-- ----------------------------
BEGIN;
INSERT INTO `t_list_penyusun` VALUES ('1', '4', '1', '0'), ('2', '6', '1', '1'), ('4', '5', '1', '1'), ('19', '4', '10', '0'), ('20', '5', '10', '1'), ('23', '4', '13', '0'), ('24', '5', '13', '1'), ('25', '6', '13', '1'), ('26', '4', '14', '0'), ('27', '4', '15', '0'), ('28', '6', '15', '1'), ('29', '4', '16', '0'), ('30', '6', '16', '1'), ('31', '4', '17', '0');
COMMIT;

-- ----------------------------
-- Table structure for t_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
`pgw_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgw_jabatan`  int(20) NULL DEFAULT NULL ,
`pgw_nip`  varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL ,
`pgw_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgw_id`  bigint(20) NOT NULL AUTO_INCREMENT ,
`pgw_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`pgw_id`),
FOREIGN KEY (`pgw_jabatan`) REFERENCES `t_jabatan` (`jbt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `pgw_id` (`pgw_id`) USING BTREE ,
INDEX `fk_pegawai_jabatan` (`pgw_jabatan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of t_pegawai
-- ----------------------------
BEGIN;
INSERT INTO `t_pegawai` VALUES ('Mas Nopa', '1', '212121212121', '12121111111111111111', '4', '0'), ('Masnopa ika', '3', '33333333333333333', '111111111111111111', '5', '0'), ('Sukijan', '3', '1212121212', '111111111122222', '6', '0');
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
`pgd_tanggal_input`  timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`pgd_anggaran`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pgd_user_update`  bigint(20) NULL DEFAULT NULL ,
`pgd_lama_pekerjaan`  int(255) NULL DEFAULT NULL ,
`pgd_lama_penawaran`  int(255) NULL DEFAULT NULL ,
`pgd_tgl_mulai_pengadaan`  date NULL DEFAULT NULL ,
`pgd_supplier`  int(255) NULL DEFAULT NULL ,
`pgd_jml_sblm_ppn_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_hps`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_sblm_ppn_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_pnr`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_sblm_ppn_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_jml_ssdh_ppn_fix`  decimal(65,2) NULL DEFAULT 0.00 ,
`pgd_wkt_awal_penawaran`  date NULL DEFAULT NULL ,
`pgd_wkt_akhir_penawaran`  date NULL DEFAULT NULL ,
`pgd_tipe_pengadaan`  int(255) NULL DEFAULT NULL COMMENT '0 : Barang 1:Jasa 2:Konsultan' ,
`pgd_status_pengadaan`  int(255) NULL DEFAULT 0 COMMENT '0:HPS 1:penawaran 2:fix 3:selesai' ,
PRIMARY KEY (`pgd_id`),
FOREIGN KEY (`pgd_anggaran`) REFERENCES `t_anggaran` (`ang_kode`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`pgd_supplier`) REFERENCES `t_supplier` (`spl_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`pgd_user_update`) REFERENCES `t_user` (`usr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_pgd_ang` (`pgd_anggaran`) USING BTREE ,
INDEX `fk_pgd_usr` (`pgd_user_update`) USING BTREE ,
INDEX `fk_pgd_spl` (`pgd_supplier`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=25

;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_pengadaan` VALUES ('15', 'Pekerjaan Pembersihan dan Silent Kaca Luar Gedung GMB III', '0', 'Melakukan pemeliharaan gedung dengan melakukan pembersihan kaca luar gedung yang sudah kotor dan melakukan silent kaca yang telah bocor', '2015-12-02 02:39:51', '12345', '1', '45', '30', '2015-11-21', '0', '13812000.00', '15193200.02', '0.00', '0.00', '0.00', '0.00', null, null, '1', '0'), ('19', 'Pengadaan barang yyy', '1', 'PEngadaan barang bagus yyy', '2015-12-02 07:26:15', '12345', '1', '30', '4', '2015-11-25', '0', '1200.00', '1320.00', '0.00', '0.00', '0.00', '0.00', '2015-11-24', '2015-11-27', '0', '0'), ('20', 'dfshaasdasdas', '0', 're', '2015-12-02 06:48:18', '12345', '1', '3', '5', '2015-11-25', '0', '36300.00', '39930.00', '6150.00', '6765.00', '3150.00', '3465.00', '2015-11-26', '2015-11-27', '0', '2'), ('21', 'Pengadaan keempat dsd', '0', 'asdff xxx', '2015-12-02 05:57:36', '54321', '1', '3', '45', '2015-12-02', '0', '32500.00', '35750.00', '24600.00', '27060.00', '0.00', '0.00', '2015-12-02', '2015-12-25', '0', '1'), ('22', 'Pengadaan kelima', '0', '444', '2015-12-02 04:19:33', '54321', '1', '5', '5', '2015-12-02', '0', '19000.00', '20900.00', '0.00', '0.00', '0.00', '0.00', '2015-12-02', '2015-12-02', '0', '0'), ('23', 'Pekerjaan pembersihan lantai xxx', '0', 'Membersihkan lantai semuanya', '2015-12-02 07:19:48', '54321', '1', '6', '6', '2015-12-02', '0', '170000.00', '187000.00', '157500.00', '173250.00', '150000.00', '165000.00', '2015-12-02', '2015-12-04', '1', '2'), ('24', 'Pekerjaan pembersihan taman ccc', '0', 'Membersihkan taman depan gedung', '2015-12-02 07:21:41', '12345', '1', '4', '4', '2015-12-02', '0', '250000.00', '275000.00', '250000.00', '275000.00', '0.00', '0.00', '2015-12-02', '2015-12-04', '1', '1');
COMMIT;

-- ----------------------------
-- Table structure for t_perwakilan_supplier
-- ----------------------------
DROP TABLE IF EXISTS `t_perwakilan_supplier`;
CREATE TABLE `t_perwakilan_supplier` (
`pws_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pws_idsup`  int(25) NULL DEFAULT NULL ,
`pws_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`pws_id`  int(25) NOT NULL ,
`pws_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`pws_id`),
FOREIGN KEY (`pws_idsup`) REFERENCES `t_supplier` (`spl_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
INDEX `idsupfk` (`pws_idsup`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_perwakilan_supplier
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_supplier
-- ----------------------------
DROP TABLE IF EXISTS `t_supplier`;
CREATE TABLE `t_supplier` (
`spl_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_alamat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_id`  int(25) NOT NULL ,
`spl_deleted`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`spl_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_supplier
-- ----------------------------
BEGIN;
INSERT INTO `t_supplier` VALUES ('11111', 'Jalan Parahyangan', 'PT. Merdeka', '0', '0');
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
INSERT INTO `t_surat` VALUES ('1', 'Memorandum'), ('2', 'HPS');
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
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of t_suratizin
-- ----------------------------
BEGIN;
INSERT INTO `t_suratizin` VALUES ('1', 'Surat Izin Usaha Perdangangan (SIUP) Kecil', '0');
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
AUTO_INCREMENT=5

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES (null, null, '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '0'), ('1', '4', '3', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0'), ('1', '5', '4', 'Susis', 'e807f1fcf82d132f9bb018ca6738a19f', 'falih32@gmail.com', '1');
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
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tr_detail_konten
-- ----------------------------
BEGIN;
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
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tr_detail_surat
-- ----------------------------
BEGIN;
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
FOREIGN KEY (`psr_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_sip_pengadaan` (`psr_pengadaan`) USING BTREE ,
INDEX `fk_psr_srz` (`psr_surat_izin`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=15

;

-- ----------------------------
-- Records of tr_pgd_suratizin
-- ----------------------------
BEGIN;
INSERT INTO `tr_pgd_suratizin` VALUES ('8', '22', '1', '0'), ('10', '19', '1', '0'), ('11', '20', '1', '1'), ('12', '21', '1', '1'), ('13', '23', '1', '1'), ('14', '24', '1', '1');
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
-- Auto increment value for t_departemen
-- ----------------------------
ALTER TABLE `t_departemen` AUTO_INCREMENT=18;
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
ALTER TABLE `t_detail_pengadaan` AUTO_INCREMENT=52;

-- ----------------------------
-- Auto increment value for t_jabatan
-- ----------------------------
ALTER TABLE `t_jabatan` AUTO_INCREMENT=33;

-- ----------------------------
-- Auto increment value for t_kelompok_penyusun
-- ----------------------------
ALTER TABLE `t_kelompok_penyusun` AUTO_INCREMENT=18;

-- ----------------------------
-- Auto increment value for t_list_penyusun
-- ----------------------------
ALTER TABLE `t_list_penyusun` AUTO_INCREMENT=32;

-- ----------------------------
-- Auto increment value for t_pegawai
-- ----------------------------
ALTER TABLE `t_pegawai` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for t_pengadaan
-- ----------------------------
ALTER TABLE `t_pengadaan` AUTO_INCREMENT=25;

-- ----------------------------
-- Auto increment value for t_suratizin
-- ----------------------------
ALTER TABLE `t_suratizin` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for t_user
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=5;

-- ----------------------------
-- Auto increment value for tr_detail_konten
-- ----------------------------
ALTER TABLE `tr_detail_konten` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tr_detail_surat
-- ----------------------------
ALTER TABLE `tr_detail_surat` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tr_pgd_suratizin
-- ----------------------------
ALTER TABLE `tr_pgd_suratizin` AUTO_INCREMENT=15;
