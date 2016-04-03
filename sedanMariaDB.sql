/*
Navicat MySQL Data Transfer

Source Server         : Mysql_local
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : sedan

Target Server Type    : MariaDB
Target Server Version : 100099
File Encoding         : 65001

Date: 2016-03-21 09:09:38
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
