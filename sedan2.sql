/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-01-03 11:06:23
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
FOREIGN KEY (`dtp_pengadaan`) REFERENCES `t_pengadaan` (`pgd_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `fk_dtp_pengadaan` (`dtp_pengadaan`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=56

;

-- ----------------------------
-- Records of t_detail_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_detail_pengadaan` VALUES ('38', '22', 'Kayu', 'Panjang\nJati', '4.00', 'unit', '4000.00', '16000.00', '3000.00', '12000.00', '3000.00', '12000.00', null, null), ('39', '22', 'Besi', 'pendek\nkuat', '3.00', 'unit', '1000.00', '3000.00', '909.00', '2727.00', '300.00', '900.00', null, null), ('42', '19', 'permen', '-manis\n-asam', '3.00', 'unit', '400.00', '1200.00', '0.00', '0.00', '0.00', '0.00', null, null), ('43', '20', 'xx', 'ete', '3.00', 'xx', '100.00', '300.00', '50.00', '150.00', '50.00', '150.00', null, null), ('44', '20', 'yy', 'tyt', '6.00', 'yt', '6000.00', '36000.00', '1000.00', '6000.00', '500.00', '3000.00', null, null), ('45', '21', 'Baju', '- wol\n- Katun', '4.00', 'unit', '5000.00', '20000.00', '6000.00', '24000.00', '0.00', '0.00', null, null), ('46', '21', 'Celana', '- jeans\n- panjang', '1.00', 'unit', '4000.00', '4000.00', '100.00', '100.00', '0.00', '0.00', null, null), ('47', '21', 'Kemeja', 'hahaha', '2.00', 'm3', '2000.00', '4000.00', '100.00', '200.00', '0.00', '0.00', null, null), ('48', '21', 'haha', 'ytty', '1.50', 'mh', '3000.00', '4500.00', '200.00', '300.00', '0.00', '0.00', null, null), ('49', '23', 'Membersihkan Lantai 1', '- Pake Lap\n- Pake shampoo', '100.00', 'm2', '500.00', '50000.00', '450.00', '45000.00', '450.00', '45000.00', null, null), ('50', '23', 'Membersihkan lantai 2', '- Lantai pavin block\n- disedot', '150.00', 'm2', '800.00', '120000.00', '750.00', '112500.00', '700.00', '105000.00', null, null), ('51', '24', 'Membersihkan taman depan', '- Disemprot\n- Dipotong', '500.00', 'm2', '500.00', '250000.00', '500.00', '250000.00', '0.00', '0.00', null, null), ('52', '25', 'susu', 'susu enak', '10.00', 'liter', '150000.00', '1500000.00', '0.00', '0.00', '0.00', '0.00', null, null), ('53', '15', 'Pembersihan Kaca luar gedung', 'gondola safety equipment sabun dan bahan kimia pembersih lap dan peralatan pembersih', '6843.00', 'm2', '2000.00', '13686000.00', '0.00', '0.00', '0.00', '0.00', null, null), ('54', '15', 'plate sitting dan angkur ( pasang baru di top roof)', '', '3.00', 'unit', '2500.00', '7500.00', '0.00', '0.00', '0.00', '0.00', null, null), ('55', '15', 'Silent kaca yang bocor', '', '79.00', 'm\'', '1500.00', '118500.00', '0.00', '0.00', '0.00', '0.00', null, null);
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
INSERT INTO `t_konten` VALUES ('Dari', '1'), ('Kepada', '2'), ('Tanggal', '3'), ('ttdmemo1', '4'), ('nomor memorandum 2', '5'), ('ttdmemo2', '6'), ('nomor memorandum 3', '7'), ('ttdmemo3', '8'), ('Nomor', '9'), ('tanggal undangan pembukaan', '10'), ('tanggal undangan klarifikasi', '11'), ('tanggal undangan penandatanganan', '12'), ('perwakilan', '13'), ('Nomor Keputusan Kuasa Pengguna Anggaran', '14'), ('Nomor Surat Penawaran', '15'), ('Tanggal  Keputusan Kuasa Pengguna Anggaran', '16'), ('Tanggal Surat Penawaran', '17');
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
-- Table structure for t_penawaran_ceklis
-- ----------------------------
DROP TABLE IF EXISTS `t_penawaran_ceklis`;
CREATE TABLE `t_penawaran_ceklis` (
`pnc_id`  bigint(255) NOT NULL ,
`pnc_srt_penawaran`  int(255) NULL DEFAULT 0 ,
`pnc_daftar_knts_hrg`  int(255) NULL DEFAULT 0 COMMENT 'daftar kuantitas dan harga' ,
`pnc_dok_pnr_teknis`  int(255) NULL DEFAULT 0 COMMENT 'dokumen penawaran teknis' ,
`pnc_isian_kualifikasi`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_alamat_spl`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_spec_teknis`  int(255) NULL DEFAULT 0 COMMENT 'Spesifikasi Teknis yang ditawarkan sesuai yang ditetapkan dalam dokumen penawaran' ,
`pnc_kesesuaian_jdwl_kerja`  int(255) NULL DEFAULT 0 ,
`pnc_kesesuaian_identitas`  int(255) NULL DEFAULT 0 ,
`pnc_srt_izin_usaha`  int(255) NULL DEFAULT 0 ,
`pnc_spl_tidak_bermasalah`  int(255) NULL DEFAULT 0 ,
`pnc_spl_tidak_blacklist`  int(255) NULL DEFAULT 0 ,
`pnc_npwp`  int(255) NULL DEFAULT 0 ,
`pnc_akta_pendirian`  int(255) NULL DEFAULT 0 ,
`pnc_pajak_3_bulan`  int(255) NULL DEFAULT 0 ,
`pnc_pakta_integritas`  int(255) NULL DEFAULT 0 ,
`pnc_ktp_pengurus`  int(255) NULL DEFAULT 0 ,
PRIMARY KEY (`pnc_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci

;

-- ----------------------------
-- Records of t_penawaran_ceklis
-- ----------------------------
BEGIN;
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
`pgd_status_pengadaan`  int(255) NULL DEFAULT 0 COMMENT '0:HPS 1:penawaran 2:fix 3:selesai' ,
`pgd_status_selesai`  int(2) NULL DEFAULT 0 COMMENT 'status pengadaan telah selesai' ,
`pgd_supplier`  int(255) NULL DEFAULT NULL ,
`pgd_dgn_pajak`  int(255) NULL DEFAULT NULL COMMENT 'status dengan pajak atau tidak. 0 tanpa pajak, 1 dengan pajak' ,
`pgd_smbr_dana`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'sumber pendanaan (seperti tahun 2015,2016,2017)' ,
`pgd_perwakilan_spl`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'nama perwakilan supplier' ,
`pgd_jbt_perwakilan_spl`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Jabatan perwakilan supplier' ,
`pgd_pembukaan_dok_pnr`  timestamp NULL DEFAULT NULL COMMENT 'pembukaan dokumen penawaran' ,
`pgd_klr_teknis_nego_hrg`  timestamp NULL DEFAULT NULL COMMENT 'Klarifikasi Teknis dan Negoisasi Harga' ,
`pgd_penandatangan_spk`  date NULL DEFAULT NULL ,
`pgd_tgl_pemasukkan_pnr`  timestamp NULL DEFAULT NULL ,
`pgd_no_srt_penawaran`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
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
AUTO_INCREMENT=60

;

-- ----------------------------
-- Records of t_pengadaan
-- ----------------------------
BEGIN;
INSERT INTO `t_pengadaan` VALUES ('15', 'Pekerjaan Pembersihan dan Silent Kaca Luar Gedung GMB III', '0', 'Melakukan pemeliharaan gedung dengan melakukan pembersihan kaca luar gedung yang sudah kotor dan melakukan silent kaca yang telah bocor', '2015-12-17 11:54:02', '12345', '6', '45', '30', '2015-11-21', null, '13812000.00', '15193200.02', '0.00', '0.00', '0.00', '0.00', '2015-12-05 10:03:49', '2015-12-05 10:03:49', '1', '0', '0', '1', null, null, null, null, null, null, null, null, null), ('19', 'Pengadaan barang yyy', '1', 'PEngadaan barang bagus yyy', '2015-12-02 07:26:15', '12345', '1', '30', '4', '2015-11-25', null, '1200.00', '1320.00', '0.00', '0.00', '0.00', '0.00', null, null, '0', '0', '0', null, null, null, null, null, null, null, null, null, null), ('20', 'dfshaasdasdas', '1', 're', '2015-12-17 11:50:24', '12345', '1', '3', '5', '2015-11-25', null, '36300.00', '39930.00', '6150.00', '6765.00', '3150.00', '3465.00', null, null, '0', '2', '0', null, null, null, null, null, null, null, null, null, null), ('21', 'Pengadaan keempat dsd', '1', 'asdff xxx', '2015-12-17 11:50:25', '54321', '1', '3', '45', '2015-12-02', null, '32500.00', '35750.00', '24600.00', '27060.00', '0.00', '0.00', null, null, '0', '1', '0', null, null, null, null, null, null, null, null, null, null), ('22', 'Pengadaan kelima', '1', '444', '2015-12-17 11:50:26', '54321', '1', '5', '5', '2015-12-02', null, '19000.00', '20900.00', '14727.00', '16199.70', '12900.00', '14190.00', null, null, '0', '2', '0', null, null, null, null, null, null, null, null, null, null), ('23', 'Pekerjaan pembersihan lantai xxx', '1', 'Membersihkan lantai semuanya', '2015-12-17 11:50:27', '54321', '1', '6', '6', '2015-12-02', null, '170000.00', '187000.00', '157500.00', '173250.00', '150000.00', '165000.00', null, null, '1', '2', '0', null, null, null, null, null, null, null, null, null, null), ('24', 'Pekerjaan pembersihan taman ccc', '1', 'Membersihkan taman depan gedung', '2015-12-17 11:50:28', '12345', '1', '4', '4', '2015-12-02', null, '250000.00', '275000.00', '250000.00', '275000.00', '0.00', '0.00', null, null, '1', '1', '0', null, null, null, null, null, null, null, null, null, null), ('25', 'pengadaan susu murni', '1', 'pengadaan susu murni sepesial maknyosss', '2015-12-17 11:50:29', '54321', '3', '45', '45', '2015-12-13', null, '1500000.00', '1650000.00', '0.00', '0.00', '0.00', '0.00', '2015-12-13 07:20:00', '2015-12-19 19:39:00', '0', '0', '0', '1', null, null, null, null, null, null, null, null, null);
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
`spl_jabatan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_perwakilan`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_NPWP`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_telp`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_alamat`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_nama`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
`spl_id`  int(25) NOT NULL AUTO_INCREMENT ,
`spl_deleted`  int(255) NULL DEFAULT 0 ,
`spl_rekening`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL ,
PRIMARY KEY (`spl_id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=latin1 COLLATE=latin1_swedish_ci
AUTO_INCREMENT=2

;

-- ----------------------------
-- Records of t_supplier
-- ----------------------------
BEGIN;
INSERT INTO `t_supplier` VALUES ('Direktur', 'Sugiri', '02-248.853.0-039.000', '11111', 'Jalan Parahyangan', 'PT. Merdeka', '1', '0', null);
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
INSERT INTO `t_surat` VALUES ('1', 'Memorandum'), ('2', 'HPS'), ('3', 'Daftar Harga'), ('4', 'Spesifikasi Teknis'), ('5', 'LDP'), ('6', 'Undangan'), ('7', 'Berita Acara Pemasukan'), ('8', 'Berita Acara Evaluasi Administrasi'), ('9', 'Berita Acara Evaluasi Harga'), ('10', 'Berita Acara Evaluasi Teknis'), ('11', 'Berita Acara Evaluasi Kualifikasi'), ('12', 'Berita Acara Klarifikasi'), ('13', 'Berita Acara Hasil Pengadaan Langsung'), ('14', 'Penetapan Penyedia Barang dan Jasa'), ('15', 'Pengumuman Penyedia Barang dan Jasa');
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
AUTO_INCREMENT=7

;

-- ----------------------------
-- Records of t_user
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', '6', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', null, '0'), ('1', '4', '3', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '1'), ('1', '5', '4', 'Susis', 'e807f1fcf82d132f9bb018ca6738a19f', 'falih32@gmail.com', '1'), ('1', '5', '5', 'Admin32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0'), ('1', '4', '6', 'falih32', '21232f297a57a5a743894a0e4a801fc3', 'falih32@gmail.com', '0');
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
AUTO_INCREMENT=93

;

-- ----------------------------
-- Records of tr_detail_konten
-- ----------------------------
BEGIN;
INSERT INTO `tr_detail_konten` VALUES ('2015-12-04', '65', '3', '27'), ('1066/PPK.5/VI/2015', '66', '9', '28'), ('2015-12-05', '67', '3', '28'), ('2015-12-06', '68', '3', '29'), ('b.114.8/ppk.5/vI/20015', '69', '9', '30'), ('2015-12-16 08:00', '70', '10', '30'), ('2015-12-19 19:00', '71', '11', '30'), ('2015-12-20', '72', '12', '30'), ('2015-12-05', '73', '3', '30'), ('BA.118.6/PPK.5/VI/2015', '74', '3', '31'), ('BA.118.7/PPK.5/VI/2015', '75', '3', '32'), ('BA.118.9/PPK.5/VI/2015', '76', '3', '33'), ('BA.118.8/PPK.5/VI/2015', '77', '3', '34'), ('BA.118.10/PPK.5/VI/2015', '78', '3', '35'), ('1122222222', '79', '9', '36'), ('1233445', '80', '14', '36'), ('11212121111112', '81', '15', '36'), ('2015-12-03', '82', '16', '36'), ('2015-12-02', '83', '17', '36'), ('BA.119.10/PPK.5/VI/2015', '84', '9', '37'), ('BA.119.11/PPK.5/VI/2015', '85', '9', '38'), ('BA.119.12/PPK.5/VI/2015', '86', '9', '39'), ('2015-12-13', '87', '3', '40'), ('BA.118.6/PPK.5/VI/2015', '88', '9', '41'), ('BA.118.7/PPK.5/VI/2015', '89', '9', '42'), ('BA.118.9/PPK.5/VI/2015', '90', '9', '43'), ('BA.118.8/PPK.5/VI/2015', '91', '9', '44'), ('BA.118.10/PPK.5/VI/2015', '92', '9', '45');
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
AUTO_INCREMENT=46

;

-- ----------------------------
-- Records of tr_detail_surat
-- ----------------------------
BEGIN;
INSERT INTO `tr_detail_surat` VALUES ('27', '2', '2015-12-04 22:44:29', '3', '15'), ('28', '3', '2015-12-04 23:04:40', '3', '15'), ('29', '4', '2015-12-04 23:25:08', '3', '15'), ('30', '6', '2015-12-16 18:43:32', '1', '15'), ('31', '7', '2015-12-16 18:54:11', '1', '15'), ('32', '8', '2015-12-16 18:54:11', '1', '15'), ('33', '9', '2015-12-16 18:54:11', '1', '15'), ('34', '10', '2015-12-16 18:54:11', '1', '15'), ('35', '11', '2015-12-16 18:54:11', '1', '15'), ('36', '12', '2015-12-05 12:40:40', '3', '15'), ('37', '13', '2015-12-05 15:28:01', '3', '15'), ('38', '14', '2015-12-05 15:28:01', '3', '15'), ('39', '15', '2015-12-05 15:28:01', '3', '15'), ('40', '2', '2015-12-13 12:08:04', '3', '25'), ('41', '7', '2015-12-16 18:47:37', '1', '24'), ('42', '8', '2015-12-16 18:47:38', '1', '24'), ('43', '9', '2015-12-16 18:47:38', '1', '24'), ('44', '10', '2015-12-16 18:47:38', '1', '24'), ('45', '11', '2015-12-16 18:47:38', '1', '24');
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
AUTO_INCREMENT=25

;

-- ----------------------------
-- Records of tr_pgd_suratizin
-- ----------------------------
BEGIN;
INSERT INTO `tr_pgd_suratizin` VALUES ('8', '22', '1', '1'), ('10', '19', '1', '0'), ('11', '20', '1', '1'), ('12', '21', '1', '1'), ('13', '23', '1', '1'), ('14', '24', '1', '1'), ('15', '25', '1', '0'), ('16', '15', '1', '0');
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
ALTER TABLE `t_detail_pengadaan` AUTO_INCREMENT=56;

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
ALTER TABLE `t_pengadaan` AUTO_INCREMENT=60;

-- ----------------------------
-- Auto increment value for t_supplier
-- ----------------------------
ALTER TABLE `t_supplier` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for t_suratizin
-- ----------------------------
ALTER TABLE `t_suratizin` AUTO_INCREMENT=2;

-- ----------------------------
-- Auto increment value for t_user
-- ----------------------------
ALTER TABLE `t_user` AUTO_INCREMENT=7;

-- ----------------------------
-- Auto increment value for tr_detail_konten
-- ----------------------------
ALTER TABLE `tr_detail_konten` AUTO_INCREMENT=93;

-- ----------------------------
-- Auto increment value for tr_detail_surat
-- ----------------------------
ALTER TABLE `tr_detail_surat` AUTO_INCREMENT=46;

-- ----------------------------
-- Auto increment value for tr_pgd_suratizin
-- ----------------------------
ALTER TABLE `tr_pgd_suratizin` AUTO_INCREMENT=25;
