/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-01-24 09:17:33
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
`dtp_id_sjd`  bigint(255) NULL DEFAULT '-99' COMMENT 'kalau -99 berarti tidak pake sub judul' ,
`dtp_file`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'url lokasi file gambar' ,
PRIMARY KEY (`dtp_id`),
FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_dtp_pengadaan` (`dtp_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=142

;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------
BEGIN;
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
`pgd_pembukaan_dok_pnr`  timestamp NULL DEFAULT NULL COMMENT 'pembukaan dokumen penawaran' ,
`pgd_klr_teknis_nego_hrg`  timestamp NULL DEFAULT NULL COMMENT 'Klarifikasi Teknis dan Negoisasi Harga' ,
`pgd_penandatangan_spk`  date NULL DEFAULT NULL ,
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
AUTO_INCREMENT=36

;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for t_sub_judul_dtp
-- ----------------------------
DROP TABLE IF EXISTS `t_sub_judul_dtp`;
CREATE TABLE `t_sub_judul_dtp` (
`sjd_id`  bigint(20) NOT NULL ,
`sjd_sub_judul`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`sjd_parent`  bigint(255) NULL DEFAULT '-99' COMMENT '-99 artinya dia parent' ,
PRIMARY KEY (`sjd_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_sub_judul_dtp
-- ----------------------------
BEGIN;
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
FOREIGN KEY (`dknt_detailsurat`) REFERENCES `tr_detail_surat` (`dsrt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_dknten_idkonten` (`dknt_idkonten`) USING BTREE ,
INDEX `tr_detailsurat` (`dknt_detailsurat`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=222

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
FOREIGN KEY (`dsrt_idpengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`dsrt_jenis_surat`) REFERENCES `t_surat` (`srt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
INDEX `fk_dsrt_jenis_surat` (`dsrt_jenis_surat`) USING BTREE ,
INDEX `dsrt_idkntsrt` (`dsrt_id`) USING BTREE ,
INDEX `fk_pgd_dsrt` (`dsrt_idpengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=103

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
FOREIGN KEY (`psr_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
INDEX `fk_sip_pengadaan` (`psr_pengadaan`) USING BTREE ,
INDEX `fk_psr_srz` (`psr_surat_izin`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=43

;

-- ----------------------------
-- Records of tr_pgd_suratizin
-- ----------------------------
BEGIN;
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
ALTER TABLE `t_detail_pengadaan` AUTO_INCREMENT=142;

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
-- Auto increment value for t_pegawai
-- ----------------------------
ALTER TABLE `t_pegawai` AUTO_INCREMENT=25;

-- ----------------------------
-- Auto increment value for t_pengadaan
-- ----------------------------
ALTER TABLE `t_pengadaan` AUTO_INCREMENT=36;

-- ----------------------------
-- Auto increment value for t_supplier
-- ----------------------------
ALTER TABLE `t_supplier` AUTO_INCREMENT=4;

-- ----------------------------
-- Auto increment value for t_suratizin
-- ----------------------------
ALTER TABLE `t_suratizin` AUTO_INCREMENT=10;

-- ----------------------------
-- Auto increment value for t_user
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for tr_detail_konten
-- ----------------------------
ALTER TABLE `tr_detail_konten` AUTO_INCREMENT=222;

-- ----------------------------
-- Auto increment value for tr_detail_surat
-- ----------------------------
ALTER TABLE `tr_detail_surat` AUTO_INCREMENT=103;

-- ----------------------------
-- Auto increment value for tr_pgd_suratizin
-- ----------------------------
ALTER TABLE `tr_pgd_suratizin` AUTO_INCREMENT=43;
